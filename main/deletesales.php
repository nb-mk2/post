<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM sales WHERE invoice_number= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>