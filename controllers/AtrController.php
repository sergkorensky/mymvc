<?php
$root=dirname($_SERVER['SCRIPT_FILENAME']);

require_once ($root.'/core/Controller.php');

require_once ($root.'/core/Models.php');

class AtrController extends Controller {

public $viewpath='views/atr/';

/* */

public function actionList(){

$db=Atr::$db;

$t=Atr::$table;

$sql="select * from $db.$t";

$data=Atr::findBySql($sql);

return $this->render('list',array('data'=>$data));

}


/* */

public function actionCreate(){

$db=Atr::$db;

$t=Atr::$table;

$sql="select * from $db.$t";

$model = new Atr;

if (isset($_GET['name']) ) {
$model->name=$_GET['name'];
$model->save();
$data=Atr::findBySql($sql);

return $this->render('list',array('data'=>$data));
}

return $this->render('create',array('model'=>$model));

}


}


?>
