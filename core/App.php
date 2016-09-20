<?php

$root=dirname($_SERVER['SCRIPT_FILENAME']);

include($root.'/controllers/CatController.php');
include($root.'/controllers/ItemController.php');
include($root.'/controllers/CurController.php');
include($root.'/controllers/AtrController.php');

class App {

public $name= 'My MVC Site';

public $dbh;

public $content;

private $_dbconf=array();

public $out='views/layout/main.php';

public function run() {

$query = urldecode($_SERVER['QUERY_STRING']);

$query_parts=explode('&',$query);

$routing0=$query_parts[0];

if (preg_match('#^r=(\w+)/(\w*)$#',$routing0,$match )) {
unset($match[0]);
unset($query_parts[0]);
$text=$this->route($match,$query_parts);
}else{$text=$this->route($match);
}

ob_start();


echo $text;


$this->content = ob_get_contents();//контент страницы 

ob_end_clean();

$string=file_get_contents($this->out);

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) 

echo $this->content; 

else

printf($string,$this->name, $this->content);

}

public function route(array $match, array $query_parts=array() ) {
/**/
if(isset($_POST['r'])){
$q=urldecode($_POST['r']);
$m=explode('/',$q);
if (count($match) > 1 ) {
$controller_id= $m[0];
$action_id=$m[1];
$classname=ucwords($controller_id).'Controller';
$method='action'.ucwords($action_id);

if( in_array($method, get_class_methods($classname))) {

$obj= new $classname;
return $obj->{$method}();
}else{

return 'Hellog world!';}



}
}

if (count($match) > 1 ) {
$controller_id= $match[1];
$action_id=$match[2];
$classname=ucwords($controller_id).'Controller';
$method='action'.ucwords($action_id);

if( in_array($method, get_class_methods($classname))) {

$obj= new $classname;
return $obj->{$method}();//+ параметры $obj->{$method}(5);
}else{

return 'Helloh world!';}

}else{return '<h1>Welcome!</h1>';}

}

}

?>
