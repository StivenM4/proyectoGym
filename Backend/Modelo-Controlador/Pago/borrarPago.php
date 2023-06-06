<?php
include("../../Conexion.php");

class BorrarPago {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function borrarPago() {
        $idPago = $_GET["idPago"];

        $borrar_pago = "DELETE FROM pago WHERE idPago = '$idPago'";
        $borrar = mysqli_query($this->conexion->link, $borrar_pago);

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

$borrarPago = new BorrarPago();
$borrarPago->borrarPago();
?>
