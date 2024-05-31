<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root"; // Cambia esto por tu usuario de la base de datos
$password = ""; // Cambia esto por tu contraseña de la base de datos
$dbname = "veterinario";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de los clientes
$sql = "SELECT idCliente, nombre, DNI, telefono, direccion FROM cliente";
$result = $conn->query($sql);

// Crear un nuevo documento XML
$xml = new DOMDocument("1.0", "UTF-8");
$xml->formatOutput = true;

// Crear el elemento raíz
$clientes = $xml->createElement("clientes");
$xml->appendChild($clientes);

if ($result->num_rows > 0) {
    // Recorrer los resultados y agregarlos al XML
    while ($row = $result->fetch_assoc()) {
        $cliente = $xml->createElement("cliente");
        
        $idCliente = $xml->createElement("idCliente", $row["idCliente"]);
        $cliente->appendChild($idCliente);

        $nombre = $xml->createElement("nombre", $row["nombre"]);
        $cliente->appendChild($nombre);

        $DNI = $xml->createElement("DNI", $row["DNI"]);
        $cliente->appendChild($DNI);

        $telefono = $xml->createElement("telefono", $row["telefono"]);
        $cliente->appendChild($telefono);

        $direccion = $xml->createElement("direccion", $row["direccion"]);
        $cliente->appendChild($direccion);
        
        $clientes->appendChild($cliente);
    }
} else {
    echo "0 resultados";
}

$conn->close();

// Configurar las cabeceras para que se devuelva el XML
header("Content-Type: application/xml; charset=UTF-8");

// Imprimir el XML
echo $xml->saveXML();
?>