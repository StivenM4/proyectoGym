<?php
include("../../Conexion.php");

$conexion = new Conexion();
$verActividades= "SELECT * FROM actividades";

$idClase = $_GET['idClase'];
$verClase = "SELECT * FROM clase WHERE idClase = '$idClase'";
$guardar_clase = mysqli_query($conexion->link, $verClase);

$row = mysqli_fetch_array($guardar_clase);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Editar clase</title>
</head>
<body>
    <div class="formClase form">
        <form action="editarClase.php" method="POST">
            <input type="hidden" name="idClase" value="<?= $row['idClase']?>">
            <input type="text" name="NombreClase" placeholder="Nombre de la clase" value="<?= $row['NombreClase']?>">
            <input type="text" name="Duracion" placeholder="Duración" value="<?= $row['Duracion']?>">
            <select name="idActividadesClase">
                        <?php 
                        $guardar_ActividadeClase=mysqli_query($conexion->link,$verActividades);
                        while ($row = mysqli_fetch_array($guardar_ActividadeClase)): ?>
                        </option>
                        <option value="<?= $row['idActividades'] ?>">
                            <?= $row['NombreActividad'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
