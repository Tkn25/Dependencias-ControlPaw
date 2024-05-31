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
$idDueno = $_POST['idDueno'];
$nombre = $_POST['nombre'];
$idGenero = $_POST['idGenero'];
$raza = $_POST['raza'];
$idEspecie = $_POST['idEspecie'];
$peso = $_POST['peso'];
$castrado = $_POST['castrado'];
$fechaNacimiento = $_POST['fechaNacimiento'];
$microchip = $_POST['microchip'];
$enfermedad = $_POST['enfermedad'];
$baja = $_POST['baja'];

// Construimos y ejecutamos la query de inserción de datos
$sql = "INSERT INTO mascotas (idMascota, idDueño, nombre, idGenero, raza, idEspecie, peso, castrado, fechaNacimiento, microchip,enfermedad,baja) 
        VALUES ($idMascota,$idDueno,'$nombre', $idGenero, '$raza', $idEspecie, '$peso', '$castrado', '$fechaNacimiento', '$microchip', $enfermedad, $baja)";
if ($conn->query($sql) === TRUE) {
    echo "Datos de consejo insertados correctamente";
} else {
    echo "Error al insertar datos de mascota: " . $conn->error;
}

// Cerramos la conexión
$conn->close();
?>