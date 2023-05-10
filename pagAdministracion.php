<?php

    session_start();
    if(!isset($_SESSION['Administrador'])){
        echo'
        <script>
            alert("Inicie sesion para continuar");
        </script>
        ';
        header("location: login.html");
        session_destroy();
        die();
        
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="Frontend/assets/css/indexAdmo.css"> 
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
            <div class="cajaBotones">
                <div class="cajaB"><button>Clientes</button></div>
                <div class="cajaB"><button>Usuarios</button></div>
                <div class="cajaB"><button>Grupo</button></div>
                <div class="cajaB"><button>Btn</button></div>
                <div class="cajaB"><button>Btn</button></div>
                <div class="cajaB"><button>Btn</button></div>
                           
            </div>
                <div class="contenedor formulariosAmdo">
                <div class="contenedor AdmoClientes">
                <form action="Backend/Controlador/ControladorCliente.php" method="post">
                    <h2>Agregar Cliente</h2>
                    <div class="caja">
                        <label>codigoCliente</label>
                        <input type="text" name="codigoC">
                    </div>
                    <div class="caja">
                        <label>nombre</label>
                        <input type="text" name="nombreC">
                    </div>
                    <div class="caja">
                        <label>edad</label>
                        <input type="text" name="edadC">
                    </div>
                    <div class="caja">
                        <label>genero</label>
                        <input type="text" name="generoC">
                    </div>
                    <div class="caja">
                        <label>num Telefono</label>
                        <input type="text" name="numTelefonoC">
                    </div>
                    <button class="submit" type="submit" name="anexar">Agregar</button>
                    <button class="submit" type="submit" name="actualizar">Actualizar</button>
                    <button class="submit" type="submit" name="borrar">Borrar</button>
                    <button class="submit" type="submit" name="listar">Listar</button>
                </form>
            </div>
            <div class="contenedor AdmoUsuarios">
                <form action="" method="post">
                    <h2>Agregar Usuario</h2>
                    <div class="caja">
                        <label>codigoU</label>
                        <input type="text" name="codigoC">
                    </div>
                    <div class="caja">
                        <label>nombreU</label>
                        <input type="text" name="nombreC">
                    </div>
                    <div class="caja">
                        <label>Usuario</label>
                        <input type="text" name="edadC">
                    </div>
                    <div class="caja">
                        <label>EmailUsuario</label>
                        <input type="text" name="generoC">
                    </div>
                    <div class="caja">
                        <label>ContraU</label>
                        <input type="text" name="numTelefonoC">
                    </div>
                    <button class="submit" type="submit" name="anexar">Agregar</button>
                    <button class="submit" type="submit" name="actualizar">Actualizar</button>
                    <button class="submit" type="submit" name="borrar">Borrar</button>
                    <button class="submit" type="submit" name="listar">Listar</button>
                </form>
            </div>
        </div>
        </div>

    </body>
</html>