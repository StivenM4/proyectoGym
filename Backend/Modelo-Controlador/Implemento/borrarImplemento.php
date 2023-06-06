<?php
include("../../Conexion.php");

class BorrarImplemento {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function borrarImplemento() {
        $idImplemento = $_GET["idImplemento"];

        $borrar_implemento = "DELETE FROM implementos WHERE idImplementos = '$idImplemento'";
        $borrar = mysqli_query($this->conexion->link, $borrar_implemento);

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

$borrarImplemento = new BorrarImplemento();
$borrarImplemento->borrarImplemento();
?>
