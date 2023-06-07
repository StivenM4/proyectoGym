<?php 
    include("../../Conexion.php");

    $conexion = new Conexion();

    $idServicios = $_GET['idServicios'];
    $verServicio = "SELECT * FROM servicios WHERE idServicios = '$idServicios'";
    $guardar_servicio = mysqli_query($conexion->link, $verServicio);

    $row = mysqli_fetch_array($guardar_servicio);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../Frontend/assets/css/updates.css">
    <title>Editar servicio</title>
</head>
<body>
    <div class="formServicios Contenedor">
    <h2>Editar Servicios</h2>
        <form action="editarServicios.php" method="POST">
            <input type="hidden" name="idServicios" value="<?= $row['idServicios']?>">
            <input type="text" name="NombreServicios" placeholder="Nombre del servicio" value="<?= $row['NombreServicios']?>">
            <textarea name="Descripcion" placeholder="Descripción"><?= $row['Descripcion']?></textarea>
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>

