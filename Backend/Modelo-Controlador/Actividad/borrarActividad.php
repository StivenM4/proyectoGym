<?php

include("../../Conexion.php"); 

class borrarActividad {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function borrarActividad() {

        $idActividad = $_GET["idActividad"];

        $Borrar_Actividad = "DELETE FROM actividades WHERE idActividades = '$idActividad'";
        $Borrar = mysqli_query($this->conexion->link, $Borrar_Actividad);

        if ($Borrar) {
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

$borrarActividad = new borrarActividad();
$borrarActividad->borrarActividad();
?>