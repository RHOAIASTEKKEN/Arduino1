<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Datos</title>
</head>

<body>

    <h1>Consulta de Datos</h1>

    <form action="" method="get">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required>
        <br>
        <input type="submit" value="Consultar">
    </form>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        
        // Construir la URL con el ID proporcionado
        $url = "https://dreamgateways.net/consulta.php?id=" . urlencode($id);

        // Inicializar cURL
        $ch = curl_init($url);

        // Configurar opciones de cURL
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Realizar la solicitud HTTP y obtener la respuesta
        $respuesta = curl_exec($ch);

        // Verificar si hubo errores en la solicitud
        if (curl_errno($ch)) {
            echo '<p>Error al realizar la solicitud HTTP: ' . curl_error($ch) . '</p>';
        } else {
            // Decodificar la respuesta JSON (suponiendo que la respuesta es JSON)
            $datos = json_decode($respuesta, true);

            // Mostrar los datos obtenidos
            if ($datos) {
                echo "<h2>Datos obtenidos:</h2>";
                echo "<p>ID: " . $datos['id'] . "</p>";
                echo "<p>user: " . $datos['user'] . "</p>";
                echo "<p>pass: " . $datos['pass'] . "</p>";
            } else {
                echo "<p>No se pudieron obtener datos para el ID proporcionado.</p>";
            }
        }

        // Cerrar la sesión cURL
        curl_close($ch);
    } else {
        echo "<p>Por favor, proporcione un ID para realizar la consulta.</p>";
    }
}
?>

</body>

</html>