<?php
include("../../Conexion.php");

class EditarPago {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function editarPago() {
        $idPago = $_POST["idPago"];
        $Usuario_idUsuario = $_POST['idUsuarioPago'];
        $Tarjeta_idTarjeta = $_POST['idTarjetaPago'];
        $Plan_idPlan = $_POST['PlanPago'];
        $FechaPago = $_POST['FechaPago'];
        $Total = $_POST['Total'];

        $actualizar_pago = "UPDATE pago SET Usuario_idUsuario = '$Usuario_idUsuario', Tarjeta_idTarjeta = '$Tarjeta_idTarjeta', Plan_idPlan = '$Plan_idPlan', FechaPago = '$FechaPago', Total = '$Total' WHERE idPago = '$idPago'";
        $guardar_nuevo_pago = mysqli_query($this->conexion->link, $actualizar_pago);

        if ($guardar_nuevo_pago) {
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

$editarPago = new EditarPago();
$editarPago->editarPago();
?>
