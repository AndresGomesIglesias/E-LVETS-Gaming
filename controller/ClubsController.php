<?php
class ClubsController extends Controller{


public function admin_index(){
	$this->loadmodel('Club');
        $d['club']    =   $this->Club->find(array( 'conditions' => array('online' => 1)));
		$this->set($d); 
}

public function admin_add($id = null){
	$this->loadmodel('club');
	if ($id === null) {
		$result = $this->club->findFirst(array(
			'conditions' => array('online' => -1),
		));
		if (!empty($result)){
			$id = $result->id;
		}else{
			$this->club->save(array(
				'online' => -1,
			));
			$id = $this->club->id;
		}
	}
	$d['id'] = $id; 
	if($this->request->data){
		if($this->club->validates($this->request->data)){
			$this->club->saveSelect($this->request->data);
			$this->Session->setFlash('Le contenu a bien été modifié'); 
			$this->redirect('admin/clubs/index'); 
		}else{
			$this->Session->setFlash('Merci de corriger vos informations','danger'); 
		}
	}else{
		$this->request->data = $this->club->findFirst(array(
			'conditions' => array('id'=>$id, 'online' => 1)
		));
	}
	$this->set($d);
}

function admin_delete($id){
	$this->loadModel('club');
	$this->club->delete($id);
	$this->Session->setFlash('Le contenu a bien été supprimé'); 
	$this->redirect('admin/clubs/index'); 
}




}