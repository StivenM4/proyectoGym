<?php
include("../../Conexion.php");

$conexion = new Conexion();
$verClase= "SELECT * FROM clase";

$idGrupo = $_GET['idGrupo'];
$verGrupo = "SELECT * FROM grupo WHERE idGrupo = '$idGrupo'";
$guardar_grupo = mysqli_query($conexion->link, $verGrupo);

$row = mysqli_fetch_array($guardar_grupo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Editar grupo</title>
</head>
<body>
    <div class="formGrupo form">
        <form action="editarGrupo.php" method="POST">
            <input type="hidden" name="idGrupo" value="<?= $row['idGrupo']?>">    
            <input type="text" name="NombreGrupo" placeholder="Nombre del grupo" value="<?= $row['NombreGrupo']?>">
            <textarea name="Descripcion" placeholder="Descripción"><?= $row['Descripcion']?></textarea>
            <input type="number" name="Tamanio" placeholder="Tamaño" value="<?= $row['Tamanio']?>">
            <select name="idClaseGrupo">
                        <?php 
                        
                        $guardar_ClaseGrupo=mysqli_query($conexion->link,$verClase);
                        while ($row = mysqli_fetch_array($guardar_ClaseGrupo)): ?>

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
