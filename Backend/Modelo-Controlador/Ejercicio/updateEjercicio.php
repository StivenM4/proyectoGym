<?php
include("../../Conexion.php");

$conexion = new Conexion();

$idEjercicio = $_GET['idEjercicio'];
$verEjercicio = "SELECT * FROM ejercicios WHERE idEjercicios = '$idEjercicio'";
$guardar_ejercicio = mysqli_query($conexion->link, $verEjercicio);

$row = mysqli_fetch_array($guardar_ejercicio);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Editar ejercicio</title>
</head>
<body>
    <div class="formEjercicio form">
        <form action="editarEjercicio.php" method="POST">
            <input type="hidden" name="idEjercicio" value="<?= $row['idEjercicios']?>">
            <input type="text" name="NombreEjercicio" placeholder="Nombre del ejercicio" value="<?= $row['NombreEjercicio']?>">
            <textarea name="Descripcion" placeholder="Descripción"><?= $row['Descripcion']?></textarea>

            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
