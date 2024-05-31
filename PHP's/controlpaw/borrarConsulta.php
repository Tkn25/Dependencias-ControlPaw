<?php
//Definimos variables de inicio de sesión
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "veterinario";

//Creamos la conexión con las variables
$conn = new mysqli($servername, $username, $password, $dbname);

//En caso de error de conexión, terminamos la ejecución del script con la función die()
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//Recogemos el dato envíado mediante el método POST en una variable y lo utilizamos en la query de eliminación
$id = $_POST['id'];
$sql_eliminar_consulta = "DELETE FROM Consulta WHERE idConsulta = $id";

//Ejecutamos la query comprobando que se ejecuta correctamente
if ($conn->query($sql_eliminar_consulta) === TRUE) {
    echo "Consulta eliminada correctamente";
} else {
    echo "Error al eliminar la consulta: " . $conn->error;
}

//Cerramos la conexión
$conn->close();
?>