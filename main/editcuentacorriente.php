<?php
 	$duedate ="";
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= '$id' ");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
	$duedate = $row['due_date'];
	$invoice_number = $row['invoice_number']; 
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savecuentacorriente.php" method="post">
<center><h4><i class="icon-edit icon-large"></i>Editar clientes con cuentas corriente</h4></center>
<hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<input type="hidden" name="duedatee" value="<?php echo $duedate; ?>" />
<input type="hidden" name="invoice_number" value="<?php echo $invoice_number; ?>" />
<span>Paga Con: </span><input type="text" style="width:265px; height:30px;" name="debe"  /><br>

<span>Cuenta : </span>
<select name="cuenta" value="<?php echo $row['cuenta']; ?>">

<option>pagado</option>




</select>

<br>
<div style="float:right; margin-right:10px;">
<a>	
<button href="preview.php?invoice=<?php echo  $row['invoice_number'];?>"class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i>Guardar cambios
</button>
<a/>
	
</div>
</div>
</form>

<?php
}
?>
