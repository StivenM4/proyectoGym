<?php
include("../../Conexion.php");

class EditarEjercicio {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function editarEjercicio() {
        $idEjercicio = $_POST["idEjercicio"];
        $NombreEjercicio = $_POST['NombreEjercicio'];
        $Descripcion = $_POST['Descripcion'];

        $actualizar_ejercicio = "UPDATE ejercicios SET NombreEjercicio = '$NombreEjercicio', Descripcion = '$Descripcion' WHERE idEjercicios = '$idEjercicio'";
        $guardar_nuevo_ejercicio = mysqli_query($this->conexion->link, $actualizar_ejercicio);

        if ($guardar_nuevo_ejercicio) {
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

$editarEjercicio = new EditarEjercicio();
$editarEjercicio->editarEjercicio();
?>
