<?php 
    include("../../Conexion.php");

    $conexion = new Conexion();
    

    $verUsuario= "SELECT * FROM usuario";
    $verEntrenador= "SELECT * FROM entrenador";

    $idRutina = $_GET['idRutina'];
    $verRutina = "SELECT * FROM rutina WHERE idRutina = '$idRutina'";
    $guardar_rutina = mysqli_query($conexion->link, $verRutina);
    $row1 = mysqli_fetch_array($guardar_rutina);

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../Frontend/assets/css/updates.css">
    <title>Editar rutina</title>
</head>

<body>
    <div class="FormRutina Contenedor">
    <h2>Editar Rutina</h2>
        <form action="editarRutina.php" method="POST">
            <input type="hidden" name="idRutina" value="<?= $row['idRutina']?>">

            <select name="idUsuarioRutina">
                <?php 
                        
                        $guardar_UsuarioRutina=mysqli_query($conexion->link,$verUsuario);
                        while ($row = mysqli_fetch_array($guardar_UsuarioRutina)): ?>

                <option value="<?= $row['idUsuario'] ?>">
                    <?= $row['NombreUsuario'] ?>

                </option>
                <?php endwhile; ?>
            </select>

            <select name="idEntrenadorRutina">
                <?php 
                        
                        $guardar_EntrenadorRutina=mysqli_query($conexion->link,$verEntrenador);
                        while ($row = mysqli_fetch_array($guardar_EntrenadorRutina)): ?>

                <option value="<?= $row['DniEntrenador'] ?>">
                    <?= $row['NombreEntrenador'] ?>

                </option>

                <?php endwhile; ?>
            </select>

            <input type="text" name="NombreRutina" placeholder="Nombre de la rutina" value="<?= $row1['NombreRutina']?>">
            <input type="text" name="Observaciones" placeholder="Observaciones" value="<?= $row1['Observaciones']?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>

</html>