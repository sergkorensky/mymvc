<?php
$root=dirname($_SERVER['SCRIPT_FILENAME']);

require($root.'/core/App.php');

$app=new App();

$app->run();



?>
