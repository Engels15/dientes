<?php
error_reporting(E_ALL);
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clinica_dental";
$conn = new mysqli($servername, $username, $password, $dbname);
// Verificar la conexión a la base de datos
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    // echo "Conexión exitosa a la base de datos"; // Comentado para evitar que aparezca en la respuesta AJAX
}

// Verificar si se enviaron datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario.
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $fecha_cita = $_POST['fecha_cita'];

    // Insertar los datos en la tabla "citas"
    $sql = "INSERT INTO citas (nombre, apellido, email, telefono, fecha_cita) VALUES ('$nombre', '$apellido', '$email', '$telefono', '$fecha_cita')";
    
    if ($conn->query($sql) === TRUE) {
        // Cita registrada exitosamente
        echo "Cita registrada exitosamente";
        // Agrega un mensaje de confirmación para JavaScript
        echo '<script>alert("Su cita está registrada. ¡Gracias!");</script>';
        // Redirecciona al usuario al inicio de la página
        echo '<script>window.location.href = "index.html";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: No se recibieron datos del formulario";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
