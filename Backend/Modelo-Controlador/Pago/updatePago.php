<?php
include("../../Conexion.php");

$conexion = new Conexion();

$idPago = $_GET['idPago'];
$verPago = "SELECT * FROM pago WHERE idPago = '$idPago'";
$guardar_pago = mysqli_query($conexion->link, $verPago);

$row = mysqli_fetch_array($guardar_pago);
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
    <div class="users-form">
        <form action="editarPago.php" method="POST">
            <input type="hidden" name="idPago" value="<?= $row['idPago']?>">
            <input type="text" name="Usuario_idUsuario" placeholder="ID de usuario" value="<?= $row['Usuario_idUsuario']?>">
            <input type="text" name="Tarjeta_idTarjeta" placeholder="ID de tarjeta" value="<?= $row['Tarjeta_idTarjeta']?>">
            <input type="text" name="Plan_idPlan" placeholder="ID de plan" value="<?= $row['Plan_idPlan']?>">
            <input type="date" name="FechaPago" oninput="formatDate()" placeholder="Fecha de pago" value="<?= $row['FechaPago']?>">
            <input type="text" name="Total" placeholder="Total" value="<?= $row['Total']?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
