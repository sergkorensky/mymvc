<h1>Добавить характеристику</h1>


<?php 

//echo $_SERVER[SERVER_NAME].$_SERVER[REQUEST_URI];

?>

<form action="http://<?php echo $_SERVER[SERVER_NAME].$_SERVER[REQUEST_URI];  ?>">
<input type='hidden' name='r' value='atr/create'>
<div class="row">
<table class="table table-striped table-bordered span5" >
<tr><td>
Название</td><td><input name='name'></dt></tr>
</table>
</div>
<input type='submit' class="btn btn-primary" >
</form>
