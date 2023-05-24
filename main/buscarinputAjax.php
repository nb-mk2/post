
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

$campo = $_POST["campo"];

//$sql = "SELECT cp, asentamiento FROM codigos_postales WHERE cp LIKE ? OR asentamiento LIKE ? ORDER BY cp ASC LIMIT 0, 10";
$sql = "SELECT product_id, product_code, price FROM products WHERE product_code LIKE ? OR price LIKE ? ORDER BY product_id ASC LIMIT 0, 10";

$query = $pdo->prepare($sql);
$query->execute([$campo . '%', $campo . '%']);

$html = "";

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    
    $html .= "<li style=\"margin-bottom: 9px; color: #000 !important;\" onclick=\"mostrar('" . $row["product_id"] . "', '" . $row["product_code"] . "')\">" . $row["product_code"]  . "</li>";
    
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);


