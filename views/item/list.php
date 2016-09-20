<!--<h1> Товары</h1>-->

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
