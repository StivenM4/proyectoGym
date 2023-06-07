<?php

include("../../Conexion.php"); 

class BorrarImplementoZona {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function borrarImplementoZona() {

        $Zona_idZona = $_GET["Zona_idZona"];
        $Implementos_idImplementos = $_GET["Implementos_idImplementos"];

        $borrar_implemento_zona = "DELETE FROM implementoszona WHERE Zona_idZona = '$Zona_idZona' AND Implementos_idImplementos = '$Implementos_idImplementos'";
        $borrar = mysqli_query($this->conexion->link, $borrar_implemento_zona);

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

$borrarImplementoZona = new BorrarImplementoZona();
$borrarImplementoZona->borrarImplementoZona();
?>
