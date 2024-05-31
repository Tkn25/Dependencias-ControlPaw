<?php
//Definimos las variables para acceder a la BBDD
$host = "localhost";
$username = "root";
$password = "";
$dbname = "veterinario";

//Creamos la conexión con las variables
$conn = new mysqli($host, $username, $password, $dbname);

//Finalizamos la conexión en caso de que haya algun error
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//Ejecutamos una consulta para obtener todos los consejos
$sql = "SELECT * FROM consejo";
$result = $conn->query($sql);

//Creamos un array para guardar los datos
$consejos = array();

//Almacenamos en el array los datos de los consejos obtenidos
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $consejo = array(
            "id" => $row["idConsejo"],
            "titulo" => $row["titulo"],
            "descripcion" => $row["descripcion"],
            "img" => $row["img"]
        );
        array_push($consejos, $consejo);
    }
}

//Cerramos la conexión
$conn->close();

//Mostramos el resultado en formato XML
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<consejos>';

//Mostramos los datos de cada consejo
foreach ($consejos as $consejo) {
    echo '<consejo>';
    echo '<id>' . $consejo["id"] . '</id>';
    echo '<titulo>' . $consejo["titulo"] . '</titulo>';
    echo '<descripcion>' . $consejo["descripcion"] . '</descripcion>';
    echo '<img>' . $consejo["img"] . '</img>';
    echo '</consejo>';
}

echo '</consejos>';
?>
