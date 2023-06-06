<?php
include("../../Conexion.php");

class AgregarEjercicio {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function anexarEjercicio() {
        $idEjercicio = null;
        $NombreEjercicio = $_POST['NombreEjercicio'];
        $Descripcion = $_POST['Descripcion'];

        $grabar_ejercicio = "INSERT INTO ejercicios (idEjercicios, NombreEjercicio, Descripcion) VALUES ('$idEjercicio', '$NombreEjercicio', '$Descripcion')";
        $guardar_ejercicio = mysqli_query($this->conexion->link, $grabar_ejercicio);

        if ($guardar_ejercicio) {
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

$agregarEjercicio = new AgregarEjercicio();
$agregarEjercicio->anexarEjercicio();
?>