<?php
$hostDB = "localhost";
$userDB = "root";
$pwdDB = "";
$nameDB = "examen_pr2";

$conexDB = new mysqli($hostDB, $userDB, $pwdDB, $nameDB);
if ($conexDB->connect_error) {
    echo $conexDB->connect_error;
    die();
}
$sql = "SELECT * FROM personas";
$resultadosSQL = $conexDB->query($sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Personas</title>
    <link rel="stylesheet" href="styles.css"> <!-- Puedes cambiar el nombre aquí -->
</head>

<body>
    <h1 class="principal">Lista de Personas Registradas</h1>

    <div class="contenedor-webb">
        <div class="info-webb">
            <a href="crear.php"><button>Crear Persona</button></a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Edad</th>
                        <th>Calcular</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultadosSQL && $resultadosSQL->num_rows > 0) {
                        while ($row = $resultadosSQL->fetch_assoc()) {
                            $id = $row['id'];
                            $nombre = $row['nombre'];
                            $email = $row['email'];
                            $edad = $row['edad'];
                            $mayorEdad = ($edad >= 18) ? "Sí" : "No";
                        
                            echo "<tr>
                                    
                                    <td>$nombre</td>
                                    <td>$email</td>
                                    <td>$edad</td>
                                    <td>$mayorEdad</td> <!-- Mostrar resultado -->
                                    <td>
                                        <a href='modificar.php?id=$id'><button>Modificar</button></a>
                                        <a href='eliminar.php?id=$id' onclick=\"return confirm('¿Estás seguro de eliminar esta persona?')\">
                                            <button>Eliminar</button>
                                        </a>
                                    </td>
                                 </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No hay registros disponibles</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer-seccion">
        <a href="index.html"><button>Volver al inicio</button></a>
    </div>
</body>

</html>


