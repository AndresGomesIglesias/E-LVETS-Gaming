<?php


 class  Permission {
  
    


    /**
     * Permet d'ouvrir un menu spécifique par Grade
     */
    public static function ifIsAllowGetNavBar($grade){
        if(!empty($grade)){
            $file = ROOT.DS.'view'.DS.'includes'.DS.'navbar'.DS.$grade.'_navbar.php'; 
            require_once($file);
        }else{
            return null;
        }
    }













    
}