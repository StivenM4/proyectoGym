<?php
include("../../Conexion.php");

$conexion = new Conexion();

$verUsuario="SELECT * FROM usuario";
$verTarjeta="SELECT * FROM tarjeta";
$verPlan="SELECT * FROM plan";

$idPago = $_GET['idPago'];
$verPago = "SELECT * FROM pago WHERE idPago = '$idPago'";
$guardar_pago = mysqli_query($conexion->link, $verPago);

$row1 = mysqli_fetch_array($guardar_pago);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Editar pago</title>
</head>
<body>
    <div class="formPago form">
        <form action="editarPago.php" method="POST">
            <input type="hidden" name="idPago" value="<?= $row['idPago']?>">
            <select name="idUsuarioPago">
                            <?php 
                        
                        $guardar_UsuarioPago=mysqli_query($conexion->link,$verUsuario);
                        while ($row = mysqli_fetch_array($guardar_UsuarioPago)): ?>

                            <option value="<?= $row['idUsuario'] ?>">
                                <?= $row['NombreUsuario'] ?>    

                            </option>

                            <?php endwhile; ?>
                        </select>

                        
                        <select name="idTarjetaPago">
                            <?php 

                            $guardar_TarjetaPago=mysqli_query($conexion->link, $verTarjeta);
                            while ($row = mysqli_fetch_array($guardar_TarjetaPago)): ?>
                                <option value="<?= $row['idTarjeta'] ?>">
                                    <?= $row['idTarjeta'] ?>
                                </option>
                            <?php endwhile; ?>
                        </select>

                        <select name="PlanPago">
                        <?php 
                        $guardar_PlanPago=mysqli_query($conexion->link, $verPlan);
                        while ($row = mysqli_fetch_array($guardar_PlanPago)): ?>
                            <option value="<?= $row['idPlan'] ?>">
                                <?= $row['NombrePlan'] ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
            <input type="date" name="FechaPago" oninput="formatDate()" placeholder="Fecha de pago" value="<?= $row1['FechaPago']?>">
            <input type="text" name="Total" placeholder="Total" value="<?= $row1['Total']?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
