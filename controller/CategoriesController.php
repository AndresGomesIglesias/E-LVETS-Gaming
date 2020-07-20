<?php
class CategoriesController extends Controller{


    /**
     * Permet d'affichier les listes des catégories
     */
    function admin_index($id=null){
        $this->loadmodel('Categorie');
        $d['dataAll'] =  $this->Categorie->find(array('conditions' => array('id !' => 0)));
        $this->set($d);
    }

    /**
     * Permet d'afficher une catégorie
     */
    public function admin_views($id){
        if($this->request->data){
            $this->loadmodel('Categorie');
			if($this->Categorie->validates($this->request->data)){
                $this->Categorie->save(array(
                    'id'            =>  $this->request->data->id,
                    'categories'    =>  $this->request->data->categories,
                    'tags'          =>  $this->request->data->tags,
                    'color'         =>  $this->request->data->color,
                ));
				$this->Session->setFlash('Le contenu a bien été modifié'); 
				$this->redirect('admin/categories/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','danger'); 
			}
		}else{
            $this->loadmodel('Categorie');
			$d['dataFirst'] =  $this->request->data = $this->Categorie->findFirst(array(
				'conditions' => array('id'=>$id)
			));
        }
        $this->set($d);
    }


    function admin_delete($id){
        $this->loadModel('Categorie');
        $this->loadModel('Post');
        $data = $this->Post->find(array('conditions' => array('categorieID' => $id)));
   
      
        if($id == 0){ 
            throw new Exception("Vous ne pouvez pas supprimer cette categorie ");
        }else{
            $this->Categorie->delete($id);
            if($data){
                foreach($data as $v){
                        $this->Post->save(array( 
                        'id'            => $v->id,
                        'name'          => $v->name,
                        'online'        => $v->online,
                        'type'          => 'post',
                        'slug'          =>  str_replace (' ', '-',$v->name),
                        'userID'        => '1',
                        'content'       => $v->content,
                        'categorieID'   => 0,
                        'minature'      => $v->minature  ,
                        'created'       => date('Y-m-d')
                    ));
                }
            }
            $this->Session->setFlash('Le contenu a bien été supprimé'); 
            $this->redirect('admin/categories/index'); 
        }
    }


    public function admin_addCategorie(){
        $this->loadmodel('Categorie');
        $this->Categorie->save(array( 
            'categories'    => $this->request->data->categorie,
            'tags'          => $this->request->data->tags,
            'slug'          => str_replace (' ', '-',$this->request->data->categorie),
            'color'          => $this->request->data->color
        ));
        $this->redirect('admin/posts/add/'.$this->request->data->id); 
    }




}