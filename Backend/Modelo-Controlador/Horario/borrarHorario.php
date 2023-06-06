<?php
include("../../Conexion.php");

class BorrarHorario {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function borrarHorario() {
        $idHorario = $_GET["idHorario"];

        $borrar_horario = "DELETE FROM horario WHERE idHorario = '$idHorario'";
        $borrar = mysqli_query($this->conexion->link, $borrar_horario);

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

$borrarHorario = new BorrarHorario();
$borrarHorario->borrarHorario();
?>
