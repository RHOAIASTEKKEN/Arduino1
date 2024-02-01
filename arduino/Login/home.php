<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/home.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <header>
        <h1>Cerradura automatizada</h1>
        <nav>
            <a href="../">Home</a>
            <a href="./index.html">Login</a>
        </nav>

        <div class="icono">
            <h2>MENU</h2>
        </div>
    </header>

    <div class="containerHome">
        <h2>ADMINISTRACION DE PROYECTO</h2>

        <form class="insert" method="POST" action="../php/insert.php">
            <label for="nombre">nombre del proyecto</label>
            <input type="text" name="nombre" id="nombre">

            <label for="correo">integrante</label>
            <input type="text" name="i1" id="correo">

            <label for="correo">integrante</label>
            <input type="text" name="i2" id="correo">

            <label for="correo">integrante</label>
            <input type="text" name="i3" id="correo">

            <label for="correo">integrante</label>
            <input type="text" name="i4" id="correo">

            <label for="correo">integrante</label>
            <input type="text" name="i5" id="correo">

            <input type="submit" value="Enviar">
        </form>
    </div>

    <div class="resultados">
        <?php

        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "basedatos";

        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Select data from the database
        $sql = "SELECT * FROM arduino";
        $result = $conn->query($sql);


        while ($row = $result->fetch_assoc()) {
            echo "<div class='datos'>
                    <p>Nombre del Equipo</p>" . $row["nombre"] . "
                    <p>integrante 1</p>" . $row["integrante1"] . "
                    <p>integrante 2</p>" . $row["integrante2"] . "
                    <p>integrante 3</p>" . $row["integrante3"] . "
                    <p>integrante 4</p>" . $row["integrante4"] . "
                    <p>integrante 5</p>" . $row["integrante5"] . "
                </div>";
        }

        ?>

    </div>

    <?php

    echo '<div class="contenidos">
            <section class="headerContenidos">
            <p>No. Actividad</p>
            <p>Actividad</p>
            <p>Personas</p>
            <p>Status</p>
            <p>Fecha inicio</p>
            <p>Fecha fin</p>
            <p>Numero de semanas</p>
            <p>1</p>
            <p>2</p>
            <p>3</p>
            <p>4</p>
            <p>5</p>
            <p>6</p>
            <p>7</p>
            <p>8</p>
            <p>9</p>
            <p>10</p>
            <p>11</p>
            <p>12</p>
            <p>13</p>
            <p>14</p>
            </section>
            <section class="headerContenidos">
            <input type="text">
            <input type="text">
            <input type="text">
            <select id="opciones" name="opciones" onchange="cambiarColorFondo()">
                <option value="opcion1">NONE</option>
                <option value="opcion2">EN PROCESO</option>
                <option value="opcion3">TERMINADO</option>
            </select>
            <input type="date">
            <input type="date">
            <input type="text">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">
            <input type="checkbox">

            </section>
        </div>';

    echo '<div class="formulario">
        <form method="post" action="">
        <h2 style="text-align: center;">COLOCAR TAREAS</h2>
        <section class="headerContenidos2">
            <input type="text" name="input1">
            <input type="text" name="input2">
            <input type="text" name="input3">
            <select id="opciones2" name="opciones2" onchange="cambiarColorFondo2()">
                <option value="opcion1">NONE</option>
                <option value="opcion2">EN PROCESO</option>
                <option value="opcion3">TERMINADO</option>
            </select>
            <input type="date" name="fechaInicio">
            <input type="date" name="fechaFin">
            <input type="text" name="texto">
            
            <!-- Casillas de verificación -->
            <input type="checkbox" name="checkboxes[]" value="checkbox1">
            <input type="checkbox" name="checkboxes[]" value="checkbox2">
            <input type="checkbox" name="checkboxes[]" value="checkbox3">
            <input type="checkbox" name="checkboxes[]" value="checkbox4">
            <input type="checkbox" name="checkboxes[]" value="checkbox5">
            <input type="checkbox" name="checkboxes[]" value="checkbox6">
            <input type="checkbox" name="checkboxes[]" value="checkbox7">
            <input type="checkbox" name="checkboxes[]" value="checkbox8">
            <input type="checkbox" name="checkboxes[]" value="checkbox9">
            <input type="checkbox" name="checkboxes[]" value="checkbox10">
            <input type="checkbox" name="checkboxes[]" value="checkbox11">
            <input type="checkbox" name="checkboxes[]" value="checkbox12">
            <input type="checkbox" name="checkboxes[]" value="checkbox13">
            <input type="checkbox" name="checkboxes[]" value="checkbox14">
            <input type="checkbox" name="checkboxes[]" value="checkbox15">
            <input type="checkbox" name="checkboxes[]" value="checkbox16">
            <input type="checkbox" name="checkboxes[]" value="checkbox17">
            <input type="checkbox" name="checkboxes[]" value="checkbox18">
            <input type="checkbox" name="checkboxes[]" value="checkbox19">
            <input type="checkbox" name="checkboxes[]" value="checkbox20">
            
            <!-- Botón de envío -->
            <input type="submit" value="Enviar">
        </section>
    </form>
        <div>';


    // Close the connection
    $conn->close();

    ?>

    <script>
    function cambiarColorFondo() {
        var selectElement = document.getElementById('opciones');
        var selectedValue = selectElement.value;

        if (selectedValue === 'opcion1') {
            selectElement.style.backgroundColor = 'red';
            selectElement.style.color = 'white';
        } else if (selectedValue === 'opcion2') {
            selectElement.style.backgroundColor = 'orange';
            selectElement.style.color = 'white';
        } else if (selectedValue === 'opcion3') {
            selectElement.style.backgroundColor = 'green';
            selectElement.style.color = 'white';
        }
    }


    function cambiarColorFondo2() {
        var selectElement = document.getElementById('opciones2');
        var selectedValue = selectElement.value;

        if (selectedValue === 'opcion1') {
            selectElement.style.backgroundColor = 'red';
            selectElement.style.color = 'white';
        } else if (selectedValue === 'opcion2') {
            selectElement.style.backgroundColor = 'orange';
            selectElement.style.color = 'white';
        } else if (selectedValue === 'opcion3') {
            selectElement.style.backgroundColor = 'green';
            selectElement.style.color = 'white';
        }
    }
    </script>
</body>

</html>