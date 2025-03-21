<?php
$con = new mysqli("localhost", "root", "", "examen_pr2");
if ($con->connect_error) die("Error de conexión");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $edad = $_POST['edad'];

    $sql = "UPDATE personas SET nombre='$nombre', email='$email', edad='$edad' WHERE id=$id";
    if ($con->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error al actualizar";
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM personas WHERE id=$id";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
}
?>
<h2>Modificar Persona</h2>
<form method="post" action="">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    Nombre: <input type="text" name="nombre" value="<?= $row['nombre'] ?>" required><br>
    Email: <input type="email" name="email" value="<?= $row['email'] ?>" required><br>
    Edad: <input type="number" name="edad" value="<?= $row['edad'] ?>" required><br>
    <input type="submit" value="Actualizar">
</form>
<a href="index.php"><button>Volver</button></a>