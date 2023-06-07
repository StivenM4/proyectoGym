<?php

include("../../Conexion.php"); 

class BorrarEjercicioRutina {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function borrarEjercicioRutina() {

        $Rutina_idRutina = $_GET["Rutina_idRutina"];
        $Ejercicios_idEjercicios = $_GET["Ejercicios_idEjercicios"];

        $borrar_ejercicio_rutina = "DELETE FROM ejerciciosrutina WHERE Rutina_idRutina = '$Rutina_idRutina' AND Ejercicios_idEjercicios = '$Ejercicios_idEjercicios'";
        $borrar = mysqli_query($this->conexion->link, $borrar_ejercicio_rutina);

        if ($borrar) {
            Header("Location: ../../../pagAdministracion.php");
        } else {
            echo '
            <script>
            alert("....Error...");
            window.location = "../../../pagAdministracion.php";
            </script>
            ';
        }
        mysqli_close($this->conexion->link);
    }
}

$borrarEjercicioRutina = new BorrarEjercicioRutina();
$borrarEjercicioRutina->borrarEjercicioRutina();
?>
