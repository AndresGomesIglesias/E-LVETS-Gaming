<?php  

if(isset($_GET['id'])){
	$id = $_GET['id'];

    	$this->loadmodel('User');
        $this->loadmodel('Team');
        $this->loadmodel('Game');

        $d['Game'] = $this->Game->find(array());

        foreach($d['Game'] as $k=>$v){
			if ($v->id == $id){
				if ($v->members == 'solo'){
				$return = array(
					'error' => false,
					'results' => $this->User->find(array(
						'fields'        =>  'User.id,User.team, User.Nickname as name,teams.GameID, teams.level, games.members',
						'join'          =>  array('teams' => 'teams.id = User.team', 'games' => 'games.id = teams.gameID'),
						'conditions'    =>  array('teams.GameID'=> $v->id, 'members' => 'solo'),
					)));
			}elseif($v->members == 'groupe'){
				$return = array(
					'error' => false,
					'results' => $this->Team->find(array(
						'join'          =>  array('games' => 'games.id = Team.gameID'),
						'conditions'    =>  array('GameID'=> $v->id, 'members' => 'groupe'),
					)));
			}
		}
	}
}

die(json_encode($return));
?>