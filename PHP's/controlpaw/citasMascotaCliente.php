<?php
//Definimos las variables para acceder a la BBDD
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

//Ejecutamos una consulta para obtener las citas de las mascotas
$sql = "SELECT mascotas.nombre AS mascota, consulta.titulo AS motivo, consulta.fecha AS fecha
        FROM mascotas
        JOIN consulta ON mascotas.idMascota = consulta.idMascota
        JOIN cliente ON mascotas.idDueño = cliente.idCliente
        WHERE cliente.idCliente = $idCliente";

$result = $conn->query($sql);

//Creamos un array para guardar los datos
$consultas = array();

//Almacenamos en el array los datos de cada consulta
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $consulta = array(
            "mascota" => $row["mascota"],
            "motivo" => $row["motivo"],
            "fecha" => $row["fecha"]
        );
        array_push($consultas, $consulta);
    }
}

//Cerramos la conexión
$conn->close();

//Mostramos los resultados en formato XML
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<consultas>';

//Mostramos los datos de cada consulta
if (!empty($consultas)) {
    foreach ($consultas as $consulta) {
        echo '<consulta>';
        echo '<mascota>' . $consulta["mascota"] . '</mascota>';
        echo '<motivo>' . $consulta["motivo"] . '</motivo>';
        echo '<fecha>' . $consulta["fecha"] . '</fecha>';
        echo '</consulta>';
    }
} else {
    echo '<mensaje>No hay consultas registradas.</mensaje>';
}

echo '</consultas>';
?>
