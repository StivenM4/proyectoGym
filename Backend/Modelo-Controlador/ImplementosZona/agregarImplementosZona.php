<?php

include("../../Conexion.php"); 

class AgregarImplementoZona {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function agregarImplementoZona() {
        
        $Zona_idZona = $_POST['Zona_idZona'];
        $Implementos_idImplementos = $_POST['Implementos_idImplementos'];

        $grabar_implemento_zona = "INSERT INTO implementoszona (Zona_idZona, Implementos_idImplementos) VALUES ('$Zona_idZona', '$Implementos_idImplementos')";
        $guardar_implemento_zona = mysqli_query($this->conexion->link, $grabar_implemento_zona);

        if ($guardar_implemento_zona) {
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

$agregarImplementoZona = new AgregarImplementoZona();
$agregarImplementoZona->agregarImplementoZona();
?>
