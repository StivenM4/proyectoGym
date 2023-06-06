<?php

include("../../Conexion.php"); 

class EditarServicios {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function editarServicios() {

        $idServicios = $_POST["idServicios"];
        $NombreServicios = $_POST['NombreServicios'];
        $Descripcion = $_POST['Descripcion'];

        $actualizar_servicio = "UPDATE servicios SET NombreServicios = '$NombreServicios', Descripcion = '$Descripcion' WHERE idServicios = '$idServicios'";
        $guardar_nuevo_servicio = mysqli_query($this->conexion->link, $actualizar_servicio);

        if ($guardar_nuevo_servicio) {
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

$editarServicios = new EditarServicios();
$editarServicios->editarServicios();
?>
