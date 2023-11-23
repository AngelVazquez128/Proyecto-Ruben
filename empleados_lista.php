<?php include 'rutas.php';?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERSONAS</title>
    <link rel="stylesheet" href="<?php echo ESTILOS_LISTA_EMPLEADOS; ?>">
    <link rel="stylesheet" href="<?php echo ESTILOS_TABLA; ?>">
    <script src="<?php echo JQUERY; ?>"></script>
    <script src="<?php echo ELIMINAR_EMPLEADO; ?>"></script>
</head>

<body>
    <div class="navbar">
        <h1>Listado de personas</h1>
        <div>

        </div>
    </div>
    <br>
    <center>
        <div >
        <a href="agregar_empleados.php" class='insertar-btn' >Crear Nuevo registro</a>
        </div>
        
    </center>
    <br>
    <?php
    require "conexionBD.php";
    $connection = conectarBD();
    $statement = "SELECT * FROM empleados WHERE status=1 AND eliminado=0 ";
    $result = $connection->query($statement);
    if ($result->num_rows > 0) {
        // Mostrar los registros
        echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Eliminar</th>
                <th>Detalles</th>
                <th>Editar</th>
            </tr>";

        while ($row = $result->fetch_assoc()) {
            $rol = '';
            if ($row["rol"] == 1) {
                $rol = "Gerente";
            } else if ($row["rol"] == 2) {
                $rol = "Ejecutivo";
            }
            echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nombre"] . " " . $row["apellidos"] . "</td>
                <td>" . $row["correo"] . "</td>
                <td>" . $rol . "</td>
                <td> <button class='eliminar' data-id='" . $row['id'] . "'>Eliminar</button></td>
                <td>  <a class='ver-detalles-btn' href='empleado_detalle.php?id=" . $row['id'] . "'>Ver Detalles</a></td>
                <td>  <a class='editar-btn' href='editar_empleados.php?id=" . $row['id'] . "'>Editar</a></td>
              </tr>";
        }

        echo "</table>";
    } else {
        echo "No se encontraron registros.";
    }

    $connection->close();
    ?>
</body>

</html>