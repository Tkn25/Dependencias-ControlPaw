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
$motivo = $_POST['motivo'];
$idMascota = $_POST['idMascota'];
$fecha = $_POST['fecha'];

//Ejecutamos una query para comprobar que la mascota para la que vamos a crear la consulta existe
$sql_verificar_mascota = "SELECT * FROM Mascotas WHERE idMascota = $idMascota";
$resultado_verificar_mascota = $conn->query($sql_verificar_mascota);

//En caso de no existir la mascota, salimos del script
if ($resultado_verificar_mascota->num_rows == 0) {
    echo "Error: La mascota con el ID proporcionado no existe";
    exit();
}

//Construimos y ejecutamos la query de inserción de datos
$sql_insertar_consulta = "INSERT INTO Consulta (idConsulta, titulo, idMascota, fecha) VALUES (null, '$motivo', $idMascota, '$fecha')";
if ($conn->query($sql_insertar_consulta) === TRUE) {
    echo "Consulta insertada correctamente";
} else {
    echo "Error al insertar consulta: " . $conn->error;
}

//Cerramos la conexión
$conn->close();
?>
