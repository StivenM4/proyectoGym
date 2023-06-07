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
    <link rel="stylesheet" href="Frontend/assets/css/opcionesUser.css">
</head>

<body>
    <header>
    <div class="navegacion">
            <h2 class="logo">ProFit Gym</h2>
            <div class="caja"><a class="btnSalir" href="Backend/Login/CerrarSesion.php"> Cerrar Sesion</a></div>
        </div>
 
            
    </header>
    <div class="contenedorInicial">
        <div class="opcionContra contenedor">
        <form action="Backend/Modelo-Controlador/Opciones/cambiarContra.php" method="POST">
            <h2>cambiar contraseña</h2>
            <input type="password" name="contrasenaAntigua" placeholder="Contraseña antigua">
            <input type="password" name="contrasenaNueva" placeholder="Contraseña Nueva">    
            <input type="submit" value="Agregar">
        </form>
        </div>

 
        <div class="eliminarCuenta contenedor">
            <h2>EliminarCuenta</h2>
        <form action="Backend/Modelo-Controlador/Opciones/eliminarCuenta.php" method="POST">
                            
        <input type="submit" value="Eliminar">
        </form>
        <div class="cajaVolver contenedor">
        <a href="pagUsuarios.php"> Volver</a>
        </div>
        </div>

      

    </div>

</body>

</html>