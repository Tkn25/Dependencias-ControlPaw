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
$nombre = $_POST['nombre'];
$idGenero = $_POST['idGenero'];
$raza = $_POST['raza'];
$idEspecie = $_POST['idEspecie'];
$peso = $_POST['peso'];
$castrado = $_POST['castrado'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$microchip = $_POST['microchip'];

$idMascota = $_POST['idMascota'];

// Construimos y ejecutamos la query de inserción de datos
$sql = "UPDATE mascotas 
        SET nombre = '$nombre', 
            idGenero = '$idGenero',
            raza = '$raza',
            idEspecie = '$idEspecie',
            peso = '$peso',
            castrado = '$castrado',
            fechaNacimiento = '$fechaNacimiento',
            microchip = '$microchip'
        WHERE idMascota = $idMascota";

if ($conn->query($sql) === TRUE) {
    echo "Datos de mascota modificados correctamente";
} else {
    echo "Error al modificar datos de mascota: " . $conn->error;
}

// Cerramos la conexión
$conn->close();
?>