<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savecustomer.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Agregar cliente</h4></center>
<hr>
<div id="ac">
<span>Nombre completo: </span><input type="text" style="width:265px; height:30px;" name="name" placeholder="Nombre" Required/><br>
<span>Dirección : </span><input type="text" style="width:265px; height:30px;" name="address" placeholder="Dirección"/><br>
<span>Telefono : </span><input type="text" style="width:265px; height:30px;" name="contact" placeholder="Telefono"/><br>
<span>Nota : </span><textarea style="height:60px; width:265px;" name="note"></textarea><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Guardar</button>
</div>
</div>
</form>