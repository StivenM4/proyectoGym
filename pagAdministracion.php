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
                <div class="caja"><button>Usuarios</button></div>
                <div class="caja"><button>Planes</button></div>
                <div class="caja"><button>Entrenadores</button></div>
                <div class="caja"><button>Clase</button></div>
                <div class="caja"><button>Grupo</button></div>
                <div class="caja"><button>Horario</button></div>
                <div class="caja"><button>Maquina</button></div>
                <div class="caja"><button>Rutina</button></div>
                <div class="caja"><button>Zona</button></div>
                <div class="caja"><button>Servicios</button></div>
                <div class="caja"><button>Pago</button></div>
                           
            </div>
                <div class="formulariosAmdo">
                <div class="contenedor formUsuario ">
                <form action="Backend/Controlador/ControladorUsuario.php" method="post">
                    <h2>Usuario Prueba</h2>
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
                    <button class="submit" type="submit" name="anexar">Agregar</button>
                    <button class="submit" type="submit" name="actualizar">Actualizar</button>
                    <button class="submit" type="submit" name="borrar">Borrar</button>
                    <button class="submit" type="submit" name="listar">Listar</button>
                </form>
            </div>

            <div class="contenedor formPlanes ">
                <form action="Backend/Controlador/ControladorPlanes.php" method="post">
                    <h2>Planes Prueba</h2>
                    <div class="caja">
                        <label>idPlan</label>
                        <input type="text" name="idPlan">
                    </div>
                    <div class="caja">
                        <label>Nombre</label>
                        <input type="text" name="nombrePlan">
                    </div>
                    <div class="caja">
                        <label>Duracion</label>
                        <input type="text" name="duracionPlan">
                    </div>
                    <div class="caja">
                        <label>Precio</label>
                        <input type="text" name="precioPlan">
                    </div>
                    <div class="caja">
                        <label>Beneficios</label>
                        <input type="text" name="beneficiosPlan">
                    </div>
                    <div class="caja">
                        <label>Restricciones</label>
                        <input type="text" name="restriccionesPlan">
                    </div>
                    <button class="submit" type="submit" name="anexar">Agregar</button>
                    <button class="submit" type="submit" name="actualizar">Actualizar</button>
                    <button class="submit" type="submit" name="borrar">Borrar</button>
                    <button class="submit" type="submit" name="listar">Listar</button>
                </form>
            </div>

            <div class="contenedor formEntrenadores ">
                <form action="Backend/Controlador/ControladorEntrenadores.php" method="post">
                    <h2>Entrenadores Prueba</h2>
                    <div class="caja">
                        <label>CC Entrenador</label>
                        <input type="text" name="cedulaEntrenador">
                    </div>
                    <div class="caja">
                        <label>nombre</label>
                        <input type="text" name="nombreEntrenador">
                    </div>
                    <div class="caja">
                        <label>edad</label>
                        <input type="text" name="edadEntrenador">
                    </div>
                    <div class="caja">
                        <label>num telefono</label>
                        <input type="text" name="numTelefonoEntrenador">
                    </div>
                    <div class="caja">
                        <label>especializacion</label>
                        <input type="text" name="especializacionEntrenador">
                    </div>
                    <button class="submit" type="submit" name="anexar">Agregar</button>
                    <button class="submit" type="submit" name="actualizar">Actualizar</button>
                    <button class="submit" type="submit" name="borrar">Borrar</button>
                    <button class="submit" type="submit" name="listar">Listar</button>
                </form>
            </div>

            <div class="contenedor formClase ">
                <form action="Backend/Controlador/ControladorClase.php" method="post">
                    <h2>Clase Prueba</h2>
                    <div class="caja">
                        <label>id clase</label>
                        <input type="text" name="idClase">
                    </div>
                    <div class="caja">
                        <label>nombre</label>
                        <input type="text" name="nombreClase">
                    </div>
                    <div class="caja">
                        <label>descripcion</label>
                        <input type="text" name="descripcionClase">
                    </div>
                    <div class="caja">
                        <label>duracion</label>
                        <input type="text" name="DuracionClase">
                    </div>

                    <button class="submit" type="submit" name="anexar">Agregar</button>
                    <button class="submit" type="submit" name="actualizar">Actualizar</button>
                    <button class="submit" type="submit" name="borrar">Borrar</button>
                    <button class="submit" type="submit" name="listar">Listar</button>
                </form>
            </div>

            <div class="contenedor formGrupo ">
                <form action="Backend/Controlador/ControladorGrupo.php" method="post">
                    <h2>Grupo Prueba</h2>
                    <div class="caja">
                        <label>id grupo</label>
                        <input type="text" name="idGrupo">
                    </div>
                    <div class="caja">
                        <label>nombre</label>
                        <input type="text" name="nombreGrupo">
                    </div>
                    <div class="caja">
                        <label>descripcion</label>
                        <input type="text" name="descripcionGrupo">
                    </div>
                    <div class="caja">
                        <label>tamaño</label>
                        <input type="text" name="tamGrupo">
                    </div>

                    <button class="submit" type="submit" name="anexar">Agregar</button>
                    <button class="submit" type="submit" name="actualizar">Actualizar</button>
                    <button class="submit" type="submit" name="borrar">Borrar</button>
                    <button class="submit" type="submit" name="listar">Listar</button>
                </form>
            </div>

            <div class="contenedor formHorario ">
                <form action="Backend/Controlador/ControladorHorario.php" method="post">
                    <h2>Horario Prueba</h2>
                    <div class="caja">
                        <label>id horario</label>
                        <input type="text" name="idHorario">
                    </div>
                    <div class="caja">
                        <label>fecha</label>
                        <input type="text" name="fechaHorario">
                    </div>
                    <div class="caja">
                        <label>hora inicio</label>
                        <input type="text" name="horaInicioHorario">
                    </div>
                    <div class="caja">
                        <label>hora finalizacion</label>
                        <input type="text" name="horafinalizacionHorario">
                    </div>

                    <button class="submit" type="submit" name="anexar">Agregar</button>
                    <button class="submit" type="submit" name="actualizar">Actualizar</button>
                    <button class="submit" type="submit" name="borrar">Borrar</button>
                    <button class="submit" type="submit" name="listar">Listar</button>
                </form>
            </div>

            <div class="contenedor formMaquina ">
                <form action="Backend/Controlador/ControladorMaquina.php" method="post">
                    <h2>Maquina Prueba</h2>
                    <div class="caja">
                        <label>id maquina</label>
                        <input type="text" name="idMaquina">
                    </div>
                    <div class="caja">
                        <label>nombre</label>
                        <input type="text" name="nombreMaquina">
                    </div>
                    <div class="caja">
                        <label>funcionalidad</label>
                        <input type="text" name="funcionalidadMaquina">
                    </div>
                    <div class="caja">
                        <label>estado</label>
                        <input type="text" name="estadoMaquina">
                    </div>

                    <button class="submit" type="submit" name="anexar">Agregar</button>
                    <button class="submit" type="submit" name="actualizar">Actualizar</button>
                    <button class="submit" type="submit" name="borrar">Borrar</button>
                    <button class="submit" type="submit" name="listar">Listar</button>
                </form>
            </div>

            <div class="contenedor formRutina ">
                <form action="Backend/Controlador/ControladorRutina.php" method="post">
                    <h2>Rutina Prueba</h2>
                    <div class="caja">
                        <label>id rutina</label>
                        <input type="text" name="idRutina">
                    </div>
                    <div class="caja">
                        <label>nombre</label>
                        <input type="text" name="nombreRutina">
                    </div>
                    <div class="caja">
                        <label>descripcion</label>
                        <input type="text" name="descripcionRutina">
                    </div>
                    <div class="caja">
                        <label>ejercicios</label>
                        <input type="text" name="ejerciciosRutina">
                    </div>
                    <div class="caja">
                        <label>repeticiones</label>
                        <input type="text" name="repeticionesRutina">
                    </div>
                    <div class="caja">
                        <label>series</label>
                        <input type="text" name="seriesRutina">
                    </div>
                    <div class="caja">
                        <label>objetivos</label>
                        <input type="text" name="objetivosRutina">
                    </div>
                    <button class="submit" type="submit" name="anexar">Agregar</button>
                    <button class="submit" type="submit" name="actualizar">Actualizar</button>
                    <button class="submit" type="submit" name="borrar">Borrar</button>
                    <button class="submit" type="submit" name="listar">Listar</button>
                </form>
            </div>

            <div class="contenedor formZona ">
                <form action="Backend/Controlador/ControladorZona.php" method="post">
                    <h2>Zona Prueba</h2>
                    <div class="caja">
                        <label>id zona</label>
                        <input type="text" name="idZona">
                    </div>
                    <div class="caja">
                        <label>nombre</label>
                        <input type="text" name="nombreZona">
                    </div>
                    <div class="caja">
                        <label>ubicacion</label>
                        <input type="text" name="ubicacionZona">
                    </div>
                    <div class="caja">
                        <label>servicios disponibles</label>
                        <input type="text" name="serviciosDisponiblesZona">
                    </div>

                    <button class="submit" type="submit" name="anexar">Agregar</button>
                    <button class="submit" type="submit" name="actualizar">Actualizar</button>
                    <button class="submit" type="submit" name="borrar">Borrar</button>
                    <button class="submit" type="submit" name="listar">Listar</button>
                </form>
            </div>
            <div class="contenedor formServicios ">
                <form action="Backend/Controlador/ControladorServicios.php" method="post">
                    <h2>Servicios Prueba</h2>
                    <div class="caja">
                        <label>id Servicio</label>
                        <input type="text" name="idServicio">
                    </div>
                    <div class="caja">
                        <label>nombre</label>
                        <input type="text" name="nombreServicio">
                    </div>
                    <div class="caja">
                        <label>descripcion</label>
                        <input type="text" name="descripcionServicio">
                    </div>

                    <button class="submit" type="submit" name="anexar">Agregar</button>
                    <button class="submit" type="submit" name="actualizar">Actualizar</button>
                    <button class="submit" type="submit" name="borrar">Borrar</button>
                    <button class="submit" type="submit" name="listar">Listar</button>
                </form>
            </div>
            <div class="contenedor formPago ">
                <form action="Backend/Controlador/ControladorPago.php" method="post">
                    <h2>Pago Prueba</h2>
                    <div class="caja">
                        <label>id Pago</label>
                        <input type="text" name="idPago">
                    </div>
                    <div class="caja">
                        <label>valor</label>
                        <input type="text" name="valorPago">
                    </div>
                    <div class="caja">
                        <label>fecha</label>
                        <input type="text" name="fechaPago">
                    </div>
                    <div class="caja">
                        <label>estado</label>
                        <input type="text" name="estadoPago">
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