<?php

include("Backend/Conexion.php"); 

$conexion = new Conexion();

$verUsuario= "SELECT * FROM usuario";
$guardar_usuario=mysqli_query($conexion->link,$verUsuario);

$verActividades= "SELECT * FROM actividades";
$guardar_Actividades=mysqli_query($conexion->link,$verActividades);

$verClase= "SELECT * FROM clase";
$guardar_Clase=mysqli_query($conexion->link,$verClase);

$verEjercicios= "SELECT * FROM ejercicios";
$guardar_Ejercicios=mysqli_query($conexion->link,$verEjercicios);

$verEntrenador= "SELECT * FROM entrenador";
$guardar_Entrenador=mysqli_query($conexion->link,$verEntrenador);

$verGrupo= "SELECT * FROM grupo";
$guardar_Grupo=mysqli_query($conexion->link,$verGrupo);

$verHorario= "SELECT * FROM horario";
$guardar_Horario=mysqli_query($conexion->link,$verHorario);

$verImplementos= "SELECT * FROM implementos";
$guardar_Implementos=mysqli_query($conexion->link,$verImplementos);

$verPago= "SELECT * FROM pago";
$guardar_Pago=mysqli_query($conexion->link,$verPago);

$verPlan= "SELECT * FROM plan";
$guardar_Plan=mysqli_query($conexion->link,$verPlan);

$verRutina= "SELECT * FROM rutina";
$guardar_Rutina=mysqli_query($conexion->link,$verRutina);

$verServicio= "SELECT * FROM servicios";
$guardar_Servicio=mysqli_query($conexion->link,$verServicio);

$verTarjeta= "SELECT * FROM tarjeta";
$guardar_Tarjeta=mysqli_query($conexion->link,$verTarjeta);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>

</head>

