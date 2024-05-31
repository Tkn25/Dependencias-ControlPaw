<?php
//Definimos las variables para acceder la BBDD
$host = "localhost";
$username = "root";
$password = "";
$dbname = "veterinario";

//Creamos la conexión con las variables
$conn = new mysqli($host, $username, $password, $dbname);

//Finalizamos conexión en caso de que haya algun error
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//Obtenemos la ID del cliente
$idCliente = $_POST['idCliente'];

//Ejecutamos una consulta para obtener los tratamientos de las mascotas
$sql = "SELECT tratamiento.idTratamiento, mascotas.nombre AS mascota, tratamiento.descripcion, tratamiento.fecha
        FROM tratamiento
        JOIN mascotas ON tratamiento.idMascota = mascotas.idMascota
        JOIN cliente ON mascotas.idDueño = cliente.idCliente
        WHERE cliente.idCliente = $idCliente";

$result = $conn->query($sql);

//Creamos un array para guardar los datos
$tratamientos = array();

//Almacenamos en el array los datos de cada tratamiento obtenido
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tratamiento = array(
            "idTratamiento" => $row["idTratamiento"],
            "mascota" => $row["mascota"],
            "descripcion" => $row["descripcion"],
            "fecha" => $row["fecha"]
        );
        array_push($tratamientos, $tratamiento);
    }
}

//Cerramos la conexión
$conn->close();

//Mostramos el resultado en formato XML
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<tratamientos>';

//Mostramos los datos de cada tratamiento
if (!empty($tratamientos)) {
    foreach ($tratamientos as $tratamiento) {
        echo '<tratamiento>';
        echo '<idTratamiento>' . $tratamiento["idTratamiento"] . '</idTratamiento>';
        echo '<mascota>' . $tratamiento["mascota"] . '</mascota>';
        echo '<descripcion>' . $tratamiento["descripcion"] . '</descripcion>';
        echo '<fecha>' . $tratamiento["fecha"] . '</fecha>';
        echo '</tratamiento>';
    }
} else {
    echo '<mensaje>No hay tratamientos registrados.</mensaje>';
}

echo '</tratamientos>';
?>
