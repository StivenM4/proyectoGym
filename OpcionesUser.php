<?php

include("Backend/Conexion.php"); 

$conexion = new Conexion();

$verGrupo= "SELECT * FROM grupo";


    session_start();
    if(!isset($_SESSION['Usuario'])){
        echo'
        <script>
            alert("Inicie sesion para continuar");
        </script>
        ';
        header("location: login.");
        session_destroy();
        die();
        
    }
    $email = $_SESSION['Usuario'];

$BuscarUsuario = "SELECT idUsuario, NombreUsuario FROM Usuario WHERE Correo = '$email'";
$GuardarUsuario = mysqli_query($conexion->link, $BuscarUsuario);
$row = mysqli_fetch_assoc($GuardarUsuario);
$idUsuario = $row['idUsuario'];
$nombreUsuario = $row['NombreUsuario'];


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <header>
        <div class="navegacion"></div>
        <nav>
            
            <a href="Backend/Login/CerrarSesion.php"> Cerrar Sesion</a>
        </nav>
    </header>
    <div class="contenedorInicial">
        <div class="opcionContra">
        <form action="Backend/Modelo-Controlador/Opciones/cambiarContra.php" method="POST">
            <h2>cambiar contraseña</h2>
            <input type="text" name="contrasenaAntigua" placeholder="Contraseña antigua">
            <input type="text" name="contrasenaNueva" placeholder="Contraseña Nueva">
            <input type="submit" value="Agregar">
        </form>
        </div>
        <div class="opcionSalirDeGrupo">
            <h2>salir del grupo</h2>
            <form action="Backend/Modelo-Controlador/Opciones/salirGrupo.php" method="POST">
        <select name="SalirGrupo">
                        <?php 
                        $guardar_Grupo=mysqli_query($conexion->link,$verGrupo);
                        while ($row = mysqli_fetch_array($guardar_Grupo)): ?>

                        <option value="<?= $row['idGrupo'] ?>">
                            <?= $row['NombreGrupo'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>
            <input type="submit" value="SalirGrupo">
        </form>

        </div>
        
        <div class="eliminarCuenta">
            <h2>EliminarCuenta</h2>
        <form action="Backend/Modelo-Controlador/Opciones/eliminarCuenta.php" method="POST">
                            
        <input type="submit" value="Eliminar">
        </form>
        </div>

      

    </div>

</body>

</html>