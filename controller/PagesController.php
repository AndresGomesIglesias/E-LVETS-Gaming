<?php
class PagesController extends Controller{

    public $params = [];
    public function partner(){

    }

    public function about(){

    }

    public function chartgraphique(){
        
    }

    public function contact(){
        
    }


   /**
	* Permet de récupérer les pages pour le menu
	**/
	public function getMenu(){
		$this->loadModel('Team');
		$d['pageElite'] = $this->Team->find(array(
            'fields'        =>  'Team.id as id,Team.slug,gam.name,Team.name as teamName, Team.gameID, Team.online',
            'join'          =>  array('games  as gam'   =>  'gam.id = Team.gameID'),
            'conditions'    =>  array('level' => 'elite','Team.online' => 1),
        ));
    
        $d['pageChall'] = $this->Team->find(array(
            'fields'        =>  'Team.id,Team.slug,gam.name,  Team.gameID',
            'join'          =>  array('games  as gam'   =>  'gam.id = Team.gameID'),
            'conditions'    =>  array('level' => 'challenger','Team.online' => 1),
        ));
        
        $d['pageAca'] = $this->Team->find(array(
            'fields'        =>  'Team.id,Team.slug,gam.name,  Team.gameID',
            'join'          =>  array('games  as gam'   =>  'gam.id = Team.gameID'),
            'conditions'    =>  array('level' => 'academie','Team.online' => 1),
        ));
        return $d;
    }





}