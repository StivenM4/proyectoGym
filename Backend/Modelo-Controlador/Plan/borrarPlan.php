<?php

include("../../Conexion.php"); 

class BorrarPlan {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function borrarPlan() {

        $idPlan = $_GET["idPlan"];

        $borrar_plan = "DELETE FROM plan WHERE idPlan = '$idPlan'";
        $borrar = mysqli_query($this->conexion->link, $borrar_plan);

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

$borrarPlan = new BorrarPlan();
$borrarPlan->borrarPlan();
?>
