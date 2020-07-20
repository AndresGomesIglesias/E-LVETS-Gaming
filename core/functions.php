<?php 
function debug($var){
		$debug = debug_backtrace(); 
		echo '<p style="width: auto; padding-bottom: 100px;">&nbsp;</p><p><a href="#" onclick="$(this).parent().next(\'ol\').slideToggle(); return false;"><strong>'.$debug[0]['file'].' </strong> l.'.$debug[0]['line'].'</a></p>'; 
		echo '<ol style="display:none;">'; 
		foreach($debug as $k=>$v){ if($k>0){
			echo '<li><strong>'.$v['file'].' </strong> l.'.$v['line'].'</li>'; 
		}}
		echo '</ol>'; 
		echo '<pre style="width: 100%; background: white;">';
		print_r($var);
		echo '</pre>'; 
}

function dd($var){
	$debug = debug_backtrace(); 
	echo '<p style=" width: auto; padding-bottom: 100px;">&nbsp;</p><p><a href="#" onclick="$(this).parent().next(\'ol\').slideToggle(); return false;"><strong>'.$debug[0]['file'].' </strong> l.'.$debug[0]['line'].'</a></p>'; 
	echo '<ol style="display:none;">'; 
	foreach($debug as $k=>$v){ if($k>0){
		echo '<li><strong>'.$v['file'].' </strong> l.'.$v['line'].'</li>'; 
	}}
	echo '</ol>'; 
	echo '<pre style="width: 100%; background: white;">';
	print_r($var);
	echo '</pre>'; 
	die();
}

function isXmlHttpRequest(){
    $header = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : null;
    return ($header === 'XMLHttpRequest');
}


