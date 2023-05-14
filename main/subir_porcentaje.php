<?php
    include('../connect.php');
    
    $id = $_GET['id'];

    // Obtener el precio actual del producto sumándole el 2%
    $result = $db->prepare("SELECT * FROM products WHERE product_id = :userid");
    $result->bindParam(':userid', $id);
    $result->execute();
    $row = $result->fetch();
    $precio = $row['price'] * 1.02;

    // Actualizar el precio en la base de datos
    $sql = "UPDATE products SET price = :precio WHERE product_id = :userid";
    $q = $db->prepare($sql);
    $q->bindParam(':precio', $precio);
    $q->bindParam(':userid', $id);
    $q->execute();

	echo $precio;
?>