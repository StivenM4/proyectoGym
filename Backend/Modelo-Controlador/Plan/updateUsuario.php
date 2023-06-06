<?php 
    include("../../Conexion.php");

 $conexion = new Conexion();

    $idUsuario=$_GET['idUsuario'];
    $verUsuario= "SELECT * FROM usuario WHERE idUsuario='$idUsuario'";
    $guardar_usuario=mysqli_query($conexion->link,$verUsuario);

    $row=mysqli_fetch_array($guardar_usuario);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Editar usuarios</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="editarUsuario.php" method="POST">
                <input type="hidden" name="idUsuario" value="<?= $row['idUsuario']?>">
                <input type="text" name="NombreUsuario" placeholder="Nombre" value="<?= $row['NombreUsuario']?>">
                <input type="text" name="Correo" placeholder="Apellidos" value="<?= $row['Correo']?>">
                <input type="password" name="Contrasena" placeholder="contraseña" value="<?= $row['Contrasena']?>">
               

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>