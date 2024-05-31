<?php
//Definimos variables de inicio de sesión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinario";

//Creamos la conexión con las variables
$conn = new mysqli($servername, $username, $password, $dbname);

//Terminamos la ejecución del script con la función die()
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$tipo = $_POST['tipo'];
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];
$DNI = $_POST['DNI'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];


$sql = "INSERT INTO cliente (idCliente, tipo, usuario, contraseña, DNI, nombre, telefono, direccion) VALUES (NULL, $tipo, '$usuario', '$pass', '$DNI', '$nombre', '$telefono', '$direccion')";
if ($conn->query($sql) === TRUE) {
    echo "Cliente insertado correctamente";
} else {
    echo "Error al insertar cliente: " . $conn->error;
}
$conn->close();
?>
