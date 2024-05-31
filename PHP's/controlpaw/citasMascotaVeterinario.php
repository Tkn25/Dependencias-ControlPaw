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
$sql = "SELECT * FROM Mascotas";
$result = $conn->query($sql);

// Creamos un array para almacenar los datos de las mascotas
$mascotas = array();

// Recorremos el resultado de la query y almacenamos los datos de cada mascota en el array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $mascota = array(
            "id" => $row["idMascota"],
            "nombre" => $row["nombre"],
            "idDueno" => $row["idDueño"],
            "idEspecie" => $row["idEspecie"],
            "raza" => $row["raza"],
            "idGenero" => $row["idGenero"],
            "microchip" => $row["microchip"],
            "castrado" => $row["castrado"],
            "enfermedad" => $row["enfermedad"],
            "baja" => $row["baja"],
            "peso" => $row["peso"],
            "fecha" => $row["fechaNacimiento"]
        );
        array_push($mascotas, $mascota);
    }
}

// Cerramos la conexión
$conn->close();

// Mostramos en pantalla el resultado de la query en formato XML
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<mascotas>';

// Recorremos el array y mostramos los datos de cada mascota en XML
foreach ($mascotas as $mascota) {
    echo '<mascota>';
    echo '<id>' . $mascota["id"] . '</id>';
    echo '<nombre>' . $mascota["nombre"] . '</nombre>';
    echo '<idDueno>' . $mascota["idDueno"] . '</idDueno>';
    echo '<idEspecie>' . $mascota["idEspecie"] . '</idEspecie>';
    echo '<raza>' . $mascota["raza"] . '</raza>';
    echo '<idGenero>' . $mascota["idGenero"] . '</idGenero>';
    echo '<microchip>' . $mascota["microchip"] . '</microchip>';
    echo '<castrado>' . $mascota["castrado"] . '</castrado>';
    echo '<enfermedad>' . $mascota["enfermedad"] . '</enfermedad>';
    echo '<baja>' . $mascota["baja"] . '</baja>';
    echo '<peso>' . $mascota["peso"] . '</peso>';
    echo '<fecha>' . $mascota["fecha"] . '</fecha>';
    echo '</mascota>';
}

echo '</mascotas>';
?>
