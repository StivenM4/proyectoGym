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
                </nav>      
        </header>

        <div class="contenedor formulario">
           
                <form action="Backend/Controlador/ControladorUsuario.php" method="post">
                    <h2>Elige tu plan y entrena ya </h2>
                    <div class="caja">
                        <label>codigo</label>
                        <input type="text" name="codUsuario">
                    </div>
                    <div class="caja">
                        <label>nombre</label>
                        <input type="text" name="nombreUsuario">
                    </div>
                    <div class="caja">
                        <label>usuario</label>
                        <input type="text" name="usuario">
                    </div>
                    <div class="caja">
                        <label>email</label>
                        <input type="text" name="emailUsuario">
                    </div>
                    <div class="caja">
                        <label>contrasena</label>
                        <input type="text" name="contraUsuario">
                    </div>
                    <div class="botones">
                        <button class="submit" type="submit" name="anexar">Pagar</button>

                    </div>

                </form>
        </div>

    </body>
</html>