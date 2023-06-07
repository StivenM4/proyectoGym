<?php

include("../../Conexion.php"); 

class EditarAcceso {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function editarAcceso() {

        $Zona_idZona = $_POST["Zona_idZona"];
        $Plan_idPlan = $_POST["Plan_idPlan"];

        $actualizar_acceso = "UPDATE acceso SET Plan_idPlan = '$Plan_idPlan', Zona_idZona = '$Zona_idZona' WHERE Zona_idZona = '$Zona_idZona' AND Plan_idPlan = '$Plan_idPlan'";
        $guardar_nuevo_acceso = mysqli_query($this->conexion->link, $actualizar_acceso);

        if ($guardar_nuevo_acceso) {
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

$editarAcceso = new EditarAcceso();
$editarAcceso->editarAcceso();
?>

