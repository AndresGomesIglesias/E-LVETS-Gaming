<?php
class Model{

	static $connections = array(); 
	

	public $conf = 'default';
	public $table = false; 
	public $db; 
	public $primaryKey = 'id'; 
	public $id; 
	public $errors = array();
	public $form; 
	public $validate = array(); 


    public function __construct(){
		// J'initialise qques variable
		if($this->table === false){
			$this->table = strtolower(get_class($this)).'s'; 
		}
		// Je me connecte à la base
		$conf = Conf::$databases[$this->conf];
		if(isset(Model::$connections[$this->conf])){
			$this->db = Model::$connections[$this->conf];
			return true; 
		}
		try{
			$pdo = new PDO(
				'mysql:host='.$conf['host'].';dbname='.$conf['database'].';',
				$conf['login'],
				$conf['password'],
				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
			);
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);

			Model::$connections[$this->conf] = $pdo; 
			$this->db = $pdo; 
		}catch(PDOException $e){
			if(Conf::$debug >= 1){
				die($e->getMessage()); 
			}else{
				die('Impossible de se connecter à la base de donnée'); 
			}
		}		 
	}

	
	/**
	* Permet de valider des données
	* @param $data données à valider 
	**/


		function validates($data, $moreData = null){
			$errors = array(); 
			foreach($this->validate as $k=>$v){
					if(!isset($data->$k)){
						$errors[$k] = $v['message']; 
					}else{
						//Contrôle si le jeu est dans la base de donnée
						if($v['rule'] == 'notGames'){
							if(empty($moreData)){
								$errors[$k] = $v['message']; 
							}
						}elseif($v['rule'] == 'notEmpty'){
								if(empty($data->$k)){
									$errors[$k] = $v['message']; 
								}
						}elseif(!preg_match('/^'.$v['rule'].'$/',$data->$k)){
							$errors[$k] = $v['message'];
						
						}
					// 	elseif($v['rule' == 'noCategories']){
					// 		if($data->categorie != $moreData->categories){
					// 			$errors[$k] = $v['message']; 
					// 		}
					
					// }
				}
			}
			$this->errors = $errors; 
			if(isset($this->Form)){
				$this->Form->errors = $errors; 
			}
			if(empty($errors)){
				return true;
			}
			return false;
	}

	

    /**
     * permet de récupérer les donners dans la base de donnée
	 * EXEMPLE: 'SELECT [fields] FROM [from] WHERE [conditions] [like] [limit] [order] 
	 * @$req['fields']
	 * @$req['from']
	 * @$req['conditions']
	 * @$req['limit']
     */
    public function find($req){
		$sql = "SELECT ";

        //-----------SELECTION LES COLONE---------//
        if(isset($req['fields'])){
            if(is_array($req['fields'])){
                $sql .= implode(', ',$req['fields']); 
            }else{
				$sql .= $req['fields'];
            }  
        }else{
			$sql .= '* ';
		}

		$sql .= ' FROM '.$this->table.' as '.get_class($this).' ';


		//-----------JOIN-------------------//
			if(isset($req['joinType'])){
				$req['joinType'] = $req['joinType'];
			}else{
				$req['joinType'] = 'INNER JOIN';
			}
				// Liaison
				if(isset($req['join'])){
					foreach($req['join'] as $k=>$v){
				$sql .= $req['joinType'] .' '.$k.' ON '.$v.' '; 
			}
		}


        //-----------AJOUTE DES CONDICTIONS--------//
		if(isset($req['conditions'])){
			$sql .= ' WHERE ';
			if(!is_array($req['conditions'])){
				$sql .= $req['conditions']; 
			}else{
				$cond = array(); 
				foreach($req['conditions'] as $k=>$v){
					if(!is_numeric($v)){
						$v = $this->db->quote($v);
					}
					$cond[] = "$k=$v";
				}
				$sql .= implode(' AND ',$cond);
			}
		}

		//-----------AJOUTE DES ORDRES--------//
		if(isset($req['order'])){
			$sql .= ' ORDER BY '.$req['order'];
		}

		//-----------AJOUTE DES LiMITS--------//
		if(isset($req['limit'])){
			$sql .= ' LIMIT '.$req['limit'];
		}

		//-----------AJOUTE le like-----------//
		if(isset($req['like'])){
			$sql .= ' WHERE '. $req['like'];
		}
		$pre = $this->db->prepare($sql); 
		// debug($sql);
		$pre->execute(); 
		return $pre->fetchAll(PDO::FETCH_OBJ);
	}

		/**
	* Alias permettant de retrouver le premier enregistrement
	**/
	public function findFirst($req){
		return current($this->find($req)); 
	}
	/**
	* Récupère le nombre d'enregistrement
	**/
	public function findCount($conditions){
		$res = $this->findFirst(array(
			'fields' => 'COUNT('.$this->primaryKey.') as count',
			'conditions' => $conditions
			));
		return $res->count;  
	}
	/**
	* Permet de récupérer un tableau indexé par primaryKey et avec name pour valeur
	**/
	function findList($req = array()){
		if(!isset($req['fields'])){
			$req['fields'] = $this->primaryKey.',name';
		}
		$d = $this->find($req); 
		$r = array(); 
		foreach($d as $k=>$v){
			$r[current($v)] = next($v); 
		}
		return $r; 
	}
	/**
	 * recuper les deux dérniers posts
	 */
	public function findLast($limit){
			return $this->find(array(
				'select'    =>  'id,name,content,created',
				'limit'     =>  $limit
				));
	}

	/**
	* Permet de supprimer un enregistrement
	* @param $id ID de l'enregistrement à supprimer
	**/	
	public function delete($id){
		$sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = $id";
		$this->db->query($sql); 
	}


	/**
	* Permet de sauvegarder des données
	* @param $data Données à enregistrer
	**/
	public function save($data){
		$key = $this->primaryKey;
		$fields =  array();
		$d = array(); 
		foreach($data as $k=>$v){
			if($k!=$this->primaryKey){
				$fields[] = "$k=:$k";
				$d[":$k"] = $v; 
			}elseif(!empty($v)){
				$d[":$k"] = $v; 
			}
		}
		if(isset($data[$key]) && !empty($data[$key])){
			$sql = 'UPDATE '.$this->table.' SET '.implode(',',$fields).' WHERE '.$key.'=:'.$key;
			$this->id = $data[$key]; 
			$action = 'update';
		
		}else{
			$sql = 'INSERT INTO '.$this->table.' SET '.implode(',',$fields);
			$action = 'insert'; 
			
		}
		$pre = $this->db->prepare($sql); 
		
		$pre->execute($d);
		if($action == 'insert'){
			$this->id = $this->db->lastInsertId(); 
		}
	}

	public function searchInBDD($data){
		$d = $this->find(array(
			'fields'        	=>  'po.id ,po.name, po.content, po.created, po.categories_id,
									 categories.tags ,categories.categories',
			'juncture'          =>  'categories on po.categories_id = categories.id',
			'like'				=> 	'po.name '. 'LIKE'. $this->db->quote($data)
		));
		return $d;
		
	}
	
	

}