<?php

include("../../Conexion.php"); 

class EditarEjercicioRutina {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function editarEjercicioRutina() {

        $Rutina_idRutina = $_POST['Rutina_idRutina'];
        $Ejercicios_idEjercicios = $_POST['Ejercicios_idEjercicios'];
        $Series = $_POST['Series'];
        $Repeticiones = $_POST['Repeticiones'];

        $editar_ejercicio_rutina = "UPDATE ejerciciosrutina SET Rutina_idRutina='$Rutina_idRutina',Ejercicios_idEjercicios='$Ejercicios_idEjercicios', Series = '$Series', Repeticiones = '$Repeticiones' WHERE Rutina_idRutina = '$Rutina_idRutina' AND Ejercicios_idEjercicios = '$Ejercicios_idEjercicios'";
        $editar = mysqli_query($this->conexion->link, $editar_ejercicio_rutina);

        if ($editar) {
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

$editarEjercicioRutina = new EditarEjercicioRutina();
$editarEjercicioRutina->editarEjercicioRutina();
?>
