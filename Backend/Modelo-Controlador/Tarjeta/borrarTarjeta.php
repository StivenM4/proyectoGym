<?php

include("../../Conexion.php"); 

class BorrarTarjeta {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function borrarTarjeta() {

        $idTarjeta = $_GET["idTarjeta"];

        $borrar_tarjeta = "DELETE FROM tarjeta WHERE idTarjeta = '$idTarjeta'";
        $borrar = mysqli_query($this->conexion->link, $borrar_tarjeta);

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

$borrarTarjeta = new BorrarTarjeta();
$borrarTarjeta->borrarTarjeta();
?>
