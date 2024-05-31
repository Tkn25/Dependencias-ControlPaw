<?php
//Definimos las variables para acceder la BBDD
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinario";

//Creamos la conexión con las variables
$conn = new mysqli($servername, $username, $password, $dbname);

//Finalizamos conexión en caso de que haya algun error
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//Recogemos los datos para insertar el seguimiento
$idMascota = $_POST['idMascota'];
$descripcion = $_POST['descripcion'];
$fecha = $_POST['fecha'];
$img = $_POST['img'];

//Ejecutamos una query con los datos obtenidos
$sql = "INSERT INTO seguimiento (idMascota, descripcion, fecha, img) 
        VALUES ($idMascota, '$descripcion', '$fecha', '$img')";

//Devuelve un mensaje u otro dependiendo del resultado
if ($conn->query($sql) === TRUE) {
    echo "Datos de seguimiento insertados correctamente";
} else {
    echo "Error al insertar datos de seguimiento: " . $conn->error;
}

//Cerramos la conexión
$conn->close();
?>
