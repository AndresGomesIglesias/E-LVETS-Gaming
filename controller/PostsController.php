<?php
class PostsController extends Controller{

    public $params = [];
     
    public function index($params = null){
        // blog in index page
        $this->loadModel('Post');
        $d['postCardIndex'] = $this->Post->find(array(
            'fields'    =>  'Post.id,Post.name,Post.content,Post.userID,Post.categorieID,Post.created,Post.slug,
                            cat.categories',
            'join'      =>  array('categories  as cat'   =>  'cat.id = Post.categorieID'),
            'limit'     =>  4,
            'order'     =>  'Post.id DESC',
        ));

        // result in index page
        $this->loadModel('Result');
        $d['LastResult'] = $this->Result->findFirst(array(
            'fields'    =>  'Result.id,Result.competionID,Result.created,Result.butHome,Result.butOpp,Result.AdditionName,Result.teamAllianceID,
                            tmA.name as alliance, 
                            tmB.name as opponents, tmB.imgPath,
                            users.Nickname,
                            cp.name as competionName,
                            gam.name',
            'joinType'  =>  'LEFT JOIN',
            'join'      =>   array(
                            'teams        as tmA'   =>  'Result.teamAllianceID = tmA.id',
                            'teams        as tmB'   =>  'Result.teamOpponentID = tmB.id',
                            'users              '   =>  'Result.userID = users.id',
                            'competions   as cp'    =>  'Result.competionID = cp.id',
                            'games        as gam'   =>  'Result.gameID = gam.id',
                            ),
            'order'    => 'Result.id DESC',
            'conditions'   => array('Result.online ' => 1,),
        ));
        $d['LastResult2'] = $this->Result->find(array(
            'fields'    =>  'Result.id,Result.competionID,Result.created,Result.butHome,Result.butOpp,Result.AdditionName,Result.teamAllianceID,
                            tmA.name as alliance, 
                            tmB.name as opponents, tmB.imgPath,
                            users.Nickname,
                            cp.name,
                            gam.name',
            'joinType'  =>  'LEFT JOIN',
            'join'      =>   array(
                            'teams        as tmA'   =>  'Result.teamAllianceID = tmA.id',
                            'teams        as tmB'   =>  'Result.teamOpponentID = tmB.id',
                            'users              '   =>  'Result.userID = users.id',
                            'competions   as cp'    =>  'Result.competionID = cp.id',
                            'games        as gam'   =>  'Result.gameID = gam.id',
            ),
            'order'    => 'Result.id DESC',
            'conditions'   => array('Result.online ' => 1),
            'limit'     => 5
        ));
        $this->set($d);
    }
    
    public function view($id,$slug){
       
            $this->loadModel('Post');
            
            $d['data'] = $this->Post->findFirst(array(
                'fields'            =>  'Post.id as PostId,Post.name,Post.content,Post.created,Post.slug,
                                        users.id,users.Nickname,users.firstName,users.lastName,
                                        cat.categories',
                'conditions'        =>  array('Post.id' => $id),
                'join'              =>  array(  'categories  as cat'   =>  'cat.id = Post.categorieID',
                                                'users'             =>  'users.id = Post.userID')
            ));
            

            if(empty($d['data'])){
                $this->e404('Page introuvable'); 
            }
            if($slug != lcfirst($d['data']->slug)){
                $this->redirect("posts/view/id:$id/slug:".lcfirst($d['data']->slug),301);
            }
            $this->set($d);
    }

    public function blog(){

        $perPage = 30; 
        $this->loadModel('Post');
        $condition = array('online' => 1,'type'=>'post'); 
        $d['datacarteAll'] = $this->Post->find(array(
            'conditions'    => $condition,
            'fields'        =>  'Post.id,Post.name,Post.content,Post.userID,Post.categorieID,Post.created,Post.slug, Post.minature,
                                cat.color,cat.categories',
            'join'          =>  array('categories  as cat'   =>  'cat.id = Post.categorieID'),
            'order'         =>  'Post.id DESC',
            'limit'         =>  ($perPage*($this->request->page-1)).','.$perPage,
        ));
        $d['total'] = $this->Post->findCount($condition); 
        $d['page'] = ceil($d['total'] / $perPage);
        $this->loadModel('Categorie');
        $d['categories'] = $this->Categorie->find(array());
        $this->set($d);
    }

    

