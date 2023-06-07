<?php
include("../../Conexion.php");

$conexion = new Conexion();

$idImplemento = $_GET['idImplemento'];
$verImplemento = "SELECT * FROM implementos WHERE idImplementos = '$idImplemento'";
$guardar_implemento = mysqli_query($conexion->link, $verImplemento);

$row = mysqli_fetch_array($guardar_implemento);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../Frontend/assets/css/updates.css">
    <title>Editar implemento</title>
</head>
<body>
    <div class="formImplemento Contenedor">
    <h2>Editar Implementos</h2>
        <form action="editarImplemento.php" method="POST">
            <input type="hidden" name="idImplemento" value="<?= $row['idImplementos']?>">
            <input type="text" name="NombreImplemento" placeholder="Nombre del implemento" value="<?= $row['NombreImplemento']?>">
            <input type="text" name="Tipo" placeholder="Tipo" value="<?= $row['Tipo']?>">
            <textarea name="Funcionalidad" placeholder="Funcionalidad"><?= $row['Funcionalidad']?></textarea>
            <input type="text" name="Estado" placeholder="Estado" value="<?= $row['Estado']?>">

            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
