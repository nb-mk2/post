<html>
<head>
<title>
POS
</title>

<?php 
require_once('auth.php');
?>
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
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)round(microtime(true)*1000000));
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

<script>
function sum() {
            var txtFirstNumberValue = document.getElementById('txt1').value;
            var txtSecondNumberValue = document.getElementById('txt2').value;
            var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt3').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt22').value = result;				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt11').value;
            var txtSecondNumberValue = document.getElementById('txt33').value;
            var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt55').value = result;
				
            }
			
			 var txtFirstNumberValue = document.getElementById('txt4').value;
			 var result = parseInt(txtFirstNumberValue);
            if (!isNaN(result)) {
                document.getElementById('txt5').value = result;
				}
			
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
			<li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Reporte ventas</a>                </li>
			<li class="active"><a href="corriente.php"><i class="icon-list-alt icon-2x"></i>Cuentas Corriente</a>


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
			<i class="icon-table"></i> Cuentas Corriente
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php">Inico</a></li> /
			<li class="active">Cuentas Corriente</li>
			</ul>


<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Atras</button></a>
			<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT cuenta,profit FROM sales where cuenta='cuenta corriente' ");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			
				<div style="text-align:center;">
			Usuarios con cuentas corriente:  <font color="green" style="font:bold 22px 'Aleo';">[<?php echo $rowcount;?>]</font><br>
			</div>
	
</div>


<!--<input type="text" style="padding:15px;" name="filter" value="" id="filter" placeholder="Buscar Clientes" autocomplete="off" /> -->
<table class="table table-bordered" id="resultTablee" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="12%" style="font-size:14px; color:green;" > Nombre</th>
			<th width="12%" style="font-size:14px; color:green;" > Fecha de la compra</th>
			<th width="12%" style="font-size:14px; color:green;" > Detalles de la compra</th>
			<th width="12%" style="font-size:14px; color:green;" > Cuenta Corriente / Debe </th>
			<th width="6%" style="font-size:14px; color:green;" > Total </th>
			<th width="8%" style="font-size:14px; color:green;" > Accion </th>
		</tr>
	</thead>
	<tbody>
	
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT cuenta,name,profit,date,material,invoice_number FROM sales where cuenta='cuenta corriente' ");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<?php $invoice=$row['invoice_number'];?>
			<?php $detalles=''; ?>
			<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['date']; ?></td>
		

			<?php
			$result1 = $db->prepare("SELECT product_code,qty FROM sales_order where invoice='$invoice' ");
			$result1->execute();
			for($e=0; $row1 = $result1->fetch(); $e++){
				
			?>
			<?php $detalles= $detalles . $row1['qty'] . ' ' . $row1['product_code'] . ' , ';?>
			
			<?php
				}
			?>
			
			<td><?php echo $detalles; ?></td>
			
			<td><?php echo $row['cuenta']; ?></td>
			<td>$<?php  echo $row['profit']; ?></td>
			
			<td><a rel="facebox" title="Click para editar cuenta corriente" href="editcuentacorriente.php?id=<?php echo $row['invoice_number'];  ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i>edit </button></a> 

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

<div class="container py-4 text-center">
            <div class="row g-4">
                <div class="col-auto">
                    <label for="num_registros" class="col-form-label">Mostrar: </label>
                </div>

                <div class="col-auto">
                    <select name="num_registros" id="num_registros" class="form-select">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>

                <div class="col-auto">
                    <label for="num_registros" class="col-form-label">registros </label>
                </div>

                <div class="col-5"></div>

                <div class="col-auto">
                    <label for="campo" class="col-form-label">Buscar: </label>
                </div>
                <div class="col-auto">
                    <input type="text" name="campo" id="campo" class="form-control">
                </div>
            </div>

            <div class="row py-4">
                <div class="col">
                    <table class="table table-sm table-bordered table-striped">
                        <thead>
							<!--<th class="sort asc">id</th> -->
                            <th class="sort asc">Nombre</th>
                            <th class="sort asc">Fecha Compra</th>
							<th class="sort asc">Detalle</th>
							<th class="sort asc">Total</th>
							<th class="sort asc"> Debe </th>				
                            <th class="sort asc" style="width:104px !important;"></th>
	
                        </thead>

                        <!-- El id del cuerpo de la tabla. -->
                        <tbody id="content">

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <label id="lbl-total"></label>
                </div>

                <div class="col-6" id="nav-paginacion"></div>

                <input type="hidden" id="pagina" value="1">
                <input type="hidden" id="orderCol" value="0">
                <input type="hidden" id="orderType" value="asc">
            </div>
        </div>

