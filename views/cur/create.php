<h1>Добавить валюту</h1>


<?php 

//echo $_SERVER[SERVER_NAME].$_SERVER[REQUEST_URI];

?>

<form action="http://<?php echo $_SERVER[SERVER_NAME].$_SERVER[REQUEST_URI];  ?>">
<input type='hidden' name='r' value='cur/create'>
<div class="row">
<table class="table table-striped table-bordered span5" >
<tr><td>
Код </td><td><input name='kod'></dt></tr>

<tr><td>


Курс к рублю</td><td> <input name='kurs'></dt></tr>
</table>
</div>
<input type='submit' class="btn btn-primary" >
</form>
