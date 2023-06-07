<?php

include("Backend/Consultas.php"); 

    session_start();
    if(!isset($_SESSION['Administrador'])){
        echo'
        <script>
            alert("Inicie sesion para continuar");
        </script>
        ';
        header("location: login.php");
        session_destroy();
        die();
        
    }


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>

</head>

<body>
    <script src="Frontend/assets/js/visibilidadAdmo.js"></script>
    <link rel="stylesheet" href="Frontend/assets/css/pagAdmi.css">
    <header>
        <div class="navegacion">
            <h2 class="logo">ProFit Gym Admo 2.0</h2>
            <div class="caja"><a class="btnSalir" href="Backend/Login/CerrarSesion.php"> Cerrar Sesion</a></div>
        </div>

    </header>
    <div class="contenedorInicial">
        <div>
            <div class="cajaBotones">

                <div class="caja"><button onclick="divVisibility('formUsuario')">Usuarios</button></div>
                <div class="caja"><button onclick="divVisibility('formInscripcion')">Inscripcion</button></div>
                <div class="caja"><button onclick="divVisibility('formActividades')">Actividades</button></div>
                <div class="caja"><button onclick="divVisibility('formClase')">Clase</button></div>
                <div class="caja"><button onclick="divVisibility('formEjercicios')">Ejercicios</button></div>
                <div class="caja"><button onclick="divVisibility('formEntrenador')">Entrenadores</button></div>
                <div class="caja"><button onclick="divVisibility('formGrupo')">Grupo</button></div>
                <div class="caja"><button onclick="divVisibility('formHorario')">Horario</button></div>
                <div class="caja"><button onclick="divVisibility('formImplementos')">Implementos</button></div>
                <div class="caja"><button onclick="divVisibility('formImplementosZona')">ImplementosZona</button></div>        
                <div class="caja"><button onclick="divVisibility('formPago')">Pago</button></div>
                <div class="caja"><button onclick="divVisibility('formPlan')">Plan</button></div>
                <div class="caja"><button onclick="divVisibility('formRutina')">Rutina</button></div>
                <div class="caja"><button onclick="divVisibility('formEjerciciosRutina')">EjerciciosRutina</button></div>            
                <div class="caja"><button onclick="divVisibility('formAcceso')">Acceso</button></div>
                <div class="caja"><button onclick="divVisibility('formZona')">Zona</button></div>
                <div class="caja"><button onclick="divVisibility('formServicio')">Servicio</button></div>
                <div class="caja"><button onclick="divVisibility('formTarjeta')">Tarjeta</button></div>
                



            </div>
        </div>
        <div class="Amdo">
            <div id="mensaje" class="mensaje">
                <div>
                    <h1>Bienvenido a la pagina <br> del administrador</h1>
                    <p>Selecciona un boton para ver su crud en un formulario</p>
                </div>

            </div>


            <div id="formUsuario" class="contenedor">

                <h1>Crear usuario</h1>
                <form action="Backend/Modelo-Controlador/Usuario/agregarUsuario.php" method="POST">
                    <input type="text" name="NombreUsuario" placeholder="Nombre">
                    <input type="text" name="Correo" placeholder="Correo">
                    <input type="password" name="Contrasena" placeholder="Password">

                    <input type="submit" value="Agregar">
                </form>

                <h2>Usuarios registrados</h2>
                <table>

                    <tbody>
                        <tr class="InicioTabla">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Contra</th>
                            <th>Editar</th>

                        </tr>

                        <?php while ($row = mysqli_fetch_array($guardar_usuario) ): ?>
                        <tr>
                            <th>
                                <?= $row['idUsuario'] ?>
                            </th>
                            <th>
                                <?= $row['NombreUsuario'] ?>
                            </th>
                            <th>
                                <?= $row['Correo'] ?>
                            </th>
                            <th>
                                <?= $row['Contrasena'] ?>
                            </th>
                            <th><a href="Backend/Modelo-Controlador/Usuario/updateUsuario.php?idUsuario=<?= $row['idUsuario'] ?>"
                                    class="userEditar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Usuario/borrarUsuario.php?idUsuario=<?= $row['idUsuario'] ?>"
                                    class="UserBorrar">borrar</a>
                            </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>

            <div id="formInscripcion" class="contenedor">
    <h1>Inscribir usuario en grupo</h1>
    <form action="Backend/Modelo-Controlador/Inscripcion/agregarInscripcion.php" method="POST">
    <select name="Usuario_idUsuario">
                        <?php 
                        
                        $guardar_InscripcionUsuario=mysqli_query($conexion->link,$verUsuario);
                        while ($row = mysqli_fetch_array($guardar_InscripcionUsuario)): ?>

                        <option value="<?= $row['idUsuario'] ?>">
                            <?= $row['NombreUsuario'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>

            <select name="Grupo_idGrupo">
                        <?php 
                        
                        $guardar_InscripcionGrupo=mysqli_query($conexion->link,$verGrupo);
                        while ($row = mysqli_fetch_array($guardar_InscripcionGrupo)): ?>

                        <option value="<?= $row['idGrupo'] ?>">
                            <?= $row['NombreGrupo'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>
        <input type="date" name="FechaInscripcion" oninput="formatDate()" placeholder="Fecha de inscripción">

        <input type="submit" value="Inscribir">
    </form>

    <h2>Inscripciones realizadas</h2>
    <table>
        
        <tbody>
        <tr class="InicioTabla">
                <th>Usuario</th>
                <th>Grupo</th>
                <th>Fecha de inscripción</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($guardar_Incripcion)): ?>
                <?php
                        $idUsuario = $row['Usuario_idUsuario'];
                        $consultaUsuario3 = "SELECT NombreUsuario FROM Usuario WHERE idUsuario = '$idUsuario'";
                        $resultadoUsuario3 = mysqli_query($conexion->link, $consultaUsuario3);
                        $rowUsuario3 = mysqli_fetch_array($resultadoUsuario3);
                        $nombreUsuario3 = $rowUsuario3['NombreUsuario'];


                        $idGrupo = $row['Grupo_idGrupo'];
                        $consultaGrupo3 = "SELECT NombreGrupo FROM Grupo WHERE idGrupo = '$idGrupo'";
                        $resultadoGrupo3 = mysqli_query($conexion->link, $consultaGrupo3);
                        $rowGrupo3 = mysqli_fetch_array($resultadoGrupo3);
                        $nombreGrupo3 = $rowGrupo3['NombreGrupo'];

                        ?>
                        
                <tr>

                    <td><?= $nombreUsuario3 ?></td>
                    <td><?= $nombreGrupo3?></td>
                    <td><?= $row['FechaInscripcion'] ?></td>
                    <td>
                    <a href="Backend/Modelo-Controlador/Inscripcion/updateInscripcion.php?Usuario_idUsuario=<?= $row['Usuario_idUsuario'] ?>&Grupo_idGrupo=<?= $row['Grupo_idGrupo'] ?>" class="editar">Editar</a>
                    <a href="Backend/Modelo-Controlador/Inscripcion/borrarInscripcion.php?Usuario_idUsuario=<?= $row['Usuario_idUsuario'] ?>&Grupo_idGrupo=<?= $row['Grupo_idGrupo'] ?>" class="eliminar">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

            <div id="formActividades" class="contenedor">
                <h1>Crear actividad</h1>
                <form action="Backend/Modelo-Controlador/Actividad/agregarActividad.php" method="POST">
                    <input type="text" name="NombreActividad" placeholder="Nombre">
                    <input type="text" name="Descripcion" placeholder="Descripción"></textarea>
                    <input type="submit" value="Agregar">
                </form>

                <h2>Actividades registradas</h2>
                <table>

                    <tbody>
                        <tr class="InicioTabla">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>

                        </tr>
                        <?php while ($row = mysqli_fetch_array($guardar_Actividades)): ?>
                        <tr>
                            <th>
                                <?= $row['idActividades'] ?>
                            </th>
                            <th>
                                <?= $row['NombreActividad'] ?>
                            </th>
                            <th>
                                <?= $row['Descripcion'] ?>
                            </th>
                            <th>
                                <a href="Backend/Modelo-Controlador/Actividad/updateActividad.php?idActividad=<?= $row['idActividades'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Actividad/borrarActividad.php?idActividad=<?= $row['idActividades'] ?>"
                                    class="borrar">borrar</a>
                            </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>


            <div id="formClase" class="contenedor">
                <h1>Crear clase</h1>
                <form action="Backend/Modelo-Controlador/Clase/agregarClase.php" method="POST">
                    <input type="text" name="NombreClase" placeholder="Nombre">
                    <input type="number" name="Duracion" placeholder="Duración">
                    <select name="idActividadesClase">
                        <?php 
                        $guardar_ActividadeClase=mysqli_query($conexion->link,$verActividades);
                        while ($row = mysqli_fetch_array($guardar_ActividadeClase)): ?>

                        <option value="<?= $row['idActividades'] ?>">
                            <?= $row['NombreActividad'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>

                    <input type="submit" value="Agregar">
                </form>

                <h2>Clases registradas</h2>
                <table>

                    <tbody>
                        <tr class="InicioTabla">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Duración</th>
                            <th>Actividad</th>
                            <th>Acciones</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($guardar_Clase)): ?>

                            <?php
                    $idActividad = $row['Actividades_idActividades'];
                    $consultaActividad = "SELECT NombreActividad FROM Actividades WHERE idActividades = '$idActividad'";
                    $resultadoActividad = mysqli_query($conexion->link, $consultaActividad);
                    $rowActividad = mysqli_fetch_array($resultadoActividad);
                    $nombreActividad = $rowActividad['NombreActividad'];;
                    ?>
                        <tr>
                            <th>
                                <?= $row['idClase'] ?>
                            </th>
                            <th>
                                <?= $row['NombreClase'] ?>
                            </th>
                            <th>
                                <?= $row['Duracion'] ?>
                            </th>
                            <th>
                            <?= $nombreActividad ?>

                            </th>

                            <th>
                                <a href="Backend/Modelo-Controlador/Clase/updateClase.php?idClase=<?= $row['idClase'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Clase/borrarClase.php?idClase=<?= $row['idClase'] ?>"
                                    class="borrar">borrar</a>
                            </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>


            <div id="formEjercicios" class="contenedor">
                <h1>Crear ejercicio</h1>
                <form action="Backend/Modelo-Controlador/Ejercicio/agregarEjercicio.php" method="POST">
                    <input type="text" name="NombreEjercicio" placeholder="Nombre">
                    <textarea name="Descripcion" placeholder="Descripción"></textarea>

                    <input type="submit" value="Agregar">
                </form>

                <h2>Ejercicios registrados</h2>
                <table>

                    <tbody>
                        <tr class="InicioTabla">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($guardar_Ejercicios)): ?>
                        <tr>
                            <th>
                                <?= $row['idEjercicios'] ?>
                            </th>
                            <th>
                                <?= $row['NombreEjercicio'] ?>
                            </th>
                            <th>
                                <?= $row['Descripcion'] ?>
                            </th>
                            <th>
                                <a href="Backend/Modelo-Controlador/Ejercicio/updateEjercicio.php?idEjercicio=<?= $row['idEjercicios'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Ejercicio/borrarEjercicio.php?idEjercicio=<?= $row['idEjercicios'] ?>"
                                    class="borrar">borrar</a>
                            </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>


            <div id="formEntrenador" class="contenedor">
                <h1>Crear entrenador</h1>
                <form action="Backend/Modelo-Controlador/Entrenador/agregarEntrenador.php" method="POST">
                    <input type="text" name="DniEntrenador" placeholder="DNI">
                    <input type="text" name="NombreEntrenador" placeholder="Nombre">
                    <input type="number" name="Edad" placeholder="Edad">
                    <input type="text" name="numTelefono" placeholder="Número de teléfono">

                    <input type="submit" value="Agregar">
                </form>

                <h2>Entrenadores registrados</h2>
                <table>

                    <tbody>
                        <tr class="InicioTabla">
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Número de teléfono</th>
                            <th>Acciones</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($guardar_Entrenador)): ?>
                        <tr>
                            <th>
                                <?= $row['DniEntrenador'] ?>
                            </th>
                            <th>
                                <?= $row['NombreEntrenador'] ?>
                            </th>
                            <th>
                                <?= $row['Edad'] ?>
                            </th>
                            <th>
                                <?= $row['numTelefono'] ?>
                            </th>
                            <th>
                                <a href="Backend/Modelo-Controlador/Entrenador/updateEntrenador.php?DniEntrenador=<?= $row['DniEntrenador'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Entrenador/borrarEntrenador.php?DniEntrenador=<?= $row['DniEntrenador'] ?>"
                                    class="borrar">borrar</a>
                            </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>





            <div id="formGrupo" class="contenedor">
                <h1>Crear grupo</h1>
                <form action="Backend/Modelo-Controlador/Grupo/agregarGrupo.php" method="POST">
                    <input type="text" name="NombreGrupo" placeholder="Nombre">
                    <textarea name="Descripcion" placeholder="Descripción"></textarea>
                    <input type="number" name="Tamanio" placeholder="Tamaño">
                    <select name="idClaseGrupo">
                        <?php 
                        
                        $guardar_ClaseGrupo=mysqli_query($conexion->link,$verClase);
                        while ($row = mysqli_fetch_array($guardar_ClaseGrupo)): ?>

                        <option value="<?= $row['idClase'] ?>">
                            <?= $row['NombreClase'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>
                    <input type="submit" value="Agregar">
                </form>

                <h2>Grupos registrados</h2>
                <table>


                    <tbody>
                        <tr class="InicioTabla">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Tamaño</th>
                            <th>Clase</th>
                            <th>Acciones</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($guardar_Grupo)): ?>

                            <?php
                    $idClase = $row['Clase_idClase'];
                    $consultaClase1 = "SELECT NombreClase FROM Clase WHERE idClase = '$idClase'";
                    $resultadoClase1 = mysqli_query($conexion->link, $consultaClase1);
                    $rowClase1 = mysqli_fetch_array($resultadoClase1);
                    $nombreClase1 = $rowClase1['NombreClase'];
                    ?>

                        <tr>
                            <th>
                                <?= $row['idGrupo'] ?>
                            </th>
                            <th>
                                <?= $row['NombreGrupo'] ?>
                            </th>
                            <th>
                                <?= $row['Descripcion'] ?>
                            </th>
                            <th>
                                <?= $row['Tamanio'] ?>
                            </th>
                            <th>
                                <?= $nombreClase1 ?>
                            </th>
                            <th>
                                <a href="Backend/Modelo-Controlador/Grupo/updateGrupo.php?idGrupo=<?= $row['idGrupo'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Grupo/borrarGrupo.php?idGrupo=<?= $row['idGrupo'] ?>"
                                    class="borrar">borrar</a>
                            </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>



            <div id="formHorario" class="contenedor">
                <h1>Crear horario</h1>
                <form action="Backend/Modelo-Controlador/Horario/agregarHorario.php" method="POST">
                    <input type="text" name="NombreHorario" placeholder="Nombre">
                    <input type="number" name="Tiempo" placeholder="Tiempo">
                    <select name="idClaseHorario">
                        <?php 
                        
                        $guardar_ClaseHorario=mysqli_query($conexion->link,$verClase);
                        while ($row = mysqli_fetch_array($guardar_ClaseHorario)): ?>

                        <option value="<?= $row['idClase'] ?>">
                            <?= $row['NombreClase'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>

                    <input type="submit" value="Agregar">
                </form>

                <h2>Horarios registrados</h2>
                <table>

                    <tbody>
                        <tr class="InicioTabla">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tiempo</th>
                            <th>Clase</th>
                            <th>Acciones</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($guardar_Horario)): ?>

                            <?php
                    $idClase = $row['Clase_idClase'];
                    $consultaClase2 = "SELECT NombreClase FROM Clase WHERE idClase = '$idClase'";
                    $resultadoClase2 = mysqli_query($conexion->link, $consultaClase2);
                    $rowClase2 = mysqli_fetch_array($resultadoClase2);
                    $nombreClase2 = $rowClase2['NombreClase'];
                    ?>
                        <tr>
                            <th>
                                <?= $row['idHorario'] ?>
                            </th>
                            <th>
                                <?= $row['NombreHorario'] ?>
                            </th>
                            <th>
                                <?= $row['Tiempo'] ?>
                            </th>
                            <th>
                                <?= $nombreClase2 ?>
                            </th>
                            <th>
                                <a href="Backend/Modelo-Controlador/Horario/updateHorario.php?idHorario=<?= $row['idHorario'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Horario/borrarHorario.php?idHorario=<?= $row['idHorario'] ?>"
                                    class="borrar">borrar</a>
                            </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div id="formImplementos" class="contenedor">
                <h1>Crear implemento</h1>
                <form action="Backend/Modelo-Controlador/Implemento/agregarImplemento.php" method="POST">
                    <input type="text" name="NombreImplemento" placeholder="Nombre">
                    <input type="text" name="Tipo" placeholder="Tipo">
                    <textarea name="Funcionalidad" placeholder="Funcionalidad"></textarea>
                    <input type="text" name="Estado" placeholder="Estado">

                    <input type="submit" value="Agregar">
                </form>

                <h2>Implementos registrados</h2>
                <table>


                    <tbody>
                        <tr class="InicioTabla">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Funcionalidad</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($guardar_Implementos)): ?>
                        <tr>
                            <th>
                                <?= $row['idImplementos'] ?>
                            </th>
                            <th>
                                <?= $row['NombreImplemento'] ?>
                            </th>
                            <th>
                                <?= $row['Tipo'] ?>
                            </th>
                            <th>
                                <?= $row['Funcionalidad'] ?>
                            </th>
                            <th>
                                <?= $row['Estado'] ?>
                            </th>
                            <th>
                                <a href="Backend/Modelo-Controlador/Implemento/updateImplemento.php?idImplemento=<?= $row['idImplementos'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Implemento/borrarImplemento.php?idImplemento=<?= $row['idImplementos'] ?>"
                                    class="borrar">borrar</a>
                            </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div id="formImplementosZona" class="contenedor">
    <h1>Asignar implementos a zona</h1>
    <form action="Backend/Modelo-Controlador/ImplementosZona/agregarImplementosZona.php" method="POST">
        <select name="Zona_idZona">
        <?php 
                        
                        $guardar_ImZona=mysqli_query($conexion->link,$verZona);
                        while ($row = mysqli_fetch_array($guardar_ImZona)): ?>
                <option value="<?= $row ['idZona'] ?>">
                <?= $row ['NombreZona'] ?>
            </option>
            <?php endwhile; ?>
        </select>
        <select name="Implementos_idImplementos">
        <?php 
                        
                        $guardar_imImplementos=mysqli_query($conexion->link,$verImplementos);
                        while ($row = mysqli_fetch_array($guardar_imImplementos)): ?>
                <option value="<?= $row ['idImplementos'] ?>">
                <?= $row ['NombreImplemento'] ?>
            </option>
            <?php endwhile; ?>
        </select>

        <input type="submit" value="Asignar">
    </form>

    <h2>Implementos asignados a zonas</h2>
    <table>

        <tbody>
        <tr class="InicioTabla">
                <th>Zona</th>
                <th>Implemento</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($guardar_ImplementosZona)): ?>
                <?php
                        $idZona = $row['Zona_idZona'];
                        $consultaZona2 = "SELECT NombreZona FROM Zona WHERE idZona = '$idZona'";
                        $resultadoZona2 = mysqli_query($conexion->link, $consultaZona2);
                        $rowZona2 = mysqli_fetch_array($resultadoZona2);
                        $nombreZona2 = $rowZona2['NombreZona'];
                      

                        $idImplemento = $row['Implementos_idImplementos'];
                        $consultaImplemento = "SELECT NombreImplemento FROM Implementos WHERE idImplementos = '$idImplemento'";
                        $resultadoImplemento = mysqli_query($conexion->link, $consultaImplemento);
                        $rowImplemento = mysqli_fetch_array($resultadoImplemento);
                        $nombreImplemento = $rowImplemento['NombreImplemento'];
                       
                        ?>
                <tr>
                    <td><?= $nombreZona2 ?></td>
                    <td><?= $nombreImplemento ?></td>
                    <td>
                       
                        <a href="Backend/Modelo-Controlador/ImplementosZona/updateImplementosZona.php?Zona_idZona=<?= $row['Zona_idZona'] ?>&Implementos_idImplementos=<?= $row['Implementos_idImplementos'] ?>" class="editar">Editar</a>
                        <a href="Backend/Modelo-Controlador/ImplementosZona/borrarImplementosZona.php?Zona_idZona=<?= $row['Zona_idZona'] ?>&Implementos_idImplementos=<?= $row['Implementos_idImplementos'] ?>" class="eliminar">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>


            <div id="formPago" class="contenedor">
                <h1>Realizar pago</h1>
                <form action="Backend/Modelo-Controlador/Pago/agregarPago.php" method="POST">

                    <select name="idUsuarioPago">
                        <?php 
                        
                        $guardar_UsuarioPago=mysqli_query($conexion->link,$verUsuario);
                        while ($row = mysqli_fetch_array($guardar_UsuarioPago)): ?>

                        <option value="<?= $row['idUsuario'] ?>">
                            <?= $row['NombreUsuario'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>


                    <select name="idTarjetaPago">
                        <?php 

                            $guardar_TarjetaPago=mysqli_query($conexion->link, $verTarjeta);
                            while ($row = mysqli_fetch_array($guardar_TarjetaPago)): ?>
                        <option value="<?= $row['idTarjeta'] ?>">
                            <?= $row['idTarjeta'] ?>
                        </option>
                        <?php endwhile; ?>
                    </select>

                    <select name="PlanPago">
                        <?php 
                        $guardar_PlanPago=mysqli_query($conexion->link, $verPlan);
                        while ($row = mysqli_fetch_array($guardar_PlanPago)): ?>
                        <option value="<?= $row['idPlan'] ?>">
                            <?= $row['NombrePlan'] ?>
                        </option>
                        <?php endwhile; ?>
                    </select>

                    <input type="submit" value="Realizar Pago">
                </form>

                <h2>Pagos registrados</h2>
                <table>

                    <tbody>
                        <tr class="InicioTabla">
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Tarjeta</th>
                            <th>Plan</th>
                            <th>Fecha de Pago</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($guardar_Pago)): ?>

                            <?php
                    $idUsuario = $row['Usuario_idUsuario'];
                    $consultaUsuario1 = "SELECT NombreUsuario FROM Usuario WHERE idUsuario = '$idUsuario'";
                    $resultadoUsuario1 = mysqli_query($conexion->link, $consultaUsuario1);
                    $rowUsuario1 = mysqli_fetch_array($resultadoUsuario1);
                    $nombreUsuario1 = $rowUsuario1['NombreUsuario'];

                    $idTarjeta = $row['Tarjeta_idTarjeta'];
                    $consultaTarjeta = "SELECT Numero FROM Tarjeta WHERE idTarjeta = '$idTarjeta'";
                    $resultadoTarjeta = mysqli_query($conexion->link, $consultaTarjeta);
                    $rowTarjeta = mysqli_fetch_array($resultadoTarjeta);
                    $numeroTarjeta = $rowTarjeta['Numero'];
           
                    $idPlan = $row['Plan_idPlan'];
                    $consultaPlan1 = "SELECT NombrePlan FROM Plan WHERE idPlan = '$idPlan'";
                    $resultadoPlan1 = mysqli_query($conexion->link, $consultaPlan1);
                    $rowPlan1 = mysqli_fetch_array($resultadoPlan1);
                    $nombrePlan1 = $rowPlan1['NombrePlan'];
                  
                    


                    ?>
                        <tr>
                            <th>
                                <?= $row['idPago'] ?>
                            </th>
                            <th>
                                <?= $nombreUsuario1 ?>
                            </th>
                            <th>
                                <?= $numeroTarjeta ?>
                            </th>
                            <th>
                                <?= $nombrePlan1 ?>
                            </th>
                            <th>
                                <?= $row['FechaPago'] ?>
                            </th>
                            <th>
                                <?= $row['Total'] ?>
                            </th>
                            <th>
                                <a href="Backend/Modelo-Controlador/Pago/updatePago.php?idPago=<?= $row['idPago'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Pago/borrarPago.php?idPago=<?= $row['idPago'] ?>"
                                    class="borrar">borrar</a>
                            </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div id="formPlan" class="contenedor">
                <h1>Crear plan</h1>
                <form action="Backend/Modelo-Controlador/Plan/agregarPlan.php" method="POST">
                    <input type="text" name="NombrePlan" placeholder="Nombre">
                    <input type="number" name="Duracion" placeholder="Duración">
                    <input type="number" name="Precio" placeholder="Precio">

                    <input type="submit" value="Agregar">
                </form>

                <h2>Planes registrados</h2>
                <table>

                    <tbody>
                        <tr class="InicioTabla">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Duración</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($guardar_Plan)): ?>
                        <tr>
                            <th>
                                <?= $row['idPlan'] ?>
                            </th>
                            <th>
                                <?= $row['NombrePlan'] ?>
                            </th>
                            <th>
                                <?= $row['Duracion'] ?>
                            </th>
                            <th>
                                <?= $row['Precio'] ?>
                            </th>
                            <th>
                                <a href="Backend/Modelo-Controlador/Plan/updatePlan.php?idPlan=<?= $row['idPlan'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Plan/borrarPlan.php?idPlan=<?= $row['idPlan'] ?>"
                                    class="borrar">borrar</a>
                            </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div id="formAcceso" class="contenedor">
    <h1>Crear acceso</h1>
    <form action="Backend/Modelo-Controlador/Acceso/agregarAcceso.php" method="POST">
        <select name="Zona_idZona">
            <?php 
            $guardar_AccesoZona=mysqli_query($conexion->link,$verZona);
                        while ($row = mysqli_fetch_array($guardar_AccesoZona)): ?> 

                <option value="<?= $row ['idZona'] ?>">
                <?= $row ['NombreZona'] ?>
            </option>
                <?php endwhile; ?>
        </select>
        <select name="Plan_idPlan">
        <?php 
            $guardar_AccesoPlan=mysqli_query($conexion->link,$verPlan);
                        while ($row = mysqli_fetch_array($guardar_AccesoPlan)): ?>
                <option value="<?= $row ['idPlan'] ?>">
                <?= $row ['NombrePlan'] ?>
            </option>
                <?php endwhile; ?>
        </select>

        <input type="submit" value="Agregar">
    </form>

    <h2>Accesos registrados</h2>
    <table>
       
        <tbody>
        <tr class="InicioTabla">
                <th>Zona</th>
                <th>Plan</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($guardar_Acceso)): ?>
                <?php
                        $idZona = $row['Zona_idZona'];
                        $consultaZona1 = "SELECT NombreZona FROM zona WHERE idZona = '$idZona'";
                        $resultadoZona1 = mysqli_query($conexion->link, $consultaZona1);
                        $rowZona1 = mysqli_fetch_array($resultadoZona1);
                        $nombreZona1 = $rowZona1['NombreZona'];


                        $idPlan = $row['Plan_idPlan'];
                        $consultaPlan2 = "SELECT NombrePlan FROM Plan WHERE idPlan = '$idPlan'";
                        $resultadoPlan2 = mysqli_query($conexion->link, $consultaPlan2);
                        $rowPlan2 = mysqli_fetch_array($resultadoPlan2);
                        $nombrePlan2 = $rowPlan2['NombrePlan'];

                        ?>
                <tr>

                    <td><?= $nombreZona1 ?></td>
                    <td><?= $nombrePlan2 ?></td>
                    <td>
                    <a href="Backend/Modelo-Controlador/Acceso/updateAcceso.php?Zona_idZona=<?= $row['Zona_idZona'] ?>&Plan_idPlan=<?= $row['Plan_idPlan'] ?>" class="editar">Editar</a>
                    <a href="Backend/Modelo-Controlador/Acceso/borrarAcceso.php?Zona_idZona=<?= $row['Zona_idZona'] ?>&Plan_idPlan=<?= $row['Plan_idPlan'] ?>" class="eliminar">Eliminar</a>
                       
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>



            <div id="formZona" class="contenedor">
    <h1>Crear zona</h1>
    <form action="Backend/Modelo-Controlador/Zona/agregarZona.php" method="POST">
        <input type="text" name="Nombre" placeholder="Nombre">
        <input type="text" name="Ubicacion" placeholder="Ubicación">

        <input type="submit" value="Agregar">
    </form>

    <h2>Zonas registradas</h2>
    <table>

        <tbody>
        <tr class="InicioTabla">
                <th>ID</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($guardar_Zona)): ?>
                <tr>
                    <th><?= $row['idZona'] ?></th>
                    <th><?= $row['NombreZona'] ?></th>
                    <th><?= $row['Ubicacion'] ?></th>
                    <th>
                        <a href="Backend/Modelo-Controlador/Zona/updateZona.php?idZona=<?= $row['idZona'] ?>" class="editar">Editar</a>
                        <a href="Backend/Modelo-Controlador/Zona/borrarZona.php?idZona=<?= $row['idZona'] ?>" class="eliminar">Eliminar</a>
                    </th>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>




            <div id="formRutina" class="contenedor">
                <h1>Crear rutina</h1>
                <form action="Backend/Modelo-Controlador/Rutina/agregarRutina.php" method="POST">
                    <select name="idUsuarioRutina">
                        <?php 
                        
                        $guardar_UsuarioRutina=mysqli_query($conexion->link,$verUsuario);
                        while ($row = mysqli_fetch_array($guardar_UsuarioRutina)): ?>

                        <option value="<?= $row['idUsuario'] ?>">
                            <?= $row['NombreUsuario'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>
                    <select name="idEntrenadorRutina">
                        <?php 
                        
                        $guardar_EntrenadorRutina=mysqli_query($conexion->link,$verEntrenador);
                        while ($row = mysqli_fetch_array($guardar_EntrenadorRutina)): ?>

                        <option value="<?= $row['DniEntrenador'] ?>">
                            <?= $row['NombreEntrenador'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>

                    <input type="text" name="NombreRutina" placeholder="Nombre">
                    <input type="text" name="Observaciones" placeholder="Observaciones">

                    <input type="submit" value="Agregar">
                </form>

                <h2>Rutinas registradas</h2>
                <table>
                    <tbody>
                        <tr class="InicioTabla">
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Entrenador</th>
                            <th>Nombre Rutina</th>
                            <th>Observaciones</th>
                            <th>Acciones</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($guardar_Rutina)): ?>

                            <?php
                    $idUsuario = $row['Usuario_idUsuario'];
                    $consultaUsuario2 = "SELECT NombreUsuario FROM Usuario WHERE idUsuario = '$idUsuario'";
                    $resultadoUsuario2 = mysqli_query($conexion->link, $consultaUsuario2);
                    $rowUsuario2 = mysqli_fetch_array($resultadoUsuario2);
                    $nombreUsuario2 = $rowUsuario2['NombreUsuario'];
                    
                    $dniEntrenador = $row['Entrenador_DniEntrenador'];
                    $consultaEntrenador = "SELECT NombreEntrenador FROM Entrenador WHERE DniEntrenador = '$dniEntrenador'";
                    $resultadoEntrenador = mysqli_query($conexion->link, $consultaEntrenador);
                    $rowEntrenador = mysqli_fetch_array($resultadoEntrenador);
                    $nombreEntrenador = $rowEntrenador['NombreEntrenador'];
                    ?>
                        <tr>
                            <th>
                                <?= $row['idRutina'] ?>
                            </th>
                            <th>
                                <?= $nombreUsuario2 ?>
                            </th>
                            <th>
                                <?= $nombreEntrenador ?>
                            </th>
                            <th>
                                <?= $row['NombreRutina'] ?>
                            </th>
                            <th>
                                <?= $row['Observaciones'] ?>
                            </th>
                            <th>
                                <a href="Backend/Modelo-Controlador/Rutina/updateRutina.php?idRutina=<?= $row['idRutina'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Rutina/borrarRutina.php?idRutina=<?= $row['idRutina'] ?>"
                                    class="borrar">borrar</a>
                            </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div id="formEjerciciosRutina" class="contenedor">
    <h1>Asignar ejercicios a rutina</h1>
    <form action="Backend/Modelo-Controlador/EjerciciosRutina/agregarEjerciciosRutina.php" method="POST">
        <select name="Rutina_idRutina">

            <?php $guardar_EjerRutina=mysqli_query($conexion->link,$verRutina);
                        while ($row = mysqli_fetch_array($guardar_EjerRutina)): ?>
                <option value="<?= $row ['idRutina'] ?>">
                <?= $row ['NombreRutina'] ?>
            </option>

            <?php endwhile; ?>
        </select>

        <select name="Ejercicios_idEjercicios">
            <?php $guardar_EjerEjercicios=mysqli_query($conexion->link,$verEjercicios);
                        while ($row = mysqli_fetch_array($guardar_EjerEjercicios)): ?>

                        <option value="<?= $row['idEjercicios'] ?>">
                            <?= $row['NombreEjercicio'] ?>

                        </option>

           <?php endwhile; ?>
                
        </select>
        <input type="number" name="Series" placeholder="Series">
        <input type="number" name="Repeticiones" placeholder="Repeticiones">

        <input type="submit" value="Asignar">
    </form>

    <h2>Ejercicios asignados a rutinas</h2>
    <table>
        
        <tbody>
        <tr class="InicioTabla">

        <th>Rutina</th>
        <th>Ejercicio</th>
        <th>Series</th>
        <th>Repeticiones</th>
        <th>Acciones</th>
        </tr>
            <?php while ($row = mysqli_fetch_array($guardar_EjerciciosRutina)): ?>
                <?php
                        $idRutina = $row['Rutina_idRutina'];
                        $consultaRutina = "SELECT NombreRutina FROM Rutina WHERE idRutina = '$idRutina'";
                        $resultadoRutina = mysqli_query($conexion->link, $consultaRutina);
                        $rowRutina = mysqli_fetch_array($resultadoRutina);
                        $nombreRutina = $rowRutina['NombreRutina'];


                        $idEjercicio = $row['Ejercicios_idEjercicios'];
                        $consultaEjercicio = "SELECT NombreEjercicio FROM Ejercicios WHERE idEjercicios = '$idEjercicio'";
                        $resultadoEjercicio = mysqli_query($conexion->link, $consultaEjercicio);
                        $rowEjercicio = mysqli_fetch_array($resultadoEjercicio);
                        $nombreEjercicio = $rowEjercicio['NombreEjercicio'];

                        ?>

                <tr>

                    <td><?= $nombreRutina ?></td>
                    <td><?= $nombreEjercicio  ?></td>
                    <td><?= $row['Series'] ?></td>
                    <td><?= $row['Repeticiones'] ?></td>
                    <td>
                        
                    <a href="Backend/Modelo-Controlador/EjerciciosRutina/updateEjerciciosRutina.php?Rutina_idRutina=<?= $row['Rutina_idRutina'] ?>&Ejercicios_idEjercicios=<?= $row['Ejercicios_idEjercicios'] ?>" class="editar">Editar</a>
                    <a href="Backend/Modelo-Controlador/EjerciciosRutina/borrarEjerciciosRutina.php?Rutina_idRutina=<?= $row['Rutina_idRutina'] ?>&Ejercicios_idEjercicios=<?= $row['Ejercicios_idEjercicios'] ?>" class="eliminar">Eliminar</a>
                                           
                    
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>


            <div id="formServicio" class="contenedor">
                <h1>Crear servicio</h1>
                <form action="Backend/Modelo-Controlador/Servicios/agregarServicios.php" method="POST">
                    <input type="text" name="NombreServicios" placeholder="Nombre">
                    <textarea name="Descripcion" placeholder="Descripción"></textarea>

                    <input type="submit" value="Agregar">
                </form>

                <h2>Servicios registrados</h2>
                <table>

                    <tbody>
                        <tr class="InicioTabla">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($guardar_Servicio)): ?>
                        <tr>
                            <th>
                                <?= $row['idServicios'] ?>
                            </th>
                            <th>
                                <?= $row['NombreServicios'] ?>
                            </th>
                            <th>
                                <?= $row['Descripcion'] ?>
                            </th>
                            <th>
                                <a href="Backend/Modelo-Controlador/Servicios/updateServicios.php?idServicios=<?= $row['idServicios'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Servicios/borrarServicios.php?idServicios=<?= $row['idServicios'] ?>"
                                    class="borrar">borrar</a>
                            </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <div id="formTarjeta" class="contenedor">
                <h1>Crear tarjeta</h1>
                <form action="Backend/Modelo-Controlador/Tarjeta/agregarTarjeta.php" method="POST">
                    <input type="text" name="Numero" placeholder="Número">
                    <input type="text" name="FechaExpiracion" placeholder="Fecha de expiración">
                    <input type="text" name="Codigo" placeholder="Código">

                    <input type="submit" value="Agregar">
                </form>

                <h2>Tarjetas registradas</h2>
                <table>

                    <tbody>
                        <tr class="InicioTabla">
                            <th>ID</th>
                            <th>Número</th>
                            <th>Fecha de expiración</th>
                            <th>Código</th>
                            <th>Acciones</th>
                        </tr>
                        <?php while ($row = mysqli_fetch_array($guardar_Tarjeta)): ?>
                        <tr>
                            <th>
                                <?= $row['idTarjeta'] ?>
                            </th>
                            <th>
                                <?= $row['Numero'] ?>
                            </th>
                            <th>
                                <?= $row['FechaExpiracion'] ?>
                            </th>
                            <th>
                                <?= $row['Codigo'] ?>
                            </th>
                            <th>
                                <a href="Backend/Modelo-Controlador/Tarjeta/updateTarjeta.php?idTarjeta=<?= $row['idTarjeta'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Tarjeta/borrarTarjeta.php?idTarjeta=<?= $row['idTarjeta'] ?>"
                                    class="borrar">borrar</a>
                            </th>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>