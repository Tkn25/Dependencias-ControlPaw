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

//Recogemos los datos envíados mediante el método POST en variables
$idConsulta = $_POST['idConsulta'];
$motivo = $_POST['motivo'];
$idMascota = $_POST['idMascota'];
$fecha = $_POST['fecha'];

//Ejecutamos una query para comprobar que la mascota para la que vamos a crear la consulta existe
$sql_verificar_mascota = "SELECT * FROM Mascotas WHERE idMascota = $idMascota";
$resultado_verificar_mascota = $conn->query($sql_verificar_mascota);

//En caso de no existir la mascota, salimos del script
if ($resultado_verificar_mascota->num_rows == 0) {
    echo "Error: No existe una mascota con ese ID.";
    exit();
}

//Construimos y ejecutamos la query de actualización de datos
$sql_actualizar_consulta = "UPDATE Consulta SET titulo = '$motivo', idMascota = $idMascota, fecha = '$fecha' WHERE idConsulta = $idConsulta";
if ($conn->query($sql_actualizar_consulta) === TRUE) {
    echo "Consulta actualizada correctamente";
} else {
    echo "Error al actualizar consulta: " . $conn->error;
}

//Cerramos la conexión
$conn->close();
?>