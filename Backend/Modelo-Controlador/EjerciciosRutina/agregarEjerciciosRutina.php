<?php

include("../../Conexion.php"); 

class AgregarEjercicioRutina {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function agregarEjercicioRutina() {
        
        $Rutina_idRutina = $_POST['Rutina_idRutina'];
        $Ejercicios_idEjercicios = $_POST['Ejercicios_idEjercicios'];
        $Series = $_POST['Series'];
        $Repeticiones = $_POST['Repeticiones'];

        $grabar_ejercicio_rutina = "INSERT INTO ejerciciosrutina (Rutina_idRutina, Ejercicios_idEjercicios, Series, Repeticiones) VALUES ('$Rutina_idRutina', '$Ejercicios_idEjercicios', '$Series', '$Repeticiones')";
        $guardar_ejercicio_rutina = mysqli_query($this->conexion->link, $grabar_ejercicio_rutina);

        if ($guardar_ejercicio_rutina) {
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

$agregarEjercicioRutina = new AgregarEjercicioRutina();
$agregarEjercicioRutina->agregarEjercicioRutina();
?>
