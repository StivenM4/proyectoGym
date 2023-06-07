<?php 
    include("../../Conexion.php");

    $conexion = new Conexion();
    $verZona= "SELECT * FROM zona";
    $verImplementos = "SELECT * FROM implementos";

    $Zona_idZona = $_GET['Zona_idZona'];
    $Implementos_idImplementos = $_GET['Implementos_idImplementos'];
    $verImplementoZona = "SELECT * FROM implementoszona WHERE Zona_idZona = '$Zona_idZona' AND Implementos_idImplementos = '$Implementos_idImplementos'";
    $guardar_implemento_zona = mysqli_query($conexion->link, $verImplementoZona);

    $row = mysqli_fetch_array($guardar_implemento_zona);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../Frontend/assets/css/updates.css">
    <title>Editar implemento en zona</title>
</head>
<body>
    <div class="Contenedor">
    <h2>Editar ImplementosZona</h2>
        <form action="editarImplementoZona.php" method="POST">
            <input type="hidden" name="Zona_idZona" value="<?= $row['Zona_idZona']?>">
            <select name="Zona_idZona">
                        <?php 
                        
                        $guardar_IMZona=mysqli_query($conexion->link,$verZona);
                        while ($row = mysqli_fetch_array($guardar_IMZona)): ?>

                        <option value="<?= $row['idZona'] ?>">
                            <?= $row['NombreZona'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>
            <input type="hidden" name="Implementos_idImplementos" value="<?= $row['Implementos_idImplementos']?>">

            <select name="Implementos_idImplementos">
                        <?php 
                        
                        $guardar_ImImplementos=mysqli_query($conexion->link,$verImplementos);
                        while ($row = mysqli_fetch_array($guardar_ImImplementos)): ?>

                        <option value="<?= $row['idImplementos'] ?>">
                            <?= $row['NombreImplemento'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>
            
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
