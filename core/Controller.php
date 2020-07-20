<?php
/**
* Controller principal
**/
class Controller{

    public $request;  				// Objet Request 
	private $vars     = array();	// Variables à passer à la vue
	public $layout    = 'default';  // Layout à utiliser pour rendre la vue
	private $rendered = false;		// Si le rendu a été fait ou pas ?// Si le rendu a été fait ou pas ?
	public $rese = '';
	
    	/**
	* Constructeur
	* @param $request Objet request de notre application
	**/
    function __construct($request = null){
		$this->Session = new Session(); 
		$this->Form = new Form($this); 

		if($request){
			$this->request = $request; 	// On stock la request dans l'instance	
			require ROOT.DS.'config'.DS.'hook.php'; 		
		}
		
	}
     /** 
     * changer le loyout
     */
    public function setLayout($lay){
        $this->layout = $lay;
        return null;
    }

    /**
     * REND THE VIEW
     */
    public function render($name){
        //---------permet de faire une boucle  pour afficher qu'une view------------------
        if($this->rendered){ 
            return false; 
        }
        if(strpos($name, '/')===0){
            $view = ROOT.DS.'view'.$name.'.php';
        }else{
			$view = ROOT.DS.'view'.DS.$this->request->controller.DS.$name.'.php';
		}
        extract($this->vars);
        if(isset($view)){
            ob_start(); 
            require($view);
            $content_for_layout = ob_get_clean();  
            require ROOT.DS.'view'.DS.'layout'.DS. $this->layout .'.php';  
            
        }
        $this->rendered = true;   
        return null;
    }

    /**
     * SET DATA TO THE VIEW
     * @key VALU OF THE ARRAY
     * @value DATA ARRAY
     */
    public function set($key, $value = null){
        if(is_array($key)){
             $this->vars += $key; 
        }else{
            $this->vars[$key] = $value;  
        }  
    }

   
    /** 
     * charge le model 
     * stock l'instance dans la variable name
     */
	function loadModel($name){
		if(!isset($this->$name)){
			$file = ROOT.DS.'model'.DS.$name.'.php'; 
			require_once($file);
			$this->$name = new $name();
			if(isset($this->Form)){
				$this->$name->Form = $this->Form;  
			}
		}

	}


    /**
     * Permet de rendre la page 404 en cas d'une mauvaise URL
     */
    public function e404($message){
        header("HTTP/1.0 404 Not Found");
        $this->set('message', $message);
        $this->render('/errors/page_404');
        die();
    }

    /**
	* Permet d'appeller un controller depuis une vue
	**/
	function request($controller,$action){
		$controller .= 'Controller';
		require_once ROOT.DS.'controller'.DS.$controller.'.php';
		$c = new $controller();
		return $c->$action(); 
	}

	/**
	* Redirect
	**/
	function redirect($url,$code = null ){
		if($code == 301){
			header("HTTP/1.1 301 Moved Permanently");
		}
		header("Location: ".Router::url($url)); 
    }
    
    /**
	* Permet d'interdir certaine page spécifique au utilisateur 
	**/
    function pageRestriction($urls = array()){
        foreach($urls as $k=>$v)
        {
            if($v == $k){
                $this->redirect('users/login'); 
            }
        }
    }


}