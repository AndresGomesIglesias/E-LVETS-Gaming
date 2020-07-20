<?php
class ResultsController extends Controller{
    
    
    public function index(){
        $this->loadmodel('Result');
        $d['allResults'] = $this->Result->find(array(
            'fields'   =>  'Result.id,Result.competionID,Result.created,Result.butHome,Result.butOpp,Result.AdditionName,Result.teamAllianceID,
                            tmA.name as alliance,
                            tmB.name as opponent, tmB.imgPath,
                            users.Nickname,
                            cp.name as competionName,
                            gam.name as gameName',
            'joinType'  =>  'LEFT JOIN',
            'join'     =>   array('teams        as tmA'   =>  'Result.teamAllianceID = tmA.id',
                                  'teams        as tmB'   =>  'Result.teamOpponentID = tmB.id',
                                  'users              '   =>  'Result.userID = users.id',
                                  'competions   as cp'    =>  'Result.competionID = cp.id',
                                  'games        as gam'   =>  'Result.gameID = gam.id',
                                ),
            'conditions'   => array('Result.online ' => 1,),
            'order'    => 'Result.id DESC'
        ));
        $this->set($d); 
    }
    //sas
    public function admin_index(){
        $this->loadmodel('Result');
        $this->loadmodel('User');
       $res = $this->Result->find(array());
        $d['data'] = $this->Result->find(array(
            'fields'   =>  'Result.id,Result.competionID,Result.created,Result.butHome,Result.butOpp,Result.AdditionName,Result.teamAllianceID,
                            tmA.name as alliance,
                            tmB.name as opponent,
                            users.Nickname,
                            cp.name as competionName,
                            gam.name as gameName',
            'joinType'  =>  'LEFT JOIN',
            'join'     =>   array('teams        as tmA'   =>  'Result.teamAllianceID = tmA.id',
                                  'teams        as tmB'   =>  'Result.teamOpponentID = tmB.id',
                                  'users              '   =>  'Result.userID = users.id',
                                  'competions   as cp'    =>  'Result.competionID = cp.id',
                                  'games        as gam'   =>  'Result.gameID = gam.id',
                                ),
            'conditions'   => array('Result.online ' => 1,),
            'order'    => 'Result.id DESC'
        ));
        $this->set($d); 
    }

    public function admin_add($id = null){
        $this->loadmodel('Team');
        $d['alliance'] = $this->Team->find(array(
            'fields'       => 'Team.id,.Team.name as alliancename,Team.gameID, gam.name',
            'conditions'   => array('side ' => 'alliance',),
            'join'         => array('games as gam'   =>  'gam.id   = Team.gameID'),
        
            'order'        => 'name ASC'
        ));
        $d['opponent']= $this->Team->find(array(
            'fields'       => 'id,name as teamOpponentID',
            'conditions'   => array('side' => 'opponent'),
            'order'        => 'name ASC'
        ));

        $this->loadmodel('Result');
        if($id === null){
			$result = $this->Result->findFirst(array(
                'conditions' => array('online' => -1),
            ));
			if(!empty($result)){
				$id = $result->id;
			}else{
				$this->Result->save(array(
                    'online' => -1,
                    'created'=> date('Y-m-d')
				));
				$id = $this->Result->id;
			} 
        }
        $this->loadmodel('Competion');
        $d['data2'] = $this->Result->find(array(
            'conditions'=>array('id' => $id)
        ));

        $d['id'] = $id; 
		if($this->request->data){
			if($this->Result->validates($this->request->data)){
                $this->Result->ifTeamsOrPlayers($this->request->data);
                // $this->Result->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été modifié'); 
				$this->redirect('admin/results/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','danger'); 
			}
		}else{
			$this->request->data = $this->Result->findFirst(array(
				'conditions' => array('id'=>$id)
			));
            // dd($this->request->data );
        }
        $d['compet'] = $this->Competion->find(array(
            'fields'       => 'id,name as competionID',
        ));
        $this->loadmodel('Game');
        $d['games'] = $this->Game->find(array(
            'join'          => array('teams'   =>  'Game.id  = teams.gameID'),
            'fields'        =>  'Game.id,Game.name as gameID'
        ));
        $this->set($d);
    }
    function admin_addAjaxSelect(){
    }


    function admin_delete($id){
		$this->loadModel('Result');
		$this->Result->delete($id);
        $this->Session->setFlash('Le contenu a bien été supprimé'); 
        $this->redirect('admin/results/index'); 
    }
       

}