<div class="clearfix"></div>
</div>
</div>
</div>

<script src="js/jquery.js"></script>
<script type="text/javascript">
/* Llamando a la función getData() */
getData();

/* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData */
document.getElementById("campo").addEventListener("keyup", function() {
    getData();
}, false);
document.getElementById("num_registros").addEventListener("change", function() {
    getData();
}, false);

/* Peticion AJAX */
function getData() {
    let input = document.getElementById("campo").value;
    let num_registros = document.getElementById("num_registros").value;
    let content = document.getElementById("content");
    let pagina = document.getElementById("pagina").value;
    let orderCol = document.getElementById("orderCol").value;
    let orderType = document.getElementById("orderType").value;

    if (pagina == null) {
        pagina = 1;
    }

    let url = "buscarcorriente.php";
    let formaData = new FormData();
    formaData.append('campo', input);
    formaData.append('registros', num_registros);
    formaData.append('pagina', pagina);
    formaData.append('orderCol', orderCol);
    formaData.append('orderType', orderType);

    fetch(url, {
        method: "POST",
        body: formaData
    })
    .then(response => response.json())
    .then(data => {
        content.innerHTML = data.data;
        document.getElementById("lbl-total").innerHTML = 'Mostrando ' + data.totalFiltro +
            ' de ' + data.totalRegistros + ' registros';
        document.getElementById("nav-paginacion").innerHTML = data.paginacion;

        let container = document.getElementById("content");
container.addEventListener("click", function(event) {
  if (event.target.classList.contains("rel")) {
    facebox();
  }
});
    })
    .catch(err => console.log(err));
}


function nextPage(pagina) {
    document.getElementById('pagina').value = pagina;
    getData();
}

let columns = document.getElementsByClassName("sort");
let tamanio = columns.length;
for (let i = 0; i < tamanio; i++) {
    columns[i].addEventListener("click", ordenar);
}

function ordenar(e) {
    let elemento = e.target;

    document.getElementById('orderCol').value = elemento.cellIndex;

    if (elemento.classList.contains("asc")) {
        document.getElementById("orderType").value = "asc";
        elemento.classList.remove("asc");
        elemento.classList.add("desc");
    } else {
        document.getElementById("orderType").value = "desc";
        elemento.classList.remove("desc");
        elemento.classList.add("asc");
    }

    getData();
}

$(document).ready(function() {

/* Llamando a la función getData() */
getData();

/* Escuchar un evento keyup en el campo de entrada y luego llamar a la función getData */
$("#campo").on("keyup", function() {
  getData();
});

$("#num_registros").on("change", function() {
  getData();
});

/* Peticion AJAX */
function getData() {
  // ...
}

function nextPage(pagina) {
  // ...
}

let columns = document.getElementsByClassName("sort");
let tamanio = columns.length;
for (let i = 0; i < tamanio; i++) {
  columns[i].addEventListener("click", ordenar);
}

function ordenar(e) {
  // ...
}

// Enlazar el evento click al contenedor principal
$(document).on('click', '.delbutton', function() {
    var del_id = $(this).attr("id");
    var info = 'id=' + del_id;
    var row = $(this).closest('tr'); // Obtener la fila padre (tr) que contiene el botón de eliminar
    if (confirm("¿Seguro que quieres eliminar este Cliente?")) {
        $.ajax({
            type: "GET",
            url: "deletecustomer.php",
            data: info,
            success: function() {
                row.fadeOut('slow', function() {
                    row.remove();
                });
            }
        });
   
    }
    return false;
});



});

</script>


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
<?php include('footer.php');?>

</html>