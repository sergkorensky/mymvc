<h1>Характеристики</h1>



<table class="table table-striped table-bordered" >
<tr><td>id</dt><td>Название</dt></tr>
<?php 
foreach ($data as $atr)  

echo '<tr><td>'.$atr->id.'</dt><td>'.$atr->name.'</dt></tr>';


?>



</table>
