<h1>Товар #<?php echo $model->id;   ?></h1>


<?php 

$root=dirname($_SERVER['SCRIPT_FILENAME']);
$webroot='http://'.str_replace($_SERVER['DOCUMENT_ROOT'], $_SERVER['SERVER_NAME'],$root);

//$_SERVER[REQUEST_URI];

?>
<input type='hidden' name='id' value="<?php echo $model->id;   ?>"  >
<h3>Основные параметры</h3>
<table class="table table-striped table-bordered" >
<tr><td>Название</dt><td><?php echo $model->name;   ?></dt></tr>

<tr><td>Цена, <?= $cur->kod; ?></dt><td><?php $curprice = $model->price / $cur->kurs; echo $curprice;   ?></dt></tr>

<tr><td>Фото</dt><td><img class='span1' src="<?php echo $webroot.'/'.$model->file;   ?>" ></dt></tr>

</table>
<?php
//print_r( $rel_atrs);
if (count( $rel_atrs) > 0) :
?>
<h3>Дополнительные характеристики</h3>
<div class="row">
<div class="span5">
<table class="table table-striped table-bordered" >

<?php
foreach ($rel_atrs as $arr) : ?>
<tr><td><?php echo $arr[0]->name;   ?></dt><td><?php echo $arr[1];   ?></dt></tr>


<?php endforeach; ?>
</table>
</div>
</div>
<?php endif; ?>
<a class="btn btn-primary" href="<?php echo $_SERVER[REQUEST_URI]; ?>" >Редактировать</a>


