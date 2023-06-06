<?php

include("../../Conexion.php"); 

class agregarActividad {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function anexarActividad() {
        
        $idActividad = null;
        $NombreActividad = $_POST['NombreActividad'];
        $Descripcion = $_POST['Descripcion'];

        $grabar_actividad = "INSERT INTO actividades VALUES ('$idActividad', '$NombreActividad', '$Descripcion')";
        $guardar_actividad = mysqli_query($this->conexion->link, $grabar_actividad);

        if ($guardar_actividad) {
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

$agregarActividad = new agregarActividad();
$agregarActividad->anexarActividad();
?>