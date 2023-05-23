<?php
// configuration
include('../connect.php');

// new data
$id = $_POST['memi'];
$invoice = $_POST['invoice'];
$name = $_POST['code'];
$price = $_POST['price'];
$cantidad = $_POST['qty'];
$monto = $cantidad * $price ;

try {
    // Begin transaction
    $db->beginTransaction();

    // Update sales_order
    $sql = "UPDATE sales_order 
            SET price=?, amount=?, qty=?
            WHERE transaction_id=?";
    $q = $db->prepare($sql);
    $q->execute(array($price, $monto, $cantidad, $id));

    // Get total amount from sales_order
    $sql2 = "SELECT SUM(amount) AS total_amount FROM sales_order WHERE invoice=?";
    $q2 = $db->prepare($sql2);
    $q2->execute(array($invoice));
    $totalAmount = $q2->fetchColumn();

// Update sales
$sql3 = "UPDATE sales
         SET amount = ?,
             cuenta = CASE
                          WHEN due_date >= $totalAmount THEN 'Pagado'
                          ELSE 'Cuenta Corriente'
                      END
         WHERE invoice_number = ?";
$q3 = $db->prepare($sql3);
$q3->execute(array($totalAmount, $invoice));

    // Commit transaction
    $db->commit();

    // Redirect to preview page
    header("location: preview.php?invoice=$invoice");
} catch (PDOException $e) {
    // Rollback transaction on error
    $db->rollback();
    echo "Error: " . $e->getMessage();
}


?>