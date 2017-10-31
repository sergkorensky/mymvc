<h1>Редактировать товар</h1>


<?php 

$root=dirname($_SERVER['SCRIPT_FILENAME']);

$webroot=dirname($_SERVER['PHP_SELF']);

?>

<form method='POST' action="http://<?php echo $_SERVER[SERVER_NAME].$_SERVER[REQUEST_URI];  ?>" enctype='multipart/form-data'	>
<input type='hidden' name='r' value='item/update'>
<input type='hidden' name='id' value="<?php echo $model->id;   ?>">
<div class="row">
<div class="span8"><h3>Основные параметры</h3>
<table class="table table-striped table-bordered span8" >
<tr><td>
Название</dt><td> <input name='name' value="<?php echo $model->name;   ?>"></dt></tr>

<tr><td>

Цена, <?= $cur->kod; ?> </dt><td> <input name='price' value="<?php $curprice = $model->price / $cur->kurs; echo $curprice;   ?>"></dt></tr>

<tr><td>Фото </dt><td><img class='span2' src="<?php echo $webroot.'/'.$model->file;   ?>" ><span class="span2">  Изменить: 

<input type='hidden' name='MAX_FILE_SIZE' value='400000' >

<input type='file' name='myfile'  ></span></dt></tr>
</table>
</div>
</div>
<?php
//print_r( $rel_atrs);
if (count( $rel_atrs) > 0) :
?>
<h3>Дополнительные характеристики</h3>
<div class="row">
<div class="span5">
<table class="table table-striped table-bordered  span4" >

<?php
foreach ($rel_atrs as $arr) : ?>
<tr><td><?php echo $arr[0]->name;   ?><input type='hidden' name='idatr[]' value="<?php echo $arr[0]->id;   ?>">
</dt><td><input name='valatr[]' value="<?php echo $arr[1];   ?>" ></dt></tr>


<?php endforeach; ?>
</table>
</div>
</div>
<?php endif; ?>
<div class="row">
<div class="span8">
<h3>Добавить характеристику</h3>
<select name='ext_atr'>
<option selected value=0>Выбрать</option>
<?php 
foreach ($atrs as $atr) :
?>
<option value="<?php echo $atr->id; ?>" ><?php echo $atr->name; ?>

</option>
<?php endforeach; ?>
</select>
</div></div>
<input type='submit' class="btn btn-primary"  >
</form>
