<?php
include("../../Conexion.php");

class BorrarEjercicio {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function borrarEjercicio() {
        $idEjercicio = $_GET["idEjercicio"];

        $borrar_ejercicio = "DELETE FROM ejercicios WHERE idEjercicios = '$idEjercicio'";
        $borrar = mysqli_query($this->conexion->link, $borrar_ejercicio);

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

$borrarEjercicio = new BorrarEjercicio();
$borrarEjercicio->borrarEjercicio();
?>
