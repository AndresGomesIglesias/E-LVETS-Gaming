<?php
class TeamsController extends Controller{
	public $d =  [];
	public $changerlayout = true;
	public $oneSave = true;
	
   /**
	* Loging
	**/
    public function login(){
        if($this->request->data){
            $data = $this->request->data;
            $data->password = sha1($data->password); 
            $this->loadModel('User'); 
            // debug($data);
			$user = $this->User->findFirst(array(
				'conditions' => array('firstName' => $data->firstName,'password' => $data->password
			)));
			if(!empty($user)){
				$this->Session->write('User',$user); 
			}
			$this->request->data->password = ''; 
		}
		if($this->Session->isLogged()){
			if($this->Session->user('role') == 'admin'){
				$this->redirect('huadminha/results/index/');
			}else{
				$this->redirect('');
			}
		}
    }

    /**
	* Logout
	**/
	function logout(){
		unset($_SESSION['User']);
		$this->Session->setFlash('Vous ête mainenant déconnecté'); 
		$this->redirect(''); 
	}

    public function team($id, $slug){
	
		$this->loadmodel('User');
		$d['slug']  = $slug;
		$d['id']  	= $id;
        $d['playersInfoLite']    =   $this->User->find(array(
			'fields'        =>  'User.id,User.content,User.born,User.age,User.nickname as name,User.firstname,User.lastname,User.avatarPath, pin.position,snet.facebook,snet.twitter,snet.instagram,snet.twitch',
			'joinType' 		=>  'LEFT JOIN',
			'conditions'    =>  array('User.team'=>$id, 'role' => 'player'),
			'join'          =>  array('teams  as tea'   =>  'tea.id = User.team', 'games as gam' => 'tea.gameID = gam.id', 
			'payerinfos as pin' => 'pin.nickname = User.nickname', 'sorialnetworks as snet' => 'snet.name = User.nickname')
		));
		$this->set($d);
	
	
	}
	
	public function player($id){
		$this->loadmodel('User');
        $d['playersInfo']    =   $this->User->findFirst(array(
			'fields'        =>  'User.id,User.content,User.born,User.age,User.nickname,User.firstname,User.lastname,User.avatarPath,gam.name as gameName',
			'conditions'    =>  array('User.id'=>$id),
			'join'          =>  array('games  as gam'   =>  'gam.id = User.gameID'),
		));
        $this->set($d); 
	}

	public function teamOldPlayers($id){
		$this->loadmodel('User');
        $d['playersInfoLite']    =   $this->User->find(array(
			'fields'        =>  'User.id,User.content,User.born,User.age,User.nickname as name,User.firstname,User.lastname,User.avatarPath, pin.position,snet.facebook,snet.twitter,snet.instagram,snet.twitch',
			'joinType' 		=>  'LEFT JOIN',
			'conditions'    =>  array('User.team'=>$id,'role' => 'old'),
			'join'          =>  array('teams  as tea'   =>  'tea.id = User.team', 'games as gam' => 'tea.gameID = gam.id', 
			'payerinfos as pin' => 'pin.nickname = User.nickname', 'sorialnetworks as snet' => 'snet.name = User.nickname')
		));
		$this->set($d); 
	}

	public function teamLastResults(){
	}

	public function teamCup(){
	}

    public function member(){
	
		$this->loadmodel('User');
	
        $d['playersInfoLite']    =   $this->User->find(array(
			'fields'        =>  'User.id,User.content,User.born,User.age,User.nickname as name,User.firstname,User.lastname,User.avatarPath,tea.online, pin.position,snet.facebook,snet.twitter,snet.instagram,snet.twitch',
			'joinType' 		=>  'LEFT JOIN',
			'join'          =>  array('teams  as tea'   =>  'tea.id = User.team', 'games as gam' => 'tea.gameID = gam.id', 
			'payerinfos as pin' => 'pin.nickname = User.nickname', 'sorialnetworks as snet' => 'snet.name = User.nickname')
		));
		$this->set($d);
	
	}



	public function admin_view($id){
	}
	
	public function admin_teams(){
		$this->loadmodel('Team');
        $d['playersInfoLite']    =   $this->Team->find(array(
			'fields'	=> 'Team.id,Team.name, games.name as gamesName,Team.level, Team.online',
			'conditions' 	=> array('side' => 'alliance'),
			'join'	=> array('games' => 'games.id = Team.gameID')
		));
		// debug($d['playersInfoLite']  );
		$this->set($d); 
	}

	public function admin_addteam($id = null){
		$this->loadmodel('User');
		$this->loadmodel('Team');
		//if Vérification 
		if ($id === null) {
			//Récupérer la première colonne qui a un online -1
			$result = $this->Team->findFirst(array(
				'conditions' => array('Team.online' => -1),
			));
			if (!empty($result)){
				$id = $result->id;
			}else{
				// S'il n'y a pas de variable en -1, le save va la créer
				$this->Team->save(array(
					'online' => -1,
				));
				// On  stock ID trouvé dans ID principale
				$id = $this->Team->id;
			}
		}

		$d['id'] = $id; 

		if($this->request->data){
			$this->loadModel('Team');
			$this->loadmodel('User');
			$this->loadModel('Game');
			
			$GetGameInfo = $this->Game->findFirst(array('fields'=> 'Game.id, Game.name','conditions' => array('name' => $this->request->data->gamesName)));
			if($this->Team->validates($this->request->data, $GetGameInfo)){ 
				$this->request->data->side = "alliance";
				$this->request->data->id = $id;
				$this->Team->saveSelect($this->request->data, $GetGameInfo);
				foreach ($this->request->data as $k=>$v){
					if (strstr($k, '_', true)){
						//recuperer ID
						$idUsers = substr($k,7);
						//rechercher le joueur
						$players = $this->User->findfirst(array('conditions' => array('id' => $idUsers)));
						if ($this->request->data->$k == 0){
							$idUserss = substr($k,7);
							$playerss = $this->User->findfirst(array('conditions' => array('id' => $idUserss)));
							$id = 0;
							$this->User->saveSelect($playerss,$id);
						}
						//formater la colonne team de l'user avec l'id de la team
						$this->User->saveSelect($players,$id);
					}
						$this->Session->setFlash('Le contenu a bien été modifié'); 
						$this->redirect('huadminha/users/teams'); 
				}
				}else{
					$this->Session->setFlash('Merci de corriger vos informations','danger'); 
				}
			}else{
				$this->request->data = $this->Team->findFirst(array(
					'fields'	=> 'Team.id,Team.name, games.name as gamesName,Team.level',
					'conditions' => array('Team.id'=>$id),
					'join'	=> array('games' => 'games.id = Team.gameID')
				));

			}
			$d['player'] = $this->User->find(array('conditions' => array('team' => $id)));
			$d['players'] = $this->User->find(array('conditions' => array('team !' => $id)));
			// debug($d['players']);
			$this->set($d);
	}

    function admin_delete($id){
		$this->loadModel('Team');
		$this->Team->delete($id);
        $this->Session->setFlash('Le contenu a bien été supprimé'); 
        $this->redirect('admin/users/teams'); 
    }







}
   