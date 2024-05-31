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
$sql = "SELECT a.idMascota, b.idCliente,
              a.idEspecie, raza, a.nombre, a.idGenero, a.microchip, a.castrado, a.enfermedad,
              a.baja, a.peso, a.fechaNacimiento, b.DNI
                 FROM Mascotas as a 
                 inner join cliente as b
                 on a.idDueño = b.idCliente";
$result = $conn->query($sql);

// Creamos un array para almacenar los datos de las mascotas
$mascotas = array();

// Recorremos el resultado de la query y almacenamos los datos de cada mascota en el array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $mascota = array(
           // "id" => $row["idMascota"],
            "idMascota" => $row["idMascota"],
            "idCliente" => $row["idCliente"],
             "idEspecie" => $row["idEspecie"],
            "raza" => $row["raza"],
            "nombre" => $row["nombre"],
            "idGenero" => $row["idGenero"],
            "microchip" => $row["microchip"],
            "castrado" => $row["castrado"],
            "enfermedad" => $row["enfermedad"],
            "baja" => $row["baja"],
            "peso" => $row["peso"],
            "fecha" => $row["fechaNacimiento"],
            "DNI" => $row["DNI"]
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
    echo '<idMascota>' . $mascota["idMascota"] . '</idMascota>';
    echo '<idCliente>' . $mascota["idCliente"] . '</idCliente>';
    echo '<idEspecie>' . $mascota["idEspecie"] . '</idEspecie>';
  //  echo '<nCliente>' . $mascota["nCliente"] . '</nCliente>';
    //echo '<idDueno>' . $mascota["idDueno"] . '</idDueno>';
    echo '<raza>' . $mascota["raza"] . '</raza>';
    echo '<nombre>' . $mascota["nombre"] . '</nombre>';
    echo '<idGenero>' . $mascota["idGenero"] . '</idGenero>';
    echo '<microchip>' . $mascota["microchip"] . '</microchip>';
    echo '<castrado>' . $mascota["castrado"] . '</castrado>';
    echo '<enfermedad>' . $mascota["enfermedad"] . '</enfermedad>';
    echo '<baja>' . $mascota["baja"] . '</baja>';
    echo '<peso>' . $mascota["peso"] . '</peso>';
    echo '<fecha>' . $mascota["fecha"] . '</fecha>';
    echo '<DNI>' . $mascota["DNI"] . '</DNI>';
    echo '</mascota>';
}

echo '</mascotas>';
?>
