<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Datos</title>
</head>

<body>

    <h1>Consulta de Datos</h1>

    <form action="https://dreamgateways.net/consulta.php" method="get">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required>
        <br>
        <input type="submit" value="Consultar">
    </form>

    <div id="resultado">
        <!-- Aquí se mostrarán los resultados de la consulta -->
    </div>

    <script>
    // Script para manejar la solicitud y mostrar los resultados sin recargar la página
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();

        // Obtener el valor del ID
        var id = document.getElementById('id').value;

        // Realizar la solicitud a la API
        fetch('https://dreamgateways.net/consulta.php?id=' + encodeURIComponent(id))
            .then(response => response.json())
            .then(data => {
                // Mostrar los resultados en la página
                var resultadoDiv = document.getElementById('resultado');
                resultadoDiv.innerHTML = '<h2>Datos obtenidos:</h2>' +
                    '<p>ID: ' + data.id + '</p>' +
                    '<p>User: ' + data.user + '</p>' +
                    '<p>Pass: ' + data.pass + '</p>' +
                    '<p>Fecha Hora: ' + data.fecha_hora + '</p>';
            })
            .catch(error => {
                console.error('Error al realizar la solicitud:', error);
            });
    });
    </script>

</body>

</html>