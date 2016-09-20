<?php 
$root=dirname($_SERVER['SCRIPT_FILENAME']);
$webroot='http://'.str_replace($_SERVER['DOCUMENT_ROOT'], $_SERVER['SERVER_NAME'],$root);
?>
<h1> Товары</h1>

<div class="row">
<div class="span4">


Сортировка по цене
<select name='sort' id='sort'>
<option selected value=0>Без сортировки</option>
<option  value=1>По возрастанию</option>
<option  value=2>По убыванию</option>
</select>



Поиск по названию
<input type='text' name="word" id="word">
<div class="row"></div>
Min цена
<input id="minprice" type="range" value=0 max=1000 /> <input type='text' id="mininput" class="span1" value=0  />
<div class="row"></div>
Max цена
<input id="maxprice" type="range" value=1000 max=1000 /> <input type='text' id="maxinput" class="span1" value=1000  />
<div>

<?php 
//print_r($_SERVER);
?>
</div>
</div>


<div class="span8" id='result'>
<table class="table table-striped table-bordered" >
<tr><td>id</dt><td>Название</dt><td>Цена, <?= $cur->kod; ?></dt><td>Фото</dt></tr>
<?php 
foreach ($data as $item)  
{
$curprice=$item->price / $cur->kurs;

echo '<tr><td>'.$item->id.'</dt><td><a href="?r=item/update&id='.$item->id.'" >'.$item->name.'</a></dt><td>'.
$curprice.'</dt><td>'.$item->file.'</dt></tr>';

}
?>
</table>
</div></div>



<script>
$(document).ready(function(){

$('#sort, #word, #minprice, #maxprice').change(function(){

var s= $('#sort').val();

var w= $('#word').val();

var minprice = $('#minprice').val();

var maxprice = $('#maxprice').val();

$('#mininput').val(minprice); $('#maxinput').val(maxprice);

$('#result').load('<?= $webroot; ?>/?r=item/list&sort='+s+'&word='+w+'&min='+minprice+'&max='+maxprice);


});




});

</script>
