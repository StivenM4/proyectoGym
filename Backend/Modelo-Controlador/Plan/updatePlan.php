<?php
include("../../Conexion.php");

$conexion = new Conexion();

$idPlan = $_GET['idPlan'];
$verPlan = "SELECT * FROM plan WHERE idPlan = '$idPlan'";
$guardar_plan = mysqli_query($conexion->link, $verPlan);

$row = mysqli_fetch_array($guardar_plan);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Editar plan</title>
</head>
<body>
    <div class="formPlan form">
        <form action="editarPlan.php" method="POST">
            <input type="hidden" name="idPlan" value="<?= $row['idPlan']?>">
            <input type="text" name="NombrePlan" placeholder="Nombre del plan" value="<?= $row['NombrePlan']?>">
            <input type="text" name="Duracion" placeholder="Duración" value="<?= $row['Duracion']?>">
            <input type="text" name="Precio" placeholder="Precio" value="<?= $row['Precio']?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
