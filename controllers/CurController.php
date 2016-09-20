<?php
$root=dirname($_SERVER['SCRIPT_FILENAME']);

require_once ($root.'/core/Controller.php');

require_once ($root.'/core/Models.php');

class CurController extends Controller {

public $viewpath='views/cur/';

/* */

public function actionList(){


$data=Cur::findAll();


if (isset($_COOKIE['maincur'])) $maincur=$_COOKIE['maincur']; else $maincur=1;


if (isset($_GET['maincur']) ) {

$maincur=$_GET['maincur'];

$expires=time()+60*60*72;

setcookie('maincur',$maincur,$expires);

$msg= 'Валюта выбрана';

}

return $this->render('list',array('data'=>$data, 'maincur'=>$maincur, 'msg'=>$msg));

}


/* */

public function actionCreate(){

$db=Cur::$db;

$t=Cur::$table;

$sql="select * from $db.$t";

$model = new Cur;

if (isset($_GET['kurs']) and isset($_GET['kod'])) {
$model->kod=$_GET['kod'];
$model->kurs=$_GET['kurs'];
$model->save();
$data=Cur::findBySql($sql);

return $this->render('list',array('data'=>$data));
}

return $this->render('create',array('model'=>$model));

}

/* demo 
public function actionHello(){

$hi='Hi all!';

return $this->render('hello',array('hi'=>$hi));

}

*/

}


?>
