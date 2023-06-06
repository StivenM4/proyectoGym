<?php

include("../../Conexion.php"); 

class editarActividad {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function editarActividad() {

        $idActividad = $_POST["idActividad"];
        $NombreActividad = $_POST['NombreActividad'];
        $Descripcion = $_POST['Descripcion'];

        $actualizar_Actividad = "UPDATE actividades SET NombreActividad = '$NombreActividad', Descripcion = '$Descripcion' WHERE idActividades = '$idActividad'";
        $guardar_New_Actividad = mysqli_query($this->conexion->link, $actualizar_Actividad);

        if ($guardar_New_Actividad) {
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

$editarActividad = new editarActividad();
$editarActividad->editarActividad();
?>