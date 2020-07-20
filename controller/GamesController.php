<?php
class GamesController extends Controller{

public $errr = [];

public function admin_index(){
	$this->loadmodel('Game');
        $d['Game']    =   $this->Game->find(array('conditions' => array('online' => 1),));
		$this->set($d); 
}



public function admin_add($id = null){

	$this->loadmodel('Game');

	if ($id === null) {
		$result = $this->Game->findFirst(array(
			'conditions' => array('online' => -1),
		));
		if (!empty($result)){
			$id = $result->id;
		}else{
			$this->Game->save(array(
				'online' => -1,
			));
			$id = $this->Game->id;
		}
	}
	$d['id'] = $id; 
	if($this->request->data){
		if($this->Game->validates($this->request->data)){
			$this->Game->saveSelect($this->request->data);
			$this->Session->setFlash('Le contenu a bien été modifié'); 
		
			if(!isXmlHttpRequest()){
				$this->redirect('admin/games/index');
			}
		}else{
			if(!isXmlHttpRequest()){
				$this->Session->setFlash('Merci de corriger vos informations','danger'); 
			}
			$this->loadmodel('Game');
			// $d['err'] = $this->Game->errors;
		}
	}else{
		$this->request->data = $this->Game->findFirst(array(
			'conditions' => array('id'=>$id)
		));
	}
	$d['levelSelect'] = $this->Form->custumeArrayForObjectForm('members', array('Groupe','solo'));
	$this->set($d);
}

public function admin_ajaxNewListOption(){}

function admin_delete($id){
	$this->loadModel('Game');
	$this->Game->delete($id);
	$this->Session->setFlash('Le contenu a bien été supprimé'); 
	$this->redirect('admin/games/index'); 
}







}