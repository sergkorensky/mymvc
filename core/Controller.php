<?php

class Controller {

public $viewpath='';

public function render($view, array $data=array())
{
$viewfile=$this->viewpath .$view.'.php';

extract($data);

ob_start();

$str=file_get_contents($viewfile);

eval('?>'.$str.'<?');

$result = ob_get_contents();

ob_end_clean();

return $result;

}

}


?>