<body>
    <script src="Frontend/assets/js/visibilidadAdmo.js"></script>
    <header>
        <div class="navegacion"></div>
        <h2 class="logo">ProFit Gym Admo 2.0</h2>
        <nav>
            <a href="index.html">Inicio</a>
        </nav>
    </header>
    <div class="contenedorInicial">
        <div>
            <div class="cajaBotones">

                <div class="caja"><button onclick="divVisibility('formUsuario')">Usuarios</button></div>
                <div class="caja"><button onclick="divVisibility('formActividades')">Actividades</button></div>
                <div class="caja"><button onclick="divVisibility('formClase')">Clase</button></div>
                <div class="caja"><button onclick="divVisibility('formEjercicios')">Ejercicios</button></div>
                <div class="caja"><button onclick="divVisibility('formEntrenador')">Entrenadores</button></div>
                <div class="caja"><button onclick="divVisibility('formGrupo')">Grupo</button></div>
                <div class="caja"><button onclick="divVisibility('formHorario')">Horario</button></div>
                <div class="caja"><button onclick="divVisibility('formImplementos')">Implementos</button></div>
                <div class="caja"><button onclick="divVisibility('formPago')">Pago</button></div>
                <div class="caja"><button onclick="divVisibility('formPlan')">Plan</button></div>
                <div class="caja"><button onclick="divVisibility('formRutina')">Rutina</button></div>
                <div class="caja"><button onclick="divVisibility('formServicio')">Servicio</button></div>
                <div class="caja"><button onclick="divVisibility('formTarjeta')">Tarjeta</button></div>
                
                
                <div class="caja"><a class="btnSalir" href="Backend/Login/CerrarSesion.php"> Cerrar Sesion</a></div>
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
                                        class="userEditar">Editar</a></th>
                                <th><a href="Backend/Modelo-Controlador/Usuario/borrarUsuario.php?idUsuario=<?= $row['idUsuario'] ?>"
                                        class="UserBorrar">borrar</a></th>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
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
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($guardar_Actividades)): ?>
                        <tr>
                            <td>
                                <?= $row['idActividades'] ?>
                            </td>
                            <td>
                                <?= $row['NombreActividad'] ?>
                            </td>
                            <td>
                                <?= $row['Descripcion'] ?>
                            </td>
                            <td>
                                <a href="Backend/Modelo-Controlador/Actividad/updateActividad.php?idActividad=<?= $row['idActividades'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Actividad/borrarActividad.php?idActividad=<?= $row['idActividades'] ?>"
                                    class="borrar">borrar</a>
                            </td>
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
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Duración</th>
                            <th>Actividad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($guardar_Clase)): ?>
                        <tr>
                            <td>
                                <?= $row['idClase'] ?>
                            </td>
                            <td>
                                <?= $row['NombreClase'] ?>
                            </td>
                            <td>
                                <?= $row['Duracion'] ?>
                            </td>
                            <td>
                                <?= $row['Actividades_idActividades'] ?>

                            </td>

                            <td>
                                <a href="Backend/Modelo-Controlador/Clase/updateClase.php?idClase=<?= $row['idClase'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Clase/borrarClase.php?idClase=<?= $row['idClase'] ?>"
                                    class="borrar">borrar</a>
                            </td>
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
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($guardar_Ejercicios)): ?>
                        <tr>
                            <td>
                                <?= $row['idEjercicios'] ?>
                            </td>
                            <td>
                                <?= $row['NombreEjercicio'] ?>
                            </td>
                            <td>
                                <?= $row['Descripcion'] ?>
                            </td>
                            <td>
                                <a href="Backend/Modelo-Controlador/Ejercicio/updateEjercicio.php?idEjercicio=<?= $row['idEjercicios'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Ejercicio/borrarEjercicio.php?idEjercicio=<?= $row['idEjercicios'] ?>"
                                    class="borrar">borrar</a>
                            </td>
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
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Número de teléfono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($guardar_Entrenador)): ?>
                        <tr>
                            <td>
                                <?= $row['DniEntrenador'] ?>
                            </td>
                            <td>
                                <?= $row['NombreEntrenador'] ?>
                            </td>
                            <td>
                                <?= $row['Edad'] ?>
                            </td>
                            <td>
                                <?= $row['numTelefono'] ?>
                            </td>
                            <td>
                                <a href="Backend/Modelo-Controlador/Entrenador/updateEntrenador.php?DniEntrenador=<?= $row['DniEntrenador'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Entrenador/borrarEntrenador.php?DniEntrenador=<?= $row['DniEntrenador'] ?>"
                                    class="borrar">borrar</a>
                            </td>
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
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Tamaño</th>
                            <th>Clase</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($guardar_Grupo)): ?>
                        <tr>
                            <td>
                                <?= $row['idGrupo'] ?>
                            </td>
                            <td>
                                <?= $row['NombreGrupo'] ?>
                            </td>
                            <td>
                                <?= $row['Descripcion'] ?>
                            </td>
                            <td>
                                <?= $row['Tamanio'] ?>
                            </td>
                            <td>
                                <?= $row['Clase_idClase'] ?>
                            </td>
                            <td>
                                <a href="Backend/Modelo-Controlador/Grupo/updateGrupo.php?idGrupo=<?= $row['idGrupo'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Grupo/borrarGrupo.php?idGrupo=<?= $row['idGrupo'] ?>"
                                    class="borrar">borrar</a>
                            </td>
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
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tiempo</th>
                            <th>Clase</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($guardar_Horario)): ?>
                        <tr>
                            <td>
                                <?= $row['idHorario'] ?>
                            </td>
                            <td>
                                <?= $row['NombreHorario'] ?>
                            </td>
                            <td>
                                <?= $row['Tiempo'] ?>
                            </td>
                            <td>
                                <?= $row['Clase_idClase'] ?>
                            </td>
                            <td>
                                <a href="Backend/Modelo-Controlador/Horario/updateHorario.php?idHorario=<?= $row['idHorario'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Horario/borrarHorario.php?idHorario=<?= $row['idHorario'] ?>"
                                    class="borrar">borrar</a>
                            </td>
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
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Funcionalidad</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($guardar_Implementos)): ?>
                        <tr>
                            <td>
                                <?= $row['idImplementos'] ?>
                            </td>
                            <td>
                                <?= $row['NombreImplemento'] ?>
                            </td>
                            <td>
                                <?= $row['Tipo'] ?>
                            </td>
                            <td>
                                <?= $row['Funcionalidad'] ?>
                            </td>
                            <td>
                                <?= $row['Estado'] ?>
                            </td>
                            <td>
                                <a href="Backend/Modelo-Controlador/Implemento/updateImplemento.php?idImplemento=<?= $row['idImplementos'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Implemento/borrarImplemento.php?idImplemento=<?= $row['idImplementos'] ?>"
                                    class="borrar">borrar</a>
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
    

                        <input type="date" name="FechaPago" oninput="formatDate() placeholder="Fecha de Pago">
                        <input type="submit" value="Realizar Pago">
                </form>

                <h2>Pagos registrados</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Tarjeta</th>
                            <th>Plan</th>
                            <th>Fecha de Pago</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($guardar_Pago)): ?>
                        <tr>
                            <td>
                                <?= $row['idPago'] ?>
                            </td>
                            <td>
                                <?= $row['Usuario_idUsuario'] ?>
                            </td>
                            <td>
                                <?= $row['Tarjeta_idTarjeta'] ?>
                            </td>
                            <td>
                                <?= $row['Plan_idPlan'] ?>
                            </td>
                            <td>
                                <?= $row['FechaPago'] ?>
                            </td>
                            <td>
                                <?= $row['Total'] ?>
                            </td>
                            <td>
                                <a href="Backend/Modelo-Controlador/Pago/updatePago.php?idPago=<?= $row['idPago'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Pago/borrarPago.php?idPago=<?= $row['idPago'] ?>"
                                    class="borrar">borrar</a>
                            </td>
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
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Duración</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($guardar_Plan)): ?>
                        <tr>
                            <td>
                                <?= $row['idPlan'] ?>
                            </td>
                            <td>
                                <?= $row['NombrePlan'] ?>
                            </td>
                            <td>
                                <?= $row['Duracion'] ?>
                            </td>
                            <td>
                                <?= $row['Precio'] ?>
                            </td>
                            <td>
                                <a href="Backend/Modelo-Controlador/Plan/updatePlan.php?idPlan=<?= $row['idPlan'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Plan/borrarPlan.php?idPlan=<?= $row['idPlan'] ?>"
                                    class="borrar">borrar</a>
                            </td>
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
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Entrenador</th>
                            <th>Nombre Rutina</th>
                            <th>Observaciones</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($guardar_Rutina)): ?>
                        <tr>
                            <td>
                                <?= $row['idRutina'] ?>
                            </td>
                            <td>
                                <?= $row['Usuario_idUsuario'] ?>
                            </td>
                            <td>
                                <?= $row['Entrenador_DniEntrenador'] ?>
                            </td>
                            <td>
                                <?= $row['NombreRutina'] ?>
                            </td>
                            <td>
                                <?= $row['Observaciones'] ?>
                            </td>
                            <td>
                                <a href="Backend/Modelo-Controlador/Rutina/updateRutina.php?idRutina=<?= $row['idRutina'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Rutina/borrarRutina.php?idRutina=<?= $row['idRutina'] ?>"
                                    class="borrar">borrar</a>
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
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($guardar_Servicio)): ?>
                        <tr>
                            <td>
                                <?= $row['idServicios'] ?>
                            </td>
                            <td>
                                <?= $row['NombreServicios'] ?>
                            </td>
                            <td>
                                <?= $row['Descripcion'] ?>
                            </td>
                            <td>
                                <a href="Backend/Modelo-Controlador/Servicios/updateServicios.php?idServicios=<?= $row['idServicios'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Servicios/borrarServicios.php?idServicios=<?= $row['idServicios'] ?>"
                                    class="borrar">borrar</a>
                            </td>
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
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Número</th>
                            <th>Fecha de expiración</th>
                            <th>Código</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($guardar_Tarjeta)): ?>
                        <tr>
                            <td>
                                <?= $row['idTarjeta'] ?>
                            </td>
                            <td>
                                <?= $row['Numero'] ?>
                            </td>
                            <td>
                                <?= $row['FechaExpiracion'] ?>
                            </td>
                            <td>
                                <?= $row['Codigo'] ?>
                            </td>
                            <td>
                                <a href="Backend/Modelo-Controlador/Tarjeta/updateTarjeta.php?idTarjeta=<?= $row['idTarjeta'] ?>"
                                    class="editar">Editar</a>
                                <a href="Backend/Modelo-Controlador/Tarjeta/borrarTarjeta.php?idTarjeta=<?= $row['idTarjeta'] ?>"
                                    class="borrar">borrar</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>



        </div>
    </div>

</body>

</html>