<?php
$root=dirname($_SERVER['SCRIPT_FILENAME']);

require_once ($root.'/core/Controller.php');

require_once ($root.'/core/Models.php');

class ItemController extends Controller {

public $viewpath='views/item/';

/* */

public function actionList() { 

if (isset($_COOKIE['maincur'])) $maincur=$_COOKIE['maincur']; else $maincur=1;

$cur=Cur::findOne($maincur);

if ($cur === null) { $maincur=1; $cur=Cur::findOne($maincur);}

$db=Item::$db;

$t=Item::$table;

$sql="select * from $db.$t";

if(isset($_GET['word']) ) {

$word='%'.$_GET['word'].'%';

$min=$_GET['min'] * $cur->kurs;

$max=$_GET['max'] * $cur->kurs;

$sql .= " where name like '$word' and price between $min and $max";

}


if(isset($_GET['sort']) ) {

$sort=$_GET['sort'];

switch ($sort){

case 1:
$sql .= " order by price asc";
break;

case 2:
$sql .= " order by price desc";
break;
}

}


$data=Item::findBySql($sql);

if (isset($_COOKIE['maincur'])) $maincur=$_COOKIE['maincur']; else $maincur=1;

$cur=Cur::findOne($maincur);

if ($cur === null) { $maincur=1; $cur=Cur::findOne($maincur);}

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) 

return $this->render('list',array('data'=>$data, 'cur'=>$cur));

else

return $this->render('list2',array('data'=>$data, 'cur'=>$cur));

}

/* */

public function actionCreate(){

if (isset($_COOKIE['maincur'])) $maincur=$_COOKIE['maincur']; else $maincur=1;

$cur=Cur::findOne($maincur);

if ($cur === null) { $maincur=1; $cur=Cur::findOne($maincur);}

$db=Item::$db;

$t=Item::$table;

$sql="select * from $db.$t";

$model = new Item;

if (isset($_POST['name']) ) {
$model->name=$_POST['name'];
$model->price=$_POST['price'] * $cur->kurs;
$model->save();
$data=Item::findBySql($sql);

return $this->render('list',array('data'=>$data, 'cur'=>$cur));
}

return $this->render('create',array('model'=>$model, 'cur'=>$cur));

}

/* */

public function actionUpdate(){

global $root;

if (isset($_COOKIE['maincur'])) $maincur=$_COOKIE['maincur']; else $maincur=1;

$cur=Cur::findOne($maincur);

if ($cur === null) { $maincur=1; $cur=Cur::findOne($maincur);}

$id=$_REQUEST['id'];

$model=Item::findOne($id);

$atrs = Atr::findAll();

$rel_atrs=$model->getRelAtrs();

if (isset($_POST['name']) ) {
$model->name=$_POST['name'];
$model->price=$_POST['price'] * $cur->kurs;

if(isset($_FILES['myfile'])){
$uf=$_FILES['myfile'];
$dir=$root.'/images/'.$model->id;
if (!file_exists($dir) ) mkdir($dir,0777,true);
$dest=$dir.'/'.$uf['name'];
if(move_uploaded_file($uf['tmp_name'], $dest)) $model->file='images/'.$model->id.'/'.$uf['name'];}//file
$model->save();



if (isset($_POST['ext_atr']) ) {
$atr_id=$_POST['ext_atr'];
if ( $atr=Atr::findOne($atr_id)) $model->link($atr);

}

if (isset($_POST['idatr']) ) { $relat_id=$_POST['idatr']; $relat_val=$_POST['valatr'];
foreach ($relat_id as $key => $eat_id){
$val=$relat_val[$key];
$eatr=Atr::findOne($eat_id);
$model->link($eatr,$val);
}
}//

$rel_atrs=$model->getRelAtrs();

return $this->render('show',array('model'=>$model, 'rel_atrs' => $rel_atrs, 'cur'=>$cur));
}

return $this->render('update',array('model'=>$model,'atrs' => $atrs, 'rel_atrs' => $rel_atrs, 'cur'=>$cur ));

}



/* demo */

public function actionHello(){

$hi='Hi all!';

return $this->render('hello',array('hi'=>$hi));

}



}


?>
