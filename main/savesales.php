<?php
session_start();
include('../connect.php');
$a = $_POST['invoice'];
$b = $_POST['cashier'];
$c = date("d/m/Y"); 
$d = $_POST['ptype'];
$e = $_POST['amount'];
$z = $_POST['profit'];
$cname = $_POST['product'];
$nombremat = $_POST['material'];
$cuenta = $_POST['cuenta'];


//pagar correcto o mas
if($d=='credit') {
$f = $_POST['due'];
$sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,due_date,name,material,cuenta) VALUES (:a,:b,:c,:d,:e,:z,:f,:g,:nombremat,:cuenta)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f,':g'=>$cname,':nombremat'=>$nombremat,':cuenta'=>$cuenta));
header("location: preview.php?invoice=$a");
exit();
}

//pagar menos
if($d=='cash') 
{
$f = $_POST['cash'];
$sql = "INSERT INTO sales (invoice_number,cashier,date,type,amount,profit,due_date,name,material,cuenta) VALUES (:a,:b,:c,:d,:e,:z,:f,:g,:nombremat,:cuenta)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$e,':z'=>$z,':f'=>$f,':g'=>$cname,':nombremat'=>$nombremat,':cuenta'=>$cuenta));
header("location: preview.php?invoice=$a");
exit();
}
// query



?>