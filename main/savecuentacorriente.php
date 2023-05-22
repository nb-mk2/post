<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$duedate = $_POST['duedatee'];
$invoicenumber = $_POST['invoice_number'];
$b = $_POST['debe'] + $duedate;
$c = $_POST['cuenta'];

// query to update sales table
$sql = "UPDATE sales SET due_date=:due_date, cuenta=:cuenta WHERE invoice_number=:invoice_number";
$q = $db->prepare($sql);
$q->execute(array(':due_date' => $b, ':cuenta' => $c, ':invoice_number' => $id));

// query to insert into sales_cuotas table
$cuota = $_POST['debe'];
$currentDate = date('d-m-Y'); // Obtener la fecha actual en formato 'YYYY-MM-DD'
$sql2 = "INSERT INTO sales_cuotas (date, invoice_number_sales, entrega) VALUES (:date, :invoice_number_sales, :entrega)";
$qq = $db->prepare($sql2);
$qq->execute(array(':date' => $currentDate, ':invoice_number_sales' => $invoicenumber, ':entrega' => $cuota));


header("location: preview.php?invoice=$invoicenumber");
?>
