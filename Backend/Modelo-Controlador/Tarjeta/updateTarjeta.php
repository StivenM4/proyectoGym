<?php 
    include("../../Conexion.php");

    $conexion = new Conexion();

    $idTarjeta = $_GET['idTarjeta'];
    $verTarjeta = "SELECT * FROM tarjeta WHERE idTarjeta = '$idTarjeta'";
    $guardar_tarjeta = mysqli_query($conexion->link, $verTarjeta);

    $row = mysqli_fetch_array($guardar_tarjeta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../Frontend/assets/css/updates.css">
    <title>Editar tarjeta</title>
</head>
<body>
    <div class="formTarjeta Contenedor">
    <h2>Editar Tarjeta</h2>
        <form action="editarTarjeta.php" method="POST">
            <input type="hidden" name="idTarjeta" value="<?= $row['idTarjeta']?>">
            <input type="text" name="Numero" placeholder="Número de tarjeta" value="<?= $row['Numero']?>">
            <input type="text" name="FechaExpiracion" placeholder="Fecha de expiración" value="<?= $row['FechaExpiracion']?>">
            <input type="text" name="Codigo" placeholder="Código de seguridad" value="<?= $row['Codigo']?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
