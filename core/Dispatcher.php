<?php
/**
* Dispatcher
* Permet de charger le controller en fonction de la requête utilisateur
**/
/**
 *      Recuper l'url taper par l'utilisateur et l'instancie 
 *      Découpe URL 
 *      Charger l'instance du controller taper dans l'url
 *      Charger la vu
 */
class Dispatcher{

    public $request;

	/**
	* Fonction principale du dispatcher
	* Charge le controller en fonction du routing
	**/
    public function __construct(){
        //---------------URL--------------------------
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        //---------CHARGE du controller-----------
        $controller = $this->loadController();
        //On stop l'action dans une variable
        $action = $this->request->action;
        //Verifie s'il y a un prefix
        //Si true on change les valeurs de action
		if($this->request->prefix){
            $action = $this->request->prefix.'_'.$action;
		}
		if(!in_array($action , array_diff(get_class_methods($controller),get_class_methods('Controller'))) ){
			$this->error('Le controller '.$this->request->controller.' n\'a pas de méthode '.$action,'e404'); 
		}
		call_user_func_array(array($controller,$action),$this->request->params); 
		$controller->render($action);
	}

    /**
	* Permet de charger le controller en fonction de la requête utilisateur
	**/
	function loadController(){
		$name = ucfirst($this->request->controller).'Controller'; 
		$file = ROOT.DS.'controller'.DS.$name.'.php';
		if(!file_exists($file)){
			$this->error('Le controller '.$this->request->controller.' n\'existe pas','e404'); 
		} 
		require $file; 
		$controller = new $name($this->request); 
		return $controller;  
	}
    /**
     * Instancie la methode e404 et inject le message
	 * @string type return type of error
     */
    private function error(string $message,string $type){
		$controller = new controller($this->request);
		if($type == 'e404'){
			return $controller->e404($message); 
		}elseif($type == 'noAcces'){
			return $controller->noAccess($message); 
		}
       
    }














}