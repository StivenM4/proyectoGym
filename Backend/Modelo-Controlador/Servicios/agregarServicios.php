<?php

include("../../Conexion.php"); 

class AgregarServicios {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function agregarServicios() {
        
        $idServicio = null;
        $NombreServicios = $_POST['NombreServicios'];
        $Descripcion = $_POST['Descripcion'];

        $grabar_servicio = "INSERT INTO servicios VALUES ('$idServicio', '$NombreServicios', '$Descripcion')";
        $guardar_servicio = mysqli_query($this->conexion->link, $grabar_servicio);

        if ($guardar_servicio) {
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

$agregarServicios = new AgregarServicios();
$agregarServicios->agregarServicios();
?>
