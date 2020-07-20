
<?php
/**
 * le systéme de hook est charger à chaque page
 */


if($this->request->prefix == 'admin'){
$this->layout = 'admin_default'; 
// 	if(!$this->Session->isLogged() || $this->Session->user('grade') != 'admin'){
// 		if($this->Session->isLogged() || $this->Session->user('grade') == 'manager'){
// 			$this->layout = 'default'; 
// 			$url = $this->request->url;
// 			$this->pageRestriction(array(
// 				'/huadminha/users/index' 	 => $url,
// 				'/huadminha/posts/index' 	 => $url,
// 				'/huadminha/posts/add'		 => $url,
// 				'/huadminha/posts/corbeille' => $url,
// 			));
// 		}else{
// 			$this->redirect('users/login'); 
// 		}
		
// 	}
}



?>