<h1>Добавить товар</h1>


<?php 

//echo $_SERVER[SERVER_NAME].$_SERVER[REQUEST_URI];

?>

<form method='POST' action="http://<?php echo $_SERVER[SERVER_NAME].$_SERVER[REQUEST_URI];  ?>">
<input type='hidden' name='r' value='item/create'>
<div class="row">
<table class="table table-striped table-bordered span5" >
<tr><td>
Название</dt><td> <input name='name'></dt></tr>

<tr><td>

Цена, <?= $cur->kod; ?> </dt><td><input name='price'></dt></tr>
<!--<tr><td>

Фото </dt><td><input name='file'></dt></tr>-->
</table>
</div>
<input type='submit' class="btn btn-primary" >
</form>
