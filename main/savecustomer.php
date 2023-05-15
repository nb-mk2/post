<?php
session_start();
include('../connect.php');
$a = $_POST['name'];
$b = $_POST['address'];
$c = $_POST['contact'];
$f = $_POST['note'];
$pantalla2 = 0;
$invoice2  = 0;
$pantalla2=$_POST['pantalla2'];
$invoice2 = $_POST['invoice2'];


// validamos si el cliente ya existe
$sql = "SELECT * FROM customer WHERE customer_name=:a OR contact=:c";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':c'=>$c));

if ($q->rowCount() > 0) {
   // el cliente ya existe, mostrar mensaje de error o redirigir al formulario de nuevo
   
    header("location: customer.php?message=ClienteExistente");
} else {
   // el cliente no existe, guardar en la base de datos
   $sql = "INSERT INTO customer (customer_name,address,contact,note) VALUES (:a,:b,:c,:f)";
   $q = $db->prepare($sql);
   $q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':f'=>$f));

   if ($pantalla2 <> 1) {
      header("location: customer.php");
   } else {
      header("location: sales.php?id=cash&invoice=" . $invoice2); 
   }
 
}

?>