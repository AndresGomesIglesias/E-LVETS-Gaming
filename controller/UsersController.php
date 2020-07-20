<?php
class UsersController extends Controller{
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
			$user = $this->User->findFirst(array(
				'conditions' => array('firstName' => $data->firstName,'password' => $data->password
			)));
			if(!empty($user)){
				$this->Session->write('User',$user); 
			}
			$this->request->data->password = ''; 
		}
		
		if($this->Session->isLogged()){
			if($this->Session->user('grade') == 'admin'){
				$this->Session->setFlash('Salut '. $this->Session->read('User')->firstname. ' bienvenu dans l espace admin E-LVETS');
				$this->redirect('huadminha/posts/index');
				die();
			}elseif($this->Session->user('grade') == 'manager'){
				$this->redirect('posts/index'); 
				die();
			}elseif($this->Session->user('grade') == 'redacteur'){
				$this->redirect('posts/index'); 
				die();
			}else{
				// $this->Session->setFlash('Vous n avez le niveau d administration autoriser', 'danger'); 
				$this->redirect('posts/index'); 
			}
		}
	}
    /**
	* Logout
	**/
	function logout(){
		unset($_SESSION['User']);
		$this->Session->setFlash('Vous ête mainenant déconnecté'); 
		$this->redirect('users/login'); 
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

	public function admin_index(){
	
		 $this->loadmodel('User');
		 $this->loadmodel('Role');
		 $d['UserList']   = $this->User->find(array(
				'fields'        =>  'User.id as UsersID,User.nickname,User.grade,User.firstname,User.lastname,User.role, teams.name as TeamsName',
				'order'    => 'User.id DESC',
				'join'		=> array('teams' => 'teams.id = User.team')
		));
		$d['roles'] = $this->Role->find(array('conditions' => array('isAdmin' => 1)));
		$this->set($d); 

	}
	
	public function admin_add(){
		$this->loadmodel('User');
		$d['UserList']   = $this->User->find(array(
			   'fields'        =>  'User.id as UsersID,User.nickname,User.firstname,User.lastname,User.role, teams.name as TeamsName',
			   'order'    => 'User.id DESC',
			   'join'		=> array('teams' => 'teams.id = User.team')
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
		$this->set($d); 
	}

	public function admin_addteam($id = null){
	
		$this->loadmodel('User');
		$this->loadmodel('Team');
		if ($id === null) {
			$result = $this->Team->findFirst(array(
				'conditions' => array('Team.online' => -1),
			));
			if (!empty($result)){
				$id = $result->id;
			}else{
				$this->Team->save(array(
					'online' => -1,
				));
				$id = $this->Team->id;
			}
		}
	
		$d['id'] = $id; 

		$d['levelSelect'] = $this->Form->custumeArrayForObjectForm('level', array('Choisir le niveau de l\'équipe','Elite', 'Challenger',' Academie'));
		
		if($this->request->data){
			$this->loadModel('Team');
			$this->loadmodel('User');
			$this->loadModel('Game');
			$this->loadModel('Post');
			$GetGameInfo = $this->Game->findFirst(array('fields'=> 'Game.id, Game.name','conditions' => array('name' => $this->request->data->name)));
			if($this->Team->validates($this->request->data, $GetGameInfo)){ 
				$this->request->data->side = "alliance";
				$this->request->data->id = $id;
				$this->Team->saveSelect($this->request->data);
				foreach ($this->request->data as $k=>$v){
					if (strstr($k, '_', true)){
						$idUsers = substr($k,7);
						$players = $this->User->findfirst(array('conditions' => array('id' => $idUsers)));
						if ($this->request->data->$k == 0){
							$idUserss = substr($k,7);
							$playerss = $this->User->findfirst(array('conditions' => array('id' => $idUserss)));
							$this->User->saveSelect($playerss, 0);
						}else{
							$this->User->saveSelect($players,($this->request->data->id));
						}
					}
						$this->Session->setFlash('Le contenu a bien été modifié'); 
						$this->redirect('huadminha/users/teams'); 
				}
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','danger');
				die(); 
			}
		}else{
			$this->request->data = $this->Team->findFirst(array(
				'fields'	=> 'Team.id,Team.name as teamName,Team.online, games.name as gamesName,Team.level, team.gameID',
				'conditions' => array('Team.id'=>$id),
				'join'	=> array('games' => 'games.id = Team.gameID')
			));
		}
			$this->loadModel('Game');
			$d['player'] = $this->User->find(array('conditions' => array('Team' => $id)));
			$d['players'] = $this->User->find(array());
			$d['gamelist'] = $this->Game->find(array('fields'	=> 'Game.name  as mainID, Game.id','conditions' => array('online' => 1)));
			$d['playersInfoLite']    =   $this->Team->find(array(
				'fields'	=> 'Team.id,Team.name as teamName, games.name as gamesName,Team.level, Team.online',
				'conditions' 	=> array('side' => 'alliance'),
				'join'	=> array('games' => 'games.id = Team.gameID')
			));
			$this->set($d);
	}



    function admin_delete($id){
		$this->loadModel('Team');
		$this->Team->delete($id);
        $this->Session->setFlash('Le contenu a bien été supprimé'); 
        $this->redirect('admin/users/teams'); 
    }







}
   