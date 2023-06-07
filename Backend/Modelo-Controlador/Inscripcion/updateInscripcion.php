<?php
include("../../Conexion.php");

$conexion = new Conexion();

$verUsuario= "SELECT * FROM usuario";
 $verGrupo= "SELECT * FROM grupo";

 $Usuario_idUsuario = $_GET['Usuario_idUsuario'];
$Grupo_idGrupo = $_GET['Grupo_idGrupo'];
$verInscripcion = "SELECT * FROM inscripcion WHERE Usuario_idUsuario = '$Usuario_idUsuario' AND Grupo_idGrupo = '$Grupo_idGrupo'";
$guardar_inscripcion = mysqli_query($conexion->link, $verInscripcion);

$row1 = mysqli_fetch_array($guardar_inscripcion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../Frontend/assets/css/updates.css">
    <title>Editar inscripción</title>
</head>
<body>
    <div class="Contenedor">
    <h2>Editar Inscripcion</h2>
        <form action="editarInscripcion.php" method="POST">

            <select name="Usuario_idUsuario">
                        <?php 
                        
                        $guardar_InscripcionUsuario=mysqli_query($conexion->link,$verUsuario);
                        while ($row = mysqli_fetch_array($guardar_InscripcionUsuario)): ?>

                        <option value="<?= $row['idUsuario'] ?>">
                            <?= $row['NombreUsuario'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>

            <select name="Grupo_idGrupo">
                        <?php 
                        
                        $guardar_InscripcionGrupo=mysqli_query($conexion->link,$verGrupo);
                        while ($row = mysqli_fetch_array($guardar_InscripcionGrupo)): ?>

                        <option value="<?= $row['idGrupo'] ?>">
                            <?= $row['NombreGrupo'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>
            <input type="text" name="FechaInscripcion" placeholder="Fecha de inscripción" value="<?= $row1['FechaInscripcion']?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
