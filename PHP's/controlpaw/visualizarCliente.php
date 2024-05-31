<?php
// Definimos variables de inicio de sesión
$host = "localhost";
$username = "root";
$password = "";
$dbname = "veterinario";

// Creamos la conexión con las variables
$conn = new mysqli($host, $username, $password, $dbname);

// Terminamos la ejecución del script con la función die() si hay un error de conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Ejecutamos una query para obtener la lista de mascotas
$sql = "SELECT * FROM Cliente";
$result = $conn->query($sql);

// Creamos un array para almacenar los datos de las mascotas
$clientes = array();

// Recorremos el resultado de la query y almacenamos los datos de cada mascota en el array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $cliente = array(
            "idCliente" => $row["idCliente"],
            "tipo" => $row["tipo"],
            "usuario" => $row["usuario"],
           // "pass" => $row["contraseña"],
            "DNI" => $row["DNI"],
            "nombre" => $row["nombre"],
            "telefono" => $row["telefono"],
            "direccion" => $row["direccion"],
            
        );
        array_push($clientes, $cliente);
    }
}

// Cerramos la conexión
$conn->close();

// Mostramos en pantalla el resultado de la query en formato XML
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<clientes>';

// Recorremos el array y mostramos los datos de cada mascota en XML
foreach ($clientes as $cliente) {
    echo '<cliente>';
    echo '<idCliente>' . $cliente["idCliente"] . '</idCliente>';
    echo '<tipo>' . $cliente["tipo"] . '</tipo>';
    echo '<usuario>' . $cliente["usuario"] . '</usuario>';
  //  echo '<pass>' . $cliente["pass"] . '</pass>';
    echo '<DNI>' . $cliente["DNI"] . '</DNI>';
    echo '<nombre>' . $cliente["nombre"] . '</nombre>';
    echo '<telefono>' . $cliente["telefono"] . '</telefono>';
    echo '<direccion>' . $cliente["direccion"] . '</direccion>';
  
    echo '</cliente>';
}

echo '</clientes>';
?>