    public function search(){
        $this->loadModel('Post');
        if(isset($_GET['submit'])){
            if(empty($_GET['s'])){
                $erros = 'il n y a rien à chercher';
            }
            $get = '%'.$_GET['s'].'%';
           return $this->Post->searchInBDD($get);
        }
    }
    public function admin_corbeille(){
        $this->loadModel('Post');
        $this->loadModel('User');
        $this->loadModel('Categorie');
        $d['data'] = $this->Post->find(array(
            'conditions'            =>  array('online' => 2,'type'=>'post'),
            'fields'                =>  'Post.id as postID,Post.name as postName,Post.content,Post.created,Post.slug,Post.online,
                                        users.id,users.Nickname,
                                        categories.categories',
            'join' => array('users' => 'users.id = Post.userID', 'categories' => 'categories.id = Post.categorieID')));
        $this->set($d);
    }

    public function admin_index(){
        
        $this->loadModel('Post');
        $this->loadModel('User');
        $this->loadModel('Categorie');
        $d['data'] = $this->Post->find(array(
            'conditions'            =>  array('online !' => 2,'type'=>'post'),
            'fields'                =>  'Post.id as postID,Post.name as postName,Post.content,Post.created,Post.slug,Post.online,
                                        users.id,users.Nickname,
                                        categories.categories',
            'join' => array('users' => 'users.id = Post.userID', 'categories' => 'categories.id = Post.categorieID')));
        $this->set($d);
    }

    public function admin_add($id = null,$slug = null){
        $this->loadmodel('Post');
        if($id === null){
			$result = $this->Post->findFirst(array(
                'conditions' => array('online' => -1),
            ));
			if(!empty($result)){
				$id = $result->id;
			}else{
				$this->Post->save(array(
                    'online' => -1,
                    'created'=> date('Y-m-d')
				));
				$id = $this->Post->id;
			} 
        }
        $d['data2'] = $this->Post->findFirst(array(
            'conditions'=>array('Post.id' => $id)
        ));
        $d['id'] = $id; 
		if($this->request->data){
            $this->loadmodel('Post');
			if($this->Post->validates($this->request->data)){
                     // Verfier si le champ file est vite. si la réponse est négative il faut save l'image disponible
                (empty( $this->request->data->minature)) ? $this->request->data->minature = $d['data2']->minature: $this->request->data->minature;
                $this->Post->save(array( 
                    'id'            => $this->request->data->id,
                    'name'          => $this->request->data->name,
                    'online'        => $this->request->data->online,
                    'type'          => 'post',
                    'slug'          =>  str_replace (' ', '-',$this->request->data->name),
                    'userID'        => '1',
                    'content'       => $this->request->data->content,
                    'categorieID'   => $this->request->data->categories,
                    'minature'      => $this->request->data->minature  ,
                    'created'       => date('Y-m-d')
                ));
				$this->Session->setFlash('Le contenu a bien été modifié'); 
				$this->redirect('admin/posts/index'); 
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','danger'); 
			}
		}else{
			$d['data'] =  $this->request->data = $this->Post->findFirst(array(
                'fields'     => 'Post.id,Post.name,Post.online,Post.slug,Post.categorieID as categories,Post.content,Post.minature',
				'conditions' => array('Post.id'=>$id)
			));
        }

        /**
         * Input Categorie
         */
        $this->loadmodel('Categorie');
        $d['categorie'] = $this->Categorie->find(array('conditions' => array('id !' => 0),'categorie,id'));
        $d['publication'] =  $this->Form->custumeArrayForObjectForm('online', array('brouillon', 'public',' corbeile'));
        $this->set($d);
    }

    
    function admin_delete($id){
		$this->loadModel('Post');
		$this->Post->delete($id);
        $this->Session->setFlash('Le contenu a bien été supprimé'); 
        $this->redirect('admin/posts/corbeille'); 
    }

    function admin_moveToDelete($id){
        $this->loadmodel('Post');
        $d['data'] = $this->Post->findFirst(array(
            'conditions'=>array('Post.id' => $id)
        ));
        $this->Post->save(array( 
            'id'            => $d['data']->id,
            'name'          => $d['data']->name,
            'online'        => 2,
            'type'          => 'post',
            'slug'          => $d['data']->slug,
            'userID'        => $d['data']->userID,
            'content'       => $d['data']->content,
            'categorieID'   => $d['data']->categorieID,
            'minature'      => $d['data']->minature  ,
            'created'       => date('Y-m-d')
        ));
        $this->redirect('admin/posts/index'); 
    }



 
}