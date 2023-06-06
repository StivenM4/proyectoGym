<?php

include("../../Conexion.php"); 

class AgregarPlan {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function agregarPlan() {
        
        $idPlan = null;
        $NombrePlan = $_POST['NombrePlan'];
        $Duracion = $_POST['Duracion'];
        $Precio = $_POST['Precio'];

        $grabar_plan = "INSERT INTO plan VALUES ('$idPlan', '$NombrePlan', '$Duracion', '$Precio')";
        $guardar_plan = mysqli_query($this->conexion->link, $grabar_plan);

        if ($guardar_plan) {
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

$agregarPlan = new AgregarPlan();
$agregarPlan->agregarPlan();
?>
