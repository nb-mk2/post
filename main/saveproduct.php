<?php
session_start();
include('../connect.php');
$a = $_POST['code'];

$d = $_POST['price'];

// query
$sql = "INSERT INTO products (product_code,price) VALUES (:a,:d)";
$q = $db->prepare($sql);
$q->execute(array(':a'=>$a,':d'=>$d));
header("location: products.php");


?>