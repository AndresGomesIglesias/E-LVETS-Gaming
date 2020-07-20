<?php
$debut = microtime(true); 
define('ROOT', dirname(__DIR__));
define('WEBROOT', __DIR__);
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT .DS.'core');
define('CONFIG', ROOT.DS.'config'.DS);
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME']))); 

include CORE.DS.'include.php';

new Dispatcher();
?>
<div style="position:fixed;bottom:0; background:#900; color:#FFF; line-height:30px; height:30px; left:0; right:0; padding-left:10px; ">
<?php 
echo 'Page générée en '. round(microtime(true) - $debut,5).' secondes'; 
?>
</div>