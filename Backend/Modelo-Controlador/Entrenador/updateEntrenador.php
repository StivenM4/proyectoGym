<?php
include("../../Conexion.php");

$conexion = new Conexion();

$DniEntrenador = $_GET['DniEntrenador'];
$verEntrenador = "SELECT * FROM entrenador WHERE DniEntrenador = '$DniEntrenador'";
$guardar_entrenador = mysqli_query($conexion->link, $verEntrenador);

$row = mysqli_fetch_array($guardar_entrenador);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Editar entrenador</title>
</head>
<body>
    <div class="users-form">
        <form action="editarEntrenador.php" method="POST">
            <input type="hidden" name="DniEntrenador" value="<?= $row['DniEntrenador']?>">
            <input type="text" name="NombreEntrenador" placeholder="Nombre del entrenador" value="<?= $row['NombreEntrenador']?>">
            <input type="number" name="Edad" placeholder="Edad" value="<?= $row['Edad']?>">
            <input type="text" name="numTelefono" placeholder="Número de teléfono" value="<?= $row['numTelefono']?>">

            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
