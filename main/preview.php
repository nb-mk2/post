<!DOCTYPE html>
<html>
<head>
<?php require_once ('auth.php');?>
<title>
POS
</title>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 

  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');       

   docprint.document.write(content_vlue); 
    docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<?php
$invoice=$_GET['invoice'];
include('../connect.php');
$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= :userid");
$result->bindParam(':userid', $invoice);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$cname=$row['name'];
$invoice=$row['invoice_number'];
$date=$row['date'];
$cash=$row['due_date'];
$cashier=$row['cashier'];
$cuenta=$row['cuenta'];

$pt=$row['type'];
$am=$row['amount'];
if(($pt=='cash') and ($cash <> '')) {
$cash=$row['due_date'];
$amount=$cash-$am;
}
else {
	$amount='';
}



}

?>

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
<body>

<?php include('navfixed.php');?>
	
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
             <div class="well sidebar-nav">
                 <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Tablero </a></li> 
			<li class="active"><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Ventas</a>  </li>             
			<li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Productos</a>                                     </li>
			<li><a href="customer.php"><i class="icon-group icon-2x"></i> Clientes</a>                                    </li>
			<li><a href="supplier.php"><i class="icon-group icon-2x"></i> Proveedores</a>                                    </li>
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Reporte ventas</a>                </li>
			<li><a href="corriente.php"><i class="icon-table icon-2x"></i> Cuenta Corriente</a>                </li>
					
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Tiempo: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
				
				</ul>           
          </div><!--/.well -->
        </div><!--/span-->
		

	<div class="span10">
	<a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><button class="btn btn-default"><i class="icon-arrow-left"></i> Back to Sales</button></a>
<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Imprimir</button></a>
		</div><br/><br/><br/><br/>


<div class="content" id="content">
<div style="margin: 0 auto; padding: auto; width: 900px; height: auto; font-weight: normal; border-style: groove;">
	<div style="width: 100%; height: 190px;" >
	<div style="width: 900px; float: left;">
		
		<table cellpadding="3" cellspacing="0" style="font-family: arial; font-size: 13px; text-align:right;width : 100%; ">
	
		<tr>
			<td>Fecha: <?php echo $date ?> &nbsp;   Telefono: 387758 			//			 Cel 2954 676181</td>
	</table>

	<img src="b.jpg"  width="150"
     height="150" >
	 
	<div style="text-align:center; margin-top:-70px">
		<div style="font:bold 35px 'Aleo';">Presupuesto de compra</div>
		Corralon Bauer	<br>
 		Ventas de materiales & ferreteria<br>	<br>
	</div>
	
	
	<div>
	<?php
	
	$resulta = $db->prepare("SELECT * FROM customer WHERE customer_name= :a");
	$resulta->bindParam(':a', $cname);
	$resulta->execute();
	for($i=0; $rowa = $resulta->fetch(); $i++){

	$address=$rowa['address'];
	$contact=$rowa['contact'];
	}
	?>
	
	
	
	</div>
	</div>
	<div style="width: auto; float: left; height: 75px;">
	<table cellpadding="3" cellspacing="auto" style="margin-top:-15px; font-family: arial; font-size: 13px;text-align:left;width : 100%;">
	
		<tr>
			<td>Nombre del cliente: <?php echo $cname ?></td>
			
		</tr>
		
				<tr>
			<td>Telefono del cliente:  <?php echo $contact ?></td>
		</tr>
		
		<tr>
			<td>Direccion:  <?php echo $address ?></td>
		</tr>
		
	</table>
	
	</div>
	<div class="clearfix"></div>
	</div>
	<div style="width: 100%; margin-top:-70px;">
	<table border="1" cellpadding="2" cellspacing="0" style="font-family: arial; font-size: 12px;	text-align:left;" width="100%">
		<thead>
			<tr>
				<th width="0"> Nombre producto </th>
				<th> Cantidad </th>
				<th> Precio Unidad</th>
			
				<th> Precio total </th>
			</tr>
		</thead>
		<tbody>
			
				<?php
					$id=$_GET['invoice'];
					$result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
					$result->bindParam(':userid', $id);
					$result->execute();
					for($i=0; $row = $result->fetch(); $i++){
				?>
				<tr class="record">
				<td><?php echo $row['product_code']; ?></td>
				<td><?php echo $row['qty']; ?></td>
				<td>
				<?php
				$ppp=$row['price'];
				echo formatMoney($ppp, true);
				?>
				</td>
				
				<td>
				<?php
				$dfdf=$row['amount'];
				echo formatMoney($dfdf, true);
				?>
				</td>
				</tr>
				<?php
					}
				?>
			
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 12px;">Total: &nbsp;</strong></td>
					<td colspan="4"><strong style="font-size: 12px;">
					<?php
					$sdsd=$_GET['invoice'];
					$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
					$resultas->bindParam(':a', $sdsd);
					$resultas->execute();
					for($i=0; $rowas = $resultas->fetch(); $i++){
					$fgfg=$rowas['sum(amount)'];
					echo formatMoney($fgfg, true);
					}
					?>
					</strong></td>
				</tr>
				
				
				<?php if($pt=='cash'){
				?>
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">Efectivo Ofrecido
:&nbsp;</strong></td>
					<td colspan="4"><strong style="font-size: 12px; color: #222222;">
					<?php
					echo formatMoney($cash, true);
					?>
					</strong></td>
				</tr>
				<?php
				}
				?>
				
				
				<tr>
					<td colspan="4" style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">
					<font style="font-size:20px;">
							
				<?php
					
					if (($cuenta=='presupuesto') or ($cash=='')) {
						echo 'Boleta Presupuesto';
						$verificacion=false;
					}
					else {
					if($cash<$fgfg){
					echo 'Cuenta Corriente / Debe:';
					
						
					// configuration
					include('../connect.php');

					// query
					$sql = "UPDATE sales SET cuenta='Cuenta Corriente' WHERE invoice_number='$invoice'";
					$q = $db->prepare($sql);
					$q->execute();
					

						
					$verificacion=true;					
					}
					if($cash>=$fgfg){
					echo 'Cambio:';
					$verificacion=true;
					}
					}
					?>
					
					&nbsp;
					
					</strong>
					</td>
					<td colspan="4"><strong style="font-size: 15px; color: #222222;">
					
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
					if ($verificacion==true)
					{
					if($pt=='credit'){
					echo $cash;
					}
					if($pt=='cash'){
					echo formatMoney($amount, true);
					}
					}
					?>
					</strong>
					
					</td>
				</tr>
				
				
				
				<?php
				$sdsd=$_GET['invoice'];
				$sql = "UPDATE sales SET profit='$amount' WHERE invoice_number='$sdsd'";
				$q = $db->prepare($sql);
				$q->execute();
				?>
			
		</tbody>
	</table>
	
	<div colspan="1" style=" text-align:right; margin-right:20px;"><strong style="font-size: 12px; color: #222222;">Presupuesto sin IVA&nbsp;</strong></div>
	</div>
	</div>
	</div>
	</div>
	
</div>
</div>


