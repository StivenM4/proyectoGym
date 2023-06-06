<?php

include("Backend/Conexion.php"); 

$conexion = new Conexion();

$verUsuario= "SELECT * FROM usuario";
$guardar_usuario=mysqli_query($conexion->link,$verUsuario);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="CSS/style.css" rel="stylesheet">
    <title>Users CRUD</title>
</head>

<body>

    <div class="formularioUsuarios">
        <h1>Crear usuario</h1>
        <form action="Backend/Modelo-Controlador/Usuario/agregarUsuario.php" method="POST">
            <input type="text" name="NombreUsuario" placeholder="Nombre">
            <input type="text" name="Correo" placeholder="Correo">
            <input type="password" name="Contrasena" placeholder="Password">

            <input type="submit" value="Agregar">
        </form>
    </div>

    <div class="usuarioTabla">
        <h2>Usuarios registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Contra</th>

                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($guardar_usuario) ): ?>
                    <tr>
                        <th><?= $row['idUsuario'] ?></th>
                        <th><?= $row['NombreUsuario'] ?></th>
                        <th><?= $row['Correo'] ?></th>
                        <th><?= $row['Contrasena'] ?></th>
                        <th><a href="Backend/Modelo-Controlador/Usuario/updateUsuario.php?idUsuario=<?= $row['idUsuario'] ?>" class="userEditar">Editar</a></th>
                        <th><a href="Backend/Modelo-Controlador/Usuario/borrarUsuario.php?idUsuario=<?= $row['idUsuario'] ?>" class="UserBorrar" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>