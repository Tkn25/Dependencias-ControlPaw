<?php
// Definimos variables de inicio de sesión
$host = "localhost";
$username = "root";
$password = "";
$dbname = "veterinario";

// Creamos la conexión con las variables
$conn = new mysqli($host, $username, $password, $dbname);

// Terminamos la ejecución del script con la función die() si hay un error de conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Ejecutamos una query para obtener la lista de seguimientos
$sql = "SELECT * FROM seguimiento";
$result = $conn->query($sql);

// Creamos un array para almacenar los datos de los seguimientos
$seguimientos = array();

// Recorremos el resultado de la query y almacenamos los datos de cada seguimiento en el array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $seguimiento = array(
            "idSeguimiento" => $row["idSeguimiento"],
            "idMascota" => $row["idMascota"],
            "descripcion" => $row["descripcion"],
            "fecha" => $row["fecha"],
            "imagen" => $row["img"]
        );
        array_push($seguimientos, $seguimiento);
    }
}

// Cerramos la conexión
$conn->close();

// Mostramos en pantalla el resultado de la query en formato XML
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<seguimientos>';

// Recorremos el array y mostramos los datos de cada seguimiento en XML
foreach ($seguimientos as $seguimiento) {
    echo '<seguimiento>';
    echo '<idSeguimiento>' . $seguimiento["idSeguimiento"] . '</idSeguimiento>';
    echo '<idMascota>' . $seguimiento["idMascota"] . '</idMascota>';
    echo '<descripcion>' . $seguimiento["descripcion"] . '</descripcion>';
    echo '<fecha>' . $seguimiento["fecha"] . '</fecha>';
    echo '<imagen>' . $seguimiento["imagen"] . '</imagen>';
    echo '</seguimiento>';
}

echo '</seguimientos>';
?>
