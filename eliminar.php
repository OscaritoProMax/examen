<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $con = new mysqli("localhost", "root", "", "examen_pr2");
    if ($con->connect_error) die("Error de conexión");

    $sql = "DELETE FROM personas WHERE id=$id";
    if ($con->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error al eliminar";
    }
} else {
    echo "ID no válido";
}