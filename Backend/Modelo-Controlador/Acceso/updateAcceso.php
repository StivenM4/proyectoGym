<?php 
    include("../../Conexion.php");

    $conexion = new Conexion();
    $verZona= "SELECT * FROM zona";
    $verPlan= "SELECT * FROM plan";
    
    $Zona_idZona = $_GET['Zona_idZona'];
    $Plan_idPlan = $_GET['Plan_idPlan'];

    $verAcceso = "SELECT * FROM acceso WHERE Zona_idZona = '$Zona_idZona' AND Plan_idPlan = '$Plan_idPlan'";
    $guardar_acceso = mysqli_query($conexion->link, $verAcceso);

    $row = mysqli_fetch_array($guardar_acceso);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../Frontend/assets/css/updates.css">
    <title>Editar acceso</title>
</head>
<body>
    <div class="Contenedor">
    <h2>Editar Acceso</h2>
        <form action="editarAcceso.php" method="POST">
            <select name="Zona_idZona">
                        <?php 
                        
                        $guardar_accesoZona=mysqli_query($conexion->link,$verZona);
                        while ($row = mysqli_fetch_array($guardar_accesoZona)): ?>

                        <option value="<?= $row['idZona'] ?>">
                            <?= $row['NombreZona'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>

            <select name="Plan_idPlan">
                        <?php 
                        
                        $guardar_AccesoPlan=mysqli_query($conexion->link,$verPlan);
                        while ($row = mysqli_fetch_array($guardar_AccesoPlan)): ?>

                        <option value="<?= $row['idPlan'] ?>">
                            <?= $row['NombrePlan'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>
            
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
