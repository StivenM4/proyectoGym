<?php
include("../../Conexion.php");

class BorrarClase {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function borrarClase() {
        $idClase = $_GET["idClase"];

        $borrar_clase = "DELETE FROM clase WHERE idClase = '$idClase'";
        $borrar = mysqli_query($this->conexion->link, $borrar_clase);

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

$borrarClase = new BorrarClase();
$borrarClase->borrarClase();
?>
