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

$verZona= "SELECT * FROM zona";
$guardar_Zona=mysqli_query($conexion->link,$verZona);

$verServicio= "SELECT * FROM servicios";
$guardar_Servicio=mysqli_query($conexion->link,$verServicio);

$verTarjeta= "SELECT * FROM tarjeta";
$guardar_Tarjeta=mysqli_query($conexion->link,$verTarjeta);

$verAcceso= "SELECT * FROM acceso";
$guardar_Acceso=mysqli_query($conexion->link,$verAcceso);

$verImplementosZona= "SELECT * FROM implementosZona";
$guardar_ImplementosZona=mysqli_query($conexion->link,$verImplementosZona);

$verEjerciciosRutina= "SELECT * FROM ejerciciosRutina";
$guardar_EjerciciosRutina=mysqli_query($conexion->link,$verEjerciciosRutina);

$verIncripcion= "SELECT * FROM inscripcion";
$guardar_Incripcion=mysqli_query($conexion->link,$verIncripcion);
?>