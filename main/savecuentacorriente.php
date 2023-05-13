<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$duedate = $_POST['duedatee'];
$invoicenumber = $_POST['invoice_number'];
$b = $_POST['debe'] + $duedate ;
$c = $_POST['cuenta'];
// query
$sql = "UPDATE sales SET due_date='$b', cuenta='$c' WHERE invoice_number='$id'";
$q = $db->prepare($sql);
$q->execute();
header("location: preview.php?invoice=$invoicenumber");


?>

