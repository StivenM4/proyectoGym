<?php
include("../../Conexion.php");

class BorrarEntrenador {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function borrarEntrenador() {
        $DniEntrenador = $_GET["DniEntrenador"];

        $borrar_entrenador = "DELETE FROM entrenador WHERE DniEntrenador = '$DniEntrenador'";
        $borrar = mysqli_query($this->conexion->link, $borrar_entrenador);

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

$borrarEntrenador = new BorrarEntrenador();
$borrarEntrenador->borrarEntrenador();
?>
