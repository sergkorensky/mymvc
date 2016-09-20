<?php

class Model {

public static $classname='Model';

public static $db='cat';

public static $table='cur';

public $id;

public static $dbh;
/**/
public static function init(){
/**/
if (self::$dbh == null)

self::$dbh=new PDO('mysql:localhost;dbname=cat','nina','535');

}

public static function getAtrNames(){

$db=self::$db;
$t=static::$table;//для производных классов!

$sql="show columns from $db.$t";

self::init();

$dbh=self::$dbh;

$sth = $dbh->prepare($sql);

$sth->execute();

$names=array();

while($res = $sth->fetch()) $names[]= $res[0];

return $names;

}

public function save(){

$atrnames=static::getAtrNames();

$names='(';

$values='(';
/**/
foreach ($atrnames as $atr){
if ($atr == 'id' ) continue;//or {$this->$atr} === null
$names .= $atr.',';

$values .="'".$this->$atr."'".',';

}

$names=preg_replace('/^(.*)(,)$/s','$1)',$names);
$values=preg_replace('/^(.*)(,)$/s','$1)',$values);

$db = self::$db;
$t = static::$table;

/**/
if ($this->id !== null ){//update

$sql = "update {$db}.$t set ";

foreach ($atrnames as $atr){
if ($atr == 'id' or $this->$atr === null) continue;

$sql .= "$atr='{$this->$atr}',";

}
$sql = preg_replace('/^(.*)(,)$/s','$1 where ',$sql);

$sql .= "id={$this->id}";

}else{//insert

$sql = "insert into {$db}.$t $names values $values";

}


$dbh=self::$dbh;

$sth = $dbh->prepare($sql);

return $sth->execute();

}

public static function findOne($id){
$db = self::$db;
$t = static::$table;

$sql= "select * from {$db}.$t where id=$id"; 

$out= static::findBySql($sql);

return count($out) ? $out[0] : null;
}

public static function findAll(){

$db = self::$db;

$t = static::$table;

$sql= "select * from {$db}.$t "; 

$out= static::findBySql($sql);

return $out;
}

public static function findBySql($sql) {

self::init();

$dbh=self::$dbh;

$sth = $dbh->prepare($sql);

$sth->execute();

$out=array();

$atrnames=static::getAtrNames();

while($res = $sth->fetch()){

$one = new static::$classname;

foreach ($atrnames as $atr){

if (isset($res[$atr]) ) {

$val=$res[$atr];
$one->setProp($atr,$val);}

}
$out[]=$one;
unset($one);
}

return $out;
}

public function setProp($name,$value){

$this->$name=$value;

}

public function __construct(){

$atrnames=static::getAtrNames();

foreach ($atrnames as $atr) $this->setProp($atr,null);

}




}


class Atr extends Model{

public static $classname='Atr';

public static $table='atr';

}

class Cur extends Model{

public static $classname='Cur';

public static $table='cur';

}

class Item extends Model{

public static $classname='Item';

public static $table='item';


public function link(Atr $a, $val=null){

$db = self::$db;

$t = static::$table;

$id=$this->id;

if ($id === null or static::findOne($id) === null) return false;

self::init();

$dbh=self::$dbh;

$atr_id=$a->id;

$link_table='item_has_atr';

//if ($val===null) $sql="insert into $db.$link_table (item_id,atr_id) values ($id,$atr_id) on duplicate key update set val=$val"; else

$sql="insert into $db.$link_table (item_id,atr_id,val) values ($id,$atr_id,'$val') on duplicate key update  val='$val'"; 

$sth = $dbh->prepare($sql);

return $sth->execute();

}
 
public function getRelAtrs(){

$db = self::$db;

$t = static::$table;

$id=$this->id;

self::init();

$dbh=self::$dbh;

$link_table='item_has_atr';

$sql="select atr_id, val from $db.$link_table where item_id=$id";

$sth = $dbh->prepare($sql);

$sth->execute();

$out=array();

while($row = $sth->fetch(PDO::FETCH_ASSOC)){

$atr_id=$row['atr_id'];

$val = $row['val'];

$atr=Atr::findOne($atr_id);

$out[]=array($atr, $val);

}
 
return $out;

}

}
/*
$item=Cur::findOne(4);
print_r($item);


$items= Item::findBySql('select * from cat.item ');
print_r($items);
*/
//print_r( Item::getAtrNames());
//print_r( Atr::getAtrNames());
/*
$item=Item::findOne(4);
$atr=Atr::findOne(3);
$item->link($atr);
*/
?>
