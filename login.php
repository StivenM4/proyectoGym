<?php
    session_start();
    if(isset($_SESSION['Usuario'])){
        header("location: pagUsuarios.php");
    }else if(isset($_SESSION['Administrador'])){
        header("location: pagAdministracion.php");
    }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="Frontend/assets/css/login.css">
    <script src="https://kit.fontawesome.com/f6b67d9989.js" crossorigin="anonymous"></script>

</head>

<body>

    <header>
        <div class="navegacion"></div>
        <h2 class="logo">ProFit Gym</h2>
        <nav>
            <a href="index.html">Inicio</a>
            <a href="#">Contactanos</a>
            <a href="#" class="btnLogin">login</a>
        </nav>
        </div>
    </header>

    <div class="contenedor registro">
        <div class="contenedor_mensaje">
            <div class="mensaje">
                <h2>Bienvenido a <br>ProFit Gym </h2>
                <p>Registrate para acceder a todas las funcionalidades</p>
                <p>Si ya tienes cuenta logeate aqui </p>
                <button class="ingreso">Login</button>
            </div>
        </div>
        <form class="formulario register" action="Backend/Modelo-Controlador/Usuario/agregarUsuario.php" method="post">
            <h2>Registrarse</h2>
            <div class="caja">
                <label>Nombre</label>
                <i class="fa-solid fa-signature"></i>
                <input type="text" name="NombreUsuario" required>

            </div>
            
            <div class="caja">
                <label>Email</label>
                <i class="fa-solid fa-envelope"></i>
                <input type="text" name="Correo" required>

            </div>
            <div class="caja">
                <label>Contraseña</label>
                <i class="fas fa-key icon"></i>
                <input type="password" name="contrasena" required>

            </div>
            <div class="boton">
                <input class="submit" type="submit" value="Registrarse">
            </div>
        </form>

    </div>
    <div class="contenedor login">
        <form class="formulario logeo" action="Backend/Login/LogeoUsuario.php" method="post">
            <h2>Ingresar</h2>

            <div class="caja">
                <label>Email</label>
                <i class="fa-solid fa-envelope"></i>
                <input type="text" name="correoL" required>

            </div>
            <div class="caja">
                <label>Contraseña</label>
                <i class="fas fa-key icon"></i>
                <input type="password" name="contraL" required>
            </div>
            <div class="boton">
                <input class="submit" type="submit" value="Logearse">
            </div>
        </form>
        <div class="contenedor_mensaje">
            <div class="mensaje">
                <h2>Bienvenido Denuevo</h2>
                <p>Logeate para acceder a todas las funcionalidades</p>
                <p>¿No tienes cuenta? registrate aqui </p>
                <button class="registarse">Registrarse</button>
            </div>
        </div>
    </div>

    <script src="Frontend/assets/js/animacionLogin.js"></script>
</body>


</html>