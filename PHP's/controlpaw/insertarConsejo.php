<?php
//Definimos las variables para acceder a la BBDD
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

//Recogemos los datos para insertar el consejo
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$img = $_POST['img'];

//Ejecutamos la query con los datos obtenidos
$sql = "INSERT INTO consejo (titulo, descripcion, img) 
        VALUES ('$titulo', '$descripcion', '$img')";

//Dependiendo del resultado devuelve un mensaje u otro
if ($conn->query($sql) === TRUE) {
    echo "Datos de consejo insertados correctamente";
} else {
    echo "Error al insertar datos de consejo: " . $conn->error;
}

//Cerramos la conexión
$conn->close();
?>
