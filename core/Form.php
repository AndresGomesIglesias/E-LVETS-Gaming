<?php
class Form{
	
	public $controller; 
	public $errors; 

	public function __construct($controller){
		$this->controller = $controller;
	}
	public function input($name,$label,$options = array(),$dis = null){
		
		$error = false; 
		$classError = ''; 
		if(isset($this->errors[$name])){
			$error = $this->errors[$name];
			$classError = ' text-danger'; 
		}
	
		if(!isset($this->controller->request->data->$name)){
			$value = ''; 
		}else{
				$value = $this->controller->request->data->$name; 
			
		}
	// dd($this->controller->request->data);
		if($label == 'hidden'){
			return '<input  type="hidden" name="'.$name.'" value="'.$value.'">'; 
		}
	
			if(isset($options['noDiv']) == 'bootstrap'){ 
				$html = '<div id="'.$name.'" class="input-group input-group-lg">
				<div class="input-group-prepend">
				<span class="input-group-text" id="inputGroup-sizing-lg"><i class="'.$options['fontawesome'].'"></i>  </span>';
			}else{
				$html = '<div id="clearfix_'.$name.'" class="clearfix'.$classError.'">
				<label for="input_'.$name.'">'.$label.'</label>
				<div class="div_'.$name.'">';
			}

		$attr = ''; 
		foreach($options as $k=>$v){ if($k!='type'){
			error_reporting(0);
			$attr .= " $k=\"$v\""; 
		}}
		/**INPUT*/
	
		if(!isset($options['type']) && !isset($options['options']) && !isset($options['options2'])){
			$html .= '<input type="text" id="input_'.$name.'" name="'.$name.'" value="'.$value.'"'.$attr.'>';
			
		/**SELECT*/
		}elseif(isset($options['options'])){
			$html .= '<select '.$attr.' id="input_'.$name.'" name="'.$name.'">';
			$html .= '<option  value="0" > '.$options['txt'].'</option>'; 
			foreach($options['options'] as $k=>$v){
			
				if(isset($this->controller->request->data->gameID) && isset($this->controller->request->data->gamesName)){ // ERROR ICI
					$html .= ' <option   value="'.$v->id.'" '.(($v->id==$this->controller->request->data->gameID)?'selected':'').'>'.$v->$name.'</option>'; 
				}elseif(isset($this->controller->request->data->members)){
					$html .= ' <option   value="'.$v[$name].'" '.(($v[$name]==$this->controller->request->data->members)?'selected':'').'>'.$v[$name].'</option>'; 
				}else{
					$html .= ' <option   value="'.$v->id.'" '.(($v->id==$value)?'selected':'').'>'.$v->$name.'</option>'; 
				}
					
			}
			$html .= '</select>';
			/**SELECT*/
		}elseif(isset($options['options2'])){
			$html .= '<select '.$attr.' id="input_'.$name.'" name="'.$name.'">';
			foreach($options['options2'] as $k=>$v ){
				// dd($this->controller->request->data);
					$html .= ' <option   value="'.$v['id'].'" '.(($v['id']==$value)?'selected':'').'>'.$v[$name].'</option>'; 
			}
			$html .= '</select>';
					/**SELECT*/

		/**TEXTAREA*/	
		}elseif($options['type'] == 'textarea'){
			$html .= '<textarea id="input_'.$name.'" name="'.$name.'"'.$attr.'>'.$value.'</textarea>';
		/**CHECKBOX*/	
		}elseif($options['type'] == 'checkbox'){
			// dd($this->controller->request->data->$name);
			$html .= '<input type="hidden" name="'.$name.'" value="0"><input type="checkbox" name="'.$name.'" value="1" '.(empty($value)?'':'checked').'>'; 
		}elseif($options['type'] == 'alchemists_checkbox'){
			
			$html .= 
	
			'<label class="checkbox checkbox-inline">'.
			'<input type="hidden" name="'.$name.'" value="0"><input type="checkbox" name="'.$name.'" value="1" '.(empty($value)?'':'checked').'>'.
				'<span class="checkbox-indicator"></span>'.
				'<span>'.$options['txt'].'</span>'.
			'</label>';  
		/**RADIO*/
		}elseif($options['type'] == 'radio'){
			$html .= '<input type="hidden" name="'.$name.'" value="0"><input type="radio" name="'.$name.'" value="1" '.(empty($value)?'':'checked').'>'; 
		}elseif($options['type'] == 'file'){
			$html .= '<input type="file" class="input-file" id="input_'.$name.'" name="'.$name.'"'.$attr.'>';
		/**PASSWORD*/
		}elseif($options['type'] == 'password'){
			$html .= '<input type="password" id="input_'.$name.'" name="'.$name.'" value="'.$value.'"'.$attr.'>';
		/**mail*/
		}elseif($options['type'] == 'email'){
			$html .= '<input type="email" id="input_'.$name.'" name="'.$name.'" value="'.$value.'"'.$attr.'>';
		/**color*/
		}elseif($options['type'] == 'color'){
		$html .= '<input type="color" id="input_'.$name.'" name="'.$name.'" value="'.$value.'"'.$attr.'>';
		/**DATEPICK*/
		}elseif($options['type'] == 'datepick'){
			$html .= '<input width="150" id="datepicker" name="'.$name.'" value="'.$value.'"'.$attr.'>';
		}
		
		if($error){
			$html .= '<span class="help-inline js-error">'.$error.'</span>';
		}
		$html .= '</div></div>';
		return $html; 
	}
	



/**
 * Permet de créer des array pour envoyer à l'objet Form
 * @return objet fromater;
 */
	public function custumeArrayForObjectForm($name,$lists = []){
		foreach($lists as  $k=>$v){
			$firstArray[] = array('id' => $k,$name =>$v);
		}
		return $firstArray;
	}
}