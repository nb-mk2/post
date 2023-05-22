<html>
<head>
<title>Checkout</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<?php
	require_once('auth.php');
?>
       
		<link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
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

	<!-- combosearch box-->	
	
	  <script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>

	
	
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->


<script>
function suggest(inputString){
		if(inputString.length == 0) {
			$('#suggestions').fadeOut();
		} else {
		$('#country').addClass('load');
			$.post("autosuggestname.php", {queryString: ""+inputString+""}, function(data){
				if(data.length >0) {
					$('#suggestions').fadeIn();
					$('#suggestionsList').html(data);
					$('#country').removeClass('load');
				}
			});
		}
	}

	function fill(thisValue) {
		$('#country').val(thisValue);
		setTimeout("$('#suggestions').fadeOut();", 600);
	}

</script>

<style>
#result {
	height:20px;
	font-size:16px;
	font-family:Arial, Helvetica, sans-serif;
	color:#333;
	padding:5px;
	margin-bottom:10px;
	background-color:#FFFF99;
}
#country{
	border: 1px solid #999;
	background: #EEEEEE;
	padding: 5px 10px;
	box-shadow:0 1px 2px #ddd;
    -moz-box-shadow:0 1px 2px #ddd;
    -webkit-box-shadow:0 1px 2px #ddd;
}
.suggestionsBox {
	position: absolute;
	left: 10px;
	margin: 0;
	width: 268px;
	top: 40px;
	padding:0px;
	background-color: #000;
	color: #fff;
}
.suggestionList {
	margin: 0px;
	padding: 0px;
}
.suggestionList ul li {
	list-style:none;
	margin: 0px;
	padding: 6px;
	border-bottom:1px dotted #666;
	cursor: pointer;
}
.suggestionList ul li:hover {
	background-color: #FC3;
	color:#000;
}
ul {
	font-family:Arial, Helvetica, sans-serif;
	font-size:11px;
	color:#FFF;
	padding:0;
	margin:0;
}

.load{
background-image:url(loader.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest {
	position:relative;
}
.combopopup{
	padding:3px;
	width:268px;
	border:1px #CCC solid;
}

</style>	
</head>

<body onLoad="document.getElementById('country').focus();">
	<center>
<?php
 	$duedate ="";
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM sales WHERE invoice_number= '$id' ");
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
	$duedate = $row['due_date'];
	$invoice_number = $row['invoice_number']; 
	$nombrePersona = $row['name']; 
	$montoDebe =  $row['profit'];
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savecuentacorriente.php" method="post">
<center><h4><i class="icon-edit icon-large"></i>PAGO cuentas corriente</h4>
<hr>
<div id="ac">
<span><h4><?php echo $nombrePersona . ' DEBE: $' . $montoDebe; ?></h4></span>
<br>
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<input type="hidden" name="duedatee" value="<?php echo $duedate; ?>" />
<input type="hidden" name="invoice_number" value="<?php echo $invoice_number; ?>" />
<span>Paga Con: </span><input type="text" style="width:265px; height:30px;" name="debe" required /><br>

<span>Cuenta : </span>
<select name="cuenta" value="<?php echo $row['cuenta']; ?>">

<option>pagado</option>




</select>

<br>

<a>	
<button href="preview.php?invoice=<?php echo  $row['invoice_number'];?>"class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i>Guardar cambios
</button></a>



</div>

</form>
</center>
<button class="btn btn-danger btn-block btn-large" style="width: 267px;" onclick="window.location.href = 'corriente.php';">Cancelar</button>

<?php
}
?>

</body>

<?php include('footer.php');?>
</html>
