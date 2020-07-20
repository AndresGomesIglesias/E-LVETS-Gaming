<?php 
class Session{
	
	public function __construct(){
		if(!isset($_SESSION)){
			session_start(); 
		}
	}
	/**
	 * Permet de setter un message 
	 * @structure du message 'index' => 'Mon message'
	 */
	public function setFlash($message = array(),$type = 'success'){
	
		$_SESSION['flash'] = array(
			'message' => $message,
			'type'	=> $type
		);
	}

	/**
	 * Permet d'affichier un message flash 
	 */
	public function flash(){
		if(isset($_SESSION['flash']['message'])){
			$html = '<div class="col-xl-12 alert alert-'.$_SESSION['flash']['type'].'"><p>'.$_SESSION['flash']['message'].'</p></div>'; 
			$_SESSION['flash'] = array(); 
			return $html; 
		}
	}

	/**
	 * Permet d'écrir dans la session'
	 */
	public function write($key,$value){
		$_SESSION[$key] = $value;
	}

	/**
	 * Permet de lire le session
	 */
	public function read($key = null){
		if($key){
			if(isset($_SESSION[$key])){
				return $_SESSION[$key]; 
			}else{
				return false; 
			}
		}else{
			return $_SESSION; 
		}
	}

	/**
	 * Permet de controler si l'utilisateur est connecté et stock le grade dans la session 
	 */
	public function isLogged(){
		return isset($_SESSION['User']->grade);
	}

	/**
	 * 
	 */
	public function user($key){
		if($this->read('User')){
			if(isset($this->read('User')->$key)){
				return $this->read('User')->$key; 
			} else{
				return false;
			}
		}
		return false;
	}


}