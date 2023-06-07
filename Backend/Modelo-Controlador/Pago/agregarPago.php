<?php
include("../../Conexion.php");

class AgregarPago {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function anexarPago() {
        $idPago = null;
        $Usuario_idUsuario = $_POST['idUsuarioPago'];
        $Tarjeta_idTarjeta = $_POST['idTarjetaPago'];
        $Plan_idPlan = $_POST['PlanPago'];


        $grabar_pago = "INSERT INTO pago (idPago, Usuario_idUsuario, Tarjeta_idTarjeta, Plan_idPlan, FechaPago, Total) VALUES ('$idPago', '$Usuario_idUsuario', '$Tarjeta_idTarjeta', '$Plan_idPlan', CURDATE(), '$Total')";
        $guardar_pago = mysqli_query($this->conexion->link, $grabar_pago);

        if ($guardar_pago) {
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

$agregarPago = new AgregarPago();
$agregarPago->anexarPago();
?>
