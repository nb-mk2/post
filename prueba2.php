<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Convetidor de HASH 64</title>
</head>
<body>
  <h1>Convertidor de HASH 64</h1>

<?php
$key = '';
$key = $_GET["key"];

$message = '';
$message = $_GET["message"];

// to lowercase hexits
hash_hmac('sha256', $message, $key);

// to base64
print(base64_encode(hash_hmac('sha256', $message, $key, true)));


$exito = base64_encode(hash_hmac('sha256', $message, $key, true));

if ($exito != '') {
 $exito = 'Mensaje Hasheado con exito'; }





$respuesta = [
    "hash" => $exito,
];

$datosCodificados = json_encode($respuesta);

$url = "https://www.pampasistemas.com.ar/hash-64/hash-index.php";
$ch = curl_init($url);

curl_setopt_array($ch, array(
    // Indicar que vamos a hacer una petición POST
    CURLOPT_CUSTOMREQUEST => "POST",
    // Justo aquí ponemos los datos dentro del cuerpo
    CURLOPT_POSTFIELDS => $datosCodificados,
    // Encabezados
    //CURLOPT_HEADER => true,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($datosCodificados), // Abajo podríamos agregar más encabezados
  
    ),
    # indicar que regrese los datos, no que los imprima directamente
    CURLOPT_RETURNTRANSFER => true,
));

$resultado = curl_exec($ch);
# Vemos si el código es 200, es decir, HTTP_OK
$codigoRespuesta = curl_getinfo($ch, CURLINFO_HTTP_CODE);
if($codigoRespuesta === 200){
    # Decodificar JSON porque esa es la respuesta
    $respuestaDecodificada = json_decode($resultado);
    # Simplemente los imprimimos
    echo "<strong>El servidor dice que la hora de petición fue: </strong>" . $respuestaDecodificada->fechaYHora;
    echo "<br><strong>El servidor dice que el primer lenguaje es: </strong>" . $respuestaDecodificada->primerLenguaje;
    echo "<br><strong>Los encabezados que el servidor recibió fueron: </strong><pre>" . var_export($respuestaDecodificada->encabezados, true) . "</pre>";
    echo "<br><strong>Los gustos musicales que el servidor recibió fueron: </strong><pre>" . var_export($respuestaDecodificada->gustosMusicales, true) . "</pre>";
    echo "<br><strong>Los libros que el servidor recibió fueron: </strong><pre>" . var_export($respuestaDecodificada->libros, true) . "</pre>";
    echo "<br><strong>Mensaje del servidor: </strong>" . $respuestaDecodificada->mensaje;
}else{
    # Error
    echo "Error consultando. Código de respuesta: $codigoRespuesta";
}
curl_close($ch);
?>
<h3 style="color:green;">
  <?php echo($exito);  ?>
</h3>
</body>
</html>