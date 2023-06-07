<?php

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
                <h2></h2>
                <nav>
                    <a href="#"></a>
                    <a href="#"></a>
                    <a href="#"></a>
                    <a href="Backend/Login/CerrarSesion.php"> Cerrar Sesion</a>
                </nav>      
        </header>
        <div class="contenedorInicial">
            <h2>Bienvenido a la pagina de inicio de usuarios</h2>
            
        </div>

    </body>
</html>