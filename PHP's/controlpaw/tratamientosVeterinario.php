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

// Ejecutamos una query para obtener la lista de tratamientos
$sql = "SELECT * FROM tratamiento";
$result = $conn->query($sql);

// Creamos un array para almacenar los datos de los tratamientos
$tratamientos = array();

// Recorremos el resultado de la query y almacenamos los datos de cada tratamiento en el array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $tratamiento = array(
            "id" => $row["idTratamiento"],
            "idMascota" => $row["idMascota"],
            "descripcion" => $row["descripcion"],
            "fecha" => $row["fecha"],
            "finalizado" => $row["finalizado"]
        );
        array_push($tratamientos, $tratamiento);
    }
}

// Cerramos la conexión
$conn->close();

// Mostramos en pantalla el resultado de la query en formato XML
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<tratamientos>';

// Recorremos el array y mostramos los datos de cada tratamiento en XML
foreach ($tratamientos as $tratamiento) {
    echo '<tratamiento>';
    echo '<id>' . $tratamiento["id"] . '</id>';
    echo '<idMascota>' . $tratamiento["idMascota"] . '</idMascota>';
    echo '<descripcion>' . $tratamiento["descripcion"] . '</descripcion>';
    echo '<fecha>' . $tratamiento["fecha"] . '</fecha>';
    echo '<finalizado>' . $tratamiento["finalizado"] . '</finalizado>';
    echo '</tratamiento>';
}

echo '</tratamientos>';
?>
