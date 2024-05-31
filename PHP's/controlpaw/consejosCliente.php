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

// Ejecutamos una query para obtener la lista de consejos
$sql = "SELECT * FROM consejo";
$result = $conn->query($sql);

// Creamos un array para almacenar los datos de los consejos
$consejos = array();

// Recorremos el resultado de la query y almacenamos los datos de cada consejo en el array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $consejo = array(
            "id" => $row["idConsejo"],
            "titulo" => $row["titulo"],
            "descripcion" => $row["descripcion"],
            "img" => $row["img"]
        );
        array_push($consejos, $consejo);
    }
}

// Cerramos la conexión
$conn->close();

// Mostramos en pantalla el resultado de la query en formato XML
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<consejos>';

// Recorremos el array y mostramos los datos de cada consejo en XML
foreach ($consejos as $consejo) {
    echo '<consejo>';
    echo '<id>' . $consejo["id"] . '</id>';
    echo '<titulo>' . $consejo["titulo"] . '</titulo>';
    echo '<descripcion>' . $consejo["descripcion"] . '</descripcion>';
    echo '<img>' . $consejo["img"] . '</img>';
    echo '</consejo>';
}

echo '</consejos>';
?>
