<?php
// Ensure that the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nombre = $_POST["nombre"];
    $integrantes = array($_POST["i1"], $_POST["i2"], $_POST["i3"], $_POST["i4"], $_POST["i5"]);

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

    // Insert data into the database
    $sql = "INSERT INTO arduino (nombre, integrante1, integrante2, integrante3, integrante4, integrante5) 
            VALUES ('$nombre', '$integrantes[0]', '$integrantes[1]', '$integrantes[2]', '$integrantes[3]', '$integrantes[4]')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>