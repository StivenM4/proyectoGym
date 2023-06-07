<?php

include("Backend/Consultas.php");




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

$BuscarPlan = "SELECT Plan.idPlan, Plan.NombrePlan
FROM Usuario
JOIN Pago ON Usuario.idUsuario = Pago.Usuario_idUsuario
JOIN Plan ON Pago.Plan_idPlan = Plan.idPlan
WHERE Usuario.idUsuario = $idUsuario";
$GuardarPlan = mysqli_query($conexion->link, $BuscarPlan);

if (mysqli_num_rows($GuardarPlan) > 0) {
    $fila = mysqli_fetch_assoc($GuardarPlan);
    $planID = $fila['idPlan'];
    $nombrePlan = $fila['NombrePlan'];

    $ZonasPlan = "SELECT z.idZona, z.NombreZona, z.Ubicacion
                  FROM acceso a
                  INNER JOIN zona z ON a.Zona_idZona = z.idZona
                  WHERE a.Plan_idPlan = $planID";

    $guardar_Zonas = mysqli_query($conexion->link, $ZonasPlan);

    $ConsultaServicios = "SELECT s.idServicios, s.NombreServicios, s.Descripcion
                      FROM servicios s
                      INNER JOIN serviciosplan sp ON s.idServicios = sp.Servicios_idServicios
                      WHERE sp.Plan_idPlan = $planID";
    $guardarServicio = mysqli_query($conexion->link, $ConsultaServicios);

} else {
    header("Location: formPago.php");
    exit;
}





?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="Frontend/assets/css/pagUsuario.css">
</head>

<body>
<script src="Frontend/assets/js/visibilidadAdmo.js"></script>
<header>
        <div class="navegacion">
            <h2 class="logo">ProFit Gym</h2>
            <div class="caja"><a class="btnSalir" href="Backend/Login/CerrarSesion.php"> Cerrar Sesion</a></div>
        </div>

    </header>
    
    <div class="contenedorInicial">

        <div class="cajaUsuario">
            <div class="caja">
                <h1><?= $row['NombreUsuario'] ?></h2>
                
                <h3><?= $nombrePlan ?></h2>
                <br>
                
            </div> 
            <a href="OpcionesUser.php">Opciones</a>             
            </div>
        </div>

        <div class="contenedorInicial">
        <div>
            <div class="cajaBotones">

                <div class="caja"><button onclick="divVisibility('formActividades')">Actividades</button></div>
                <div class="caja"><button onclick="divVisibility('formClase')">Clase</button></div>
                <div class="caja"><button onclick="divVisibility('formEjercicio')">Ejercicios</button></div>
                <div class="caja"><button onclick="divVisibility('formEntrenador')">Entrenadores</button></div>
                <div class="caja"><button onclick="divVisibility('formGrupo')">Grupo</button></div>
                <div class="caja"><button onclick="divVisibility('formHorario')">Horario</button></div>
                <div class="caja"><button onclick="divVisibility('formImplemento')">Implementos</button></div>        
                <div class="caja"><button onclick="divVisibility('formPlan')">Plan</button></div>
                <div class="caja"><button onclick="divVisibility('formRutina')">Rutina</button></div>
                <div class="caja"><button onclick="divVisibility('formZonas')">Zona</button></div>
                <div class="caja"><button onclick="divVisibility('formServicios')">Servicio</button></div>


            </div>

            <div class="usera">
            <div id="mensaje" class="mensaje">
                <div>
                    <h1>Bienvenido a la pagina <br> del Usuario</h1>
                    <p>Selecciona un boton para ver su info</p>
                </div>

            </div>

        <div id="formActividades" class="contenedor">
            <h2>Actividades</h2>
            <table>

                <tbody>
                    <tr class="InicioTabla">

                        <th>Nombre</th>
                        <th>Descripción</th>

                    </tr>
                    <?php while ($row = mysqli_fetch_array($guardar_Actividades)): ?>
                    <tr>

                        <th>
                            <?= $row['NombreActividad'] ?>
                        </th>
                        <th>
                            <?= $row['Descripcion'] ?>
                        </th>

                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>


        <div  id="formClase"class="contenedor">
            <h2>Clase</h2>
            <table>

                <tbody>
                    <tr class="InicioTabla">

                        <th>Nombre</th>
                        <th>Duración</th>
                        <th>Actividad</th>

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
                            <?= $row['NombreClase'] ?>
                        </th>
                        <th>
                            <?= $row['Duracion'] ?>
                        </th>
                        <th>
                            <?= $nombreActividad ?>

                        </th>

                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div id="formRutina" class="contenedor">
            <h2>Rutina</h2>
            <table>
                <tbody>
                    <tr class="InicioTabla">
                        <th>Entrenador</th>
                        <th>Nombre Rutina</th>
                        <th>Observaciones</th>

                    </tr>
                    <?php while ($row = mysqli_fetch_array($guardar_Rutina)): ?>
                    <tr>
                        <th>
                            <?= $row['Entrenador_DniEntrenador'] ?>
                        </th>
                        <th>
                            <?= $row['NombreRutina'] ?>
                        </th>
                        <th>
                            <?= $row['Observaciones'] ?>
                        </th>

                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>

        <div id="formEjercicio" class="contenedor">
            <h2>Ejercicios</h2>
            <table>

                <tbody>
                    <tr class="InicioTabla">
                        <th>Nombre</th>
                        <th>Descripción</th>

                    </tr>
                    <?php while ($row = mysqli_fetch_array($guardar_Ejercicios)): ?>
                    <tr>

                        <th>
                            <?= $row['NombreEjercicio'] ?>
                        </th>
                        <th>
                            <?= $row['Descripcion'] ?>
                        </th>

                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div id="formEntrenador" class="contenedor">
            <h2>Entrenadores</h2>
            <table>

                <tbody>
                    <tr class="InicioTabla">
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Número de teléfono</th>

                    </tr>
                    <?php while ($row = mysqli_fetch_array($guardar_Entrenador)): ?>
                    <tr>

                        <th>
                            <?= $row['NombreEntrenador'] ?>
                        </th>
                        <th>
                            <?= $row['Edad'] ?>
                        </th>
                        <th>
                            <?= $row['numTelefono'] ?>
                        </th>

                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>

        <div id="formGrupo" class="contenedor">
            <h2>Grupos</h2>
            <table>

                <tbody>
                <tr class="InicioTabla">

                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Tamaño</th>
                    <th>Clase</th>

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

                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div  id="formHorario" class="contenedor">
            <h2>Horarios</h2>
            <table>

                <tbody>
                    <tr class="InicioTabla">

                        <th>Nombre</th>
                        <th>Tiempo</th>
                        <th>Clase</th>

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
                            <?= $row['NombreHorario'] ?>
                        </th>
                        <th>
                            <?= $row['Tiempo'] ?>
                        </th>
                        <th>
                            <?= $nombreClase2 ?>
                        </th>

                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div id="formImplemento" class="contenedor">
            <h2>Implementos</h2>
            <table>


                <tbody>
                    <tr class="InicioTabla">
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Funcionalidad</th>
                        <th>Estado</th>

                    </tr>
                    <?php while ($row = mysqli_fetch_array($guardar_Implementos)): ?>
                    <tr>

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

                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div id="formPlan" class="contenedor">
            <h2>Planes</h2>
            <table>

                <tbody>
                    <tr class="InicioTabla">

                        <th>Nombre</th>
                        <th>Duración</th>
                        <th>Precio</th>

                    </tr>
                    <?php while ($row = mysqli_fetch_array($guardar_Plan)): ?>
                    <tr>

                        <th>
                            <?= $row['NombrePlan'] ?>
                        </th>
                        <th>
                            <?= $row['Duracion'] ?>
                        </th>
                        <th>
                            <?= $row['Precio'] ?>
                        </th>

                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

        </div>

        <div id="formServicios" class="contenedor">
        <h2>Servicios</h2>
        <table>

<tbody>
    <tr class="InicioTabla">

        <th>Nombre</th>
        <th>Descripción</th>
    </tr>
    <?php while ($row = mysqli_fetch_array($guardarServicio)): ?>
    <tr>

        <th>
            <?= $row['NombreServicios'] ?>
        </th>
        <th>
            <?= $row['Descripcion'] ?>
        </th>
        
    </tr>
    <?php endwhile; ?>
</tbody>
</table>

        </div>

        <div id="formZonas" class="contenedor">
            <h2>Zonas</h2>
        <table>

<tbody>
<tr class="InicioTabla">
 
        <th>Nombre</th>
        <th>Ubicación</th>

    </tr>
    <?php while ($row = mysqli_fetch_array($guardar_Zonas)): ?>
        <tr>
            <th><?= $row['NombreZona'] ?></th>
            <th><?= $row['Ubicacion'] ?></th>
            
        </tr>
    <?php endwhile; ?>
</tbody>
</table>
        </div>


    </div>

</body>

</html>