<?php

include("../../Conexion.php"); 

class AgregarAcceso {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function agregarAcceso() {
        
        $Zona_idZona = $_POST['Zona_idZona'];
        $Plan_idPlan = $_POST['Plan_idPlan'];

        $grabar_acceso = "INSERT INTO acceso VALUES ('$Zona_idZona', '$Plan_idPlan')";
        $guardar_acceso = mysqli_query($this->conexion->link, $grabar_acceso);

        if ($guardar_acceso) {
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

$agregarAcceso = new AgregarAcceso();
$agregarAcceso->agregarAcceso();
?>
