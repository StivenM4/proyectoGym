<?php 
    include("../../Conexion.php");

    $conexion = new Conexion();

    $idZona = $_GET['idZona'];
    $verZona = "SELECT * FROM zona WHERE idZona = '$idZona'";
    $guardar_Zona = mysqli_query($conexion->link, $verZona);

    $row = mysqli_fetch_array($guardar_Zona);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Editar zona</title>
</head>
<body>
    <div class="users-form">
        <form action="editarZona.php" method="POST">
            <input type="hidden" name="idZona" value="<?= $row['idZona']?>">
            <input type="text" name="Nombre" placeholder="Nombre de la zona" value="<?= $row['NombreZona']?>">
            <input type="text" name="Ubicacion" placeholder="Ubicación" value="<?= $row['Ubicacion']?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>

<?php
?>











