<?php

include("../../Conexion.php"); 

class EditarPlan {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function editarPlan() {

        $idPlan = $_POST["idPlan"];
        $NombrePlan = $_POST['NombrePlan'];
        $Duracion = $_POST['Duracion'];
        $Precio = $_POST['Precio'];

        $actualizar_plan = "UPDATE plan SET NombrePlan = '$NombrePlan', Duracion = '$Duracion', Precio = '$Precio' WHERE idPlan = '$idPlan'";
        $guardar_nuevo_plan = mysqli_query($this->conexion->link, $actualizar_plan);

        if ($guardar_nuevo_plan) {
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

$editarPlan = new EditarPlan();
$editarPlan->editarPlan();
?>
