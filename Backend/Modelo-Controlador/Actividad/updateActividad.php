<?php 
    include("../../Conexion.php");

    $conexion = new Conexion();

    $idActividad = $_GET['idActividad'];
    $verActividad = "SELECT * FROM actividades WHERE idActividades = '$idActividad'";
    $guardar_actividad = mysqli_query($conexion->link, $verActividad);

    $row = mysqli_fetch_array($guardar_actividad);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../Frontend/assets/css/updates.css">
    <title>Editar actividades</title>
</head>
<body>
    <div class="formActividad Contenedor">
    <h2>Editar Actividad</h2>
        <form action="editarActividad.php" method="POST">
            <input type="hidden" name="idActividad" value="<?= $row['idActividades']?>">
            <input type="text" name="NombreActividad" placeholder="Nombre" value="<?= $row['NombreActividad']?>">
            <textarea name="Descripcion" placeholder="Descripción"><?= $row['Descripcion']?></textarea>

            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>