<html>
<?php
	require_once('auth.php');
?>
<head>
	   <!-- DATATABLES -->
      <link rel="stylesheet" href="vendors/datatables/css/jquery.dataTables.min.css"> 

   
 <link href="css/bootstrap.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css"> 
 <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="tcal.css" />
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" /
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript" src="tcal.js"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>


 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>

</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
              <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Inicio </a></li> 
			<li><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Ventas</a>  </li>             
			<li><a href="products.php"><i class="icon-list-alt icon-2x"></i>Materiales</a>                                     </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i>Agregar Clientes</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Proveedores</a>                                    </li>
			<li class="active"><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Reporte ventas</a>                </li>
			<li><a href="corriente.php"><i class="icon-bar-chart icon-2x"></i>Cuentas Corriente</a>                </li>
					<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Hora: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="" disabled>
			</form>
			  </div>
			</li>
				
				</ul>     
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-bar-chart"></i> Reporte de ventas
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Inicio</a></li> /
			<li class="active">Reporte de ventas</li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Atras</button></a>
<button  style="float:right;" class="btn btn-success btn-mini"><a href="javascript:Clickheretoprint()"> Imprimir</button></a>

</div>

<form action="salesreport.php" method="get">
<center><strong>De : <input type="text" style="width: 223px; padding:14px;" name="d1" class="tcal" value="" /> A: <input type="text" style="width: 223px; padding:14px;" name="d2" class="tcal" value="" />
 <button class="btn btn-info" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" type="submit"><i class="icon icon-search icon-large"></i> Buscar</button>
</strong></center>
</form>
<div class="content" id="content">
<div style="font-weight:bold; text-align:center;font-size:14px;margin-bottom: 15px;">
Ventas desde la fecha&nbsp;<?php echo $_GET['d1'] ?>&nbsp;hasta&nbsp;<?php echo $_GET['d2'] ?>
</div>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<head>
		<tr style="color: black; border-style">
			<th  width="20%"> Fecha de Transacción </th>
			<th width="20%"> Nombre del cliente </th>
			<th width="18%"> Ventas </th>
		</tr>
	</head>
	<tbody>
		
			<?php
				include('../connect.php');
				$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$result = $db->prepare("SELECT * FROM sales WHERE date BETWEEN :a AND :b and cuenta='pagado' ORDER by transaction_id DESC ");
				$result->bindParam(':a', $d1);
				$result->bindParam(':b', $d2);
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['name']; ?></td>

			<td>$<?php
			$dsdsd=$row['amount'];
			echo formatMoney($dsdsd, true);
			?></td>
			
			</tr>
			<?php
				}
			?>
		
	</tbody>
	<head>
		<tr>
			<th colspan="4" style="border-top:1px solid #999999"> Total: </th>
			<th colspan="1" style="border-top:1px solid #999999"> 
			<?php
				function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				$d1=$_GET['d1'];
				$d2=$_GET['d2'];
				$results = $db->prepare("SELECT sum(amount) FROM sales WHERE date BETWEEN :a AND :b and cuenta='pagado'");
				$results->bindParam(':a', $d1);
				$results->bindParam(':b', $d2);
				$results->execute();
				for($i=0; $rows = $results->fetch(); $i++){
				$dsdsd=$rows['sum(amount)'];
				echo formatMoney($dsdsd, true);
				}
				?>
			</th>
				
		</tr>
	</head>
</table>


<br><br><br>

<!--<input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Buscar Clientes" autocomplete="off" /> -->
<table class="table table-bordered" id="resultTablee" data-responsive="table" style="text-align: left;">
	<thead>

		<tr>
			<td width="12%" style="font-size:14px; color:green;" > Nombre</td>
			<td width="12%"style="font-size:14px; color:green;"> Fecha de la compra</td>
			<td width="12%"style="font-size:14px; color:green;"> Detalles de la compra</td>
			<td width="6%"style="font-size:14px; color:green;"> Ventas </td>
			<td width="10%"style="font-size:14px; color:green;"> Accion </td>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT cuenta,name,amount,date,material,invoice_number FROM sales where cuenta='pagado' ");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			
			<?php $invoice=$row['invoice_number'];?>
			<?php $detalles=''; ?>
			
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['date']; ?></td>
			
			<?php
			$result1 = $db->prepare("SELECT product_code,qty FROM sales_order where invoice='$invoice' ");
			$result1->execute();
			for($e=0; $row1 = $result1->fetch(); $e++){
				
			?>
	
			<?php $detalles= $detalles . $row1['qty'] . ' ' . $row1['product_code'] . ' / ';?>
			
			<?php
				}
			?>
			<td><?php echo $detalles; ?></td>
			
			<td>$<?php echo $row['amount']; ?></td>

			
			<td>
				<a href="#" id="<?php echo $row['invoice_number']; ?>" class="delbutton" title="Click para eliminar venta">
					<button class="btn btn-danger"><i class="icon-trash"></i>Borrar</button>
				</a>
				<a  href="preview.php?invoice=<?php echo  $row['invoice_number'];?>">
					<button class=" btn-danger" style="  background: #27b942; position: auto;">
						<i class="icon icon-search icon-large"></i> Ver
					</button>
				</a>
			</td>
			
			</tr>
			<?php
				}
			?>
		
		
		
	</tbody>
</table>


<div class="clearfix"></div>
</div>
</div>
</div>
<!-- JQUERY -->
    <script src="js/jquery-1.7.2.min.js">
        </script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    </script>
    <script type="js/jquery.dataTables.min.js"></script>
    <!-- BOOTSTRAP -->
     <script src="js.jquery.dataTables.js"></script>

    <script>
        $(document).ready(function () {
            $('#resultTablee').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar&nbsp;:",
                    lengthMenu: "Agrupar de _MENU_ items",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                
                lengthMenu: [ [-1], ["All"] ],
            });
        });
    </script>
</body>

  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Estas seguro que quieres eliminar esta venta?"))
		  {

 $.ajax({
   type: "GET",
   url: "deletesales.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
<?php include('footer.php');?>

</html>
