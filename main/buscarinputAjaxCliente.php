
<?php


class Database
{
    private $hostname = "localhost";
    private $database = "pos";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";

    /**
     * Se conecta a la base de datos y devuelve un objeto PDO.
     * 
     * @return La conexión a la base de datos.
     */
    function conectar()
    {
        try {
            $conexion = "mysql:host=" . $this->hostname . ";dbname=" . $this->database . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $options);

            return $pdo;
        } catch (PDOException $e) {
            echo 'Error conexion: ' . $e->getMessage();
            exit;
        }
    }
}

$con = new Database();
$pdo = $con->conectar();

$campo = $_POST["campo2"];

//$sql = "SELECT cp, asentamiento FROM codigos_postales WHERE cp LIKE ? OR asentamiento LIKE ? ORDER BY cp ASC LIMIT 0, 10";
//$sql = "SELECT customer_id, customer_name FROM customer WHERE customer_name LIKE ? ORDER BY customer_id ASC LIMIT 0, 10";
$sql = "SELECT customer_id, customer_name FROM customer WHERE customer_name LIKE CONCAT('%', ?, '%') ORDER BY customer_name ASC LIMIT 0, 10";


$query = $pdo->prepare($sql);
$query->execute([$campo . '%']);

$html = "";

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    
    $html .= "<li style=\"margin-bottom: 9px; color: #000 !important;\" onclick=\"mostrar('" . $row["customer_name"] . "', '" . $row["customer_name"] . "')\">" . $row["customer_name"] . "</li>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);


