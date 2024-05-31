<?php
//Definimos variables para acceder a la BBDD
$host = "localhost";
$username = "root";
$password = "";
$dbname = "veterinario";

//Creamos la conexión con las variables
$conn = new mysqli($host, $username, $password, $dbname);

//Finalizamos conexión en caso de que haya algun error
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//Obtenemos la ID del dueño
$dueno = $_POST['dueno'];

//Ejecutamos una consulta para obtener los datos de las mascotas
$sql = "SELECT * FROM Mascotas WHERE idDueño = '$dueno'";
$result = $conn->query($sql);

//Creamos un array para guardar los datos
$mascotas = array();

//Almacenamos en el array los datos de cada mascota
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

//Cerramos la conexión
$conn->close();

//Mostramos el resultado en formato XML
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<mascotas>';

//Mostramos los datos de cada mascota
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
