<?php
// Definimos variables de inicio de sesión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinario";

// Creamos la conexión con las variables
$conn = new mysqli($servername, $username, $password, $dbname);

// Terminamos la ejecución del script con la función die() si hay un error de conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recogemos los datos enviados mediante el método POST en variables
$idMascota = $_POST['idMascota'];

// Construimos y ejecutamos la query de eliminación de datos en orden correcto
$sql1 = "DELETE FROM consulta WHERE idMascota = $idMascota";
$sql2 = "DELETE FROM tratamiento WHERE idMascota = $idMascota";
$sql3 = "DELETE FROM seguimiento WHERE idMascota = $idMascota";
$sql4 = "DELETE FROM mascotas WHERE idMascota = $idMascota";

// Ejecutamos las consultas en el orden correcto y verificamos su ejecución
if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
    if ($conn->query($sql4) === TRUE) {
        echo "Datos de mascota borrados correctamente";
    } else {
        echo "Error al eliminar mascota: " . $conn->error;
    }
} else {
    echo "Error al eliminar datos relacionados: " . $conn->error;
}

// Cerramos la conexión
$conn->close();
?>
