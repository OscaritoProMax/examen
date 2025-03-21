
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];

    $con = new mysqli("localhost", "root", "", "examen_pr2");
    if ($con->connect_error) die("Error de conexión");

    $sql = "INSERT INTO personas (nombre, email, edad) VALUES ('$nombre', '$email', '$edad')";
    if ($con->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $con->error;
    }
}
?>
<h2>Crear Nueva Persona</h2>
<form method="post" action="">
    Nombre: <input type="text" name="nombre" required><br>
    Email: <input type="email" name="email" required><br>
    Edad: <input type="number" min=0 name="edad" required><br>
    <input type="submit" value="Guardar">
</form>
<a href="index.php"><button>Volver</button></a>
