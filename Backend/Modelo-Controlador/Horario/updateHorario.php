<?php
include("../../Conexion.php");

$conexion = new Conexion();
$verClase= "SELECT * FROM clase";

$idHorario = $_GET['idHorario'];
$verHorario = "SELECT * FROM horario WHERE idHorario = '$idHorario'";
$guardar_horario = mysqli_query($conexion->link, $verHorario);

$row = mysqli_fetch_array($guardar_horario);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Editar horario</title>
</head>
<body>
    <div class="formHorario form">
        <form action="editarHorario.php" method="POST">
            <input type="hidden" name="idHorario" value="<?= $row['idHorario']?>">
            <input type="text" name="NombreHorario" placeholder="Nombre del horario" value="<?= $row['NombreHorario']?>">
            <input type="number" name="Tiempo" placeholder="Tiempo" value="<?= $row['Tiempo']?>">
            <select name="idClaseHorario">
                        <?php 
                        
                        $guardar_ClaseHorario=mysqli_query($conexion->link,$verClase);
                        while ($row = mysqli_fetch_array($guardar_ClaseHorario)): ?>

                        <option value="<?= $row['idClase'] ?>">
                            <?= $row['NombreClase'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
