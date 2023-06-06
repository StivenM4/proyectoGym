<?php

include("../../Conexion.php"); 

class BorrarRutina {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function borrarRutina() {

        $idRutina = $_GET["idRutina"];

        $borrar_rutina = "DELETE FROM rutina WHERE idRutina = '$idRutina'";
        $borrar = mysqli_query($this->conexion->link, $borrar_rutina);

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

$borrarRutina = new BorrarRutina();
$borrarRutina->borrarRutina();
?>
