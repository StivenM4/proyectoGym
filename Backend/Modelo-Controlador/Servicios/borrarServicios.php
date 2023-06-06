<?php

include("../../Conexion.php"); 

class BorrarServicios {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function borrarServicios() {

        $idServicios = $_GET["idServicios"];

        $borrar_servicio = "DELETE FROM servicios WHERE idServicios = '$idServicio'";
        $borrar = mysqli_query($this->conexion->link, $borrar_servicio);

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

$borrarServicios = new BorrarServicios();
$borrarServicios->borrarServicios();
?>
