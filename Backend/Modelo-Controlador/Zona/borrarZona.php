<?php

include("../../Conexion.php"); 

class BorrarZona {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function borrarZona() {

        $idZona = $_GET["idZona"];

        $borrar_zona = "DELETE FROM zona WHERE idZona = '$idZona'";
        $borrar = mysqli_query($this->conexion->link, $borrar_zona);

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

$borrarZona = new BorrarZona();
$borrarZona->borrarZona();
?>
