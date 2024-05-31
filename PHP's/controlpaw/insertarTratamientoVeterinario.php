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
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];

// Construimos y ejecutamos la query de inserción de datos
$sql = "INSERT INTO tratamiento (idTratamiento, idMascota, descripcion, fecha, finalizado) 
        VALUES (NULL, $idMascota, '$descripcion', '$fecha', 0)";

if ($conn->query($sql) === TRUE) {
    echo "Datos de tratamiento insertados correctamente";
} else {
    echo "Error al insertar datos de tratamiento: " . $conn->error;
}

// Cerramos la conexión
$conn->close();
?>