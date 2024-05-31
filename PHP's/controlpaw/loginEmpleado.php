<?php
// Parámetros de conexión
$servername = "localhost";
$username = "root";
$password = "";
$database = "veterinario";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el nombre de usuario y la contraseña
$username = $_POST['username'];
$hashedPassword = $_POST['password'];

// Query para verificar que la contraseña coincide y obtener el idEmpleado
$sql = "SELECT idEmpleado FROM empleado WHERE usuario = '$username' AND contraseña = '$hashedPassword'";
$result = $conn->query($sql);

// Create XML document
$xml = new SimpleXMLElement('<response></response>');

if ($result->num_rows > 0) {
    // El usuario existe y la contraseña con hash coincide
    $row = $result->fetch_assoc();
    $idEmpleado = $row['idEmpleado'];
    $response = $xml->addChild('success', 'true');
    $response = $xml->addChild('msg', 'Login Correcto');
    $response = $xml->addChild('idEmpleado', $idEmpleado);
} else {
    // El usuario no existe o la contraseña con hash no coincide
    $response = $xml->addChild('success', 'false');
    $response = $xml->addChild('msg', 'Credenciales incorrectas');
}

// Ponemos el header como XML
header('Content-Type: text/xml');

// Hacemos echo del XML
echo $xml->asXML();

$conn->close();
?>