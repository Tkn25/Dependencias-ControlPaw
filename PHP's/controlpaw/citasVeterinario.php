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

// Ejecutamos una query para obtener la lista de consultas asociadas con las mascotas obtenidas
$sql = "SELECT * FROM consulta";
$result = $conn->query($sql);

// Creamos un array para almacenar los datos de las consultas
$consultas = array();

// Recorremos el resultado de la query y almacenamos los datos de cada consulta en el array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $consulta = array(
            "id" => $row["idConsulta"],
            "titulo" => $row["titulo"],
            "idMascota" => $row["idMascota"],
            "fecha" => $row["fecha"]
        );
        array_push($consultas, $consulta);
    }
}

// Cerramos la conexión
$conn->close();

// Mostramos en pantalla el resultado de la query en formato XML
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<consultas>';

// Recorremos el array y mostramos los datos de cada consulta en XML
foreach ($consultas as $consulta) {
    echo '<consulta>';
    echo '<id>' . $consulta["id"] . '</id>';
    echo '<titulo>' . $consulta["titulo"] . '</titulo>';
    echo '<idMascota>' . $consulta["idMascota"] . '</idMascota>';
    echo '<fecha>' . $consulta["fecha"] . '</fecha>';
    echo '</consulta>';
}

echo '</consultas>';
?>
