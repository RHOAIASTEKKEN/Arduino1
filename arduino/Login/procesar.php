<?php
// procesar.php

// Conexión a la base de datos (reemplaza los valores con los de tu servidor)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyectoadministracion";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST["nombre"];
$i1 = $_POST["i1"];
$i2 = $_POST["i2"];
$i3 = $_POST["i3"];
$i4 = $_POST["i4"];
$i5 = $_POST["i5"];

// Insertar datos en la base de datos (reemplaza esto con tu lógica específica)
$sql = "INSERT INTO cerradura (nombreProyecto, i1, i2, i3, i4, i5) VALUES ('$nombre', '$i')";

if ($conn->query($sql) === TRUE) {
    // Obtener los datos recién insertados
    $lastInsertedId = $conn->insert_id;
    $result = "Registro exitoso. ID del último registro: $lastInsertedId";
} else {
    $result = "Error al registrar: " . $conn->error;
}

// Consultar datos de la base de datos (un ejemplo)
$sqlConsulta = "SELECT * FROM cerradura";
$resultadoConsulta = $conn->query($sqlConsulta);

// Construir un array con los resultados de la consulta
$rows = array();
while ($row = $resultadoConsulta->fetch_assoc()) {
    $rows[] = $row;
}

// Cerrar la conexión
$conn->close();

// Devolver resultados al cliente
$response = array("mensaje" => $result, "datos" => $rows);
echo json_encode($response);
?>