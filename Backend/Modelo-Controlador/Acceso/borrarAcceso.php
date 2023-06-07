<?php

include("../../Conexion.php"); 

class BorrarAcceso {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function borrarAcceso() {

        $Zona_idZona = $_GET["Zona_idZona"];
        $Plan_idPlan = $_GET["Plan_idPlan"];

        $borrar_acceso = "DELETE FROM acceso WHERE Zona_idZona = '$Zona_idZona'  AND Plan_idPlan = '$Plan_idPlan'";
        $borrar = mysqli_query($this->conexion->link, $borrar_acceso);

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

$borrarAcceso = new BorrarAcceso();
$borrarAcceso->borrarAcceso();
?>
