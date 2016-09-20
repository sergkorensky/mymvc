<h1> Валюты</h1>


<?php 
//print_r($data);



?>

<table class="table table-striped table-bordered" >
<tr><td>id</dt><td>Код</dt><td>Курс к рублю</dt></tr>
<?php 
foreach ($data as $cur)  

echo '<tr><td>'.$cur->id.'</dt><td>'.$cur->kod.'</dt><td>'.$cur->kurs.'</dt></tr>';


?>



</table>
<form action="http://<?php echo $_SERVER[SERVER_NAME].$_SERVER[REQUEST_URI];  ?>">
<input type='hidden' name='r' value='cur/list'>

<h3>Основная валюта</h3>
<select name='maincur'>
<option selected value=0>Выбрать</option>
<?php 
foreach ($data as $cur) :
?>
<option value="<?php echo $cur->id; ?>" <?php if ($cur->id==$maincur) echo 'selected'; ?> ><?php echo $cur->kod; ?>

</option>
<?php endforeach; ?>
</select>
<div class="row"></div>

<p><?= $msg; ?></p>
<input type='submit' class="btn btn-primary"  >
</form>
