<?php

include("../../Conexion.php"); 

class EditarImplementoZona {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function editarImplementoZona() {

        $Zona_idZona = $_POST["Zona_idZona"];
        $Implementos_idImplementos = $_POST['Implementos_idImplementos'];

        $actualizar_implemento_zona = "UPDATE implementoszona SET  Zona_idZona = '$Zona_idZona' , Implementos_idImplementos = '$Implementos_idImplementos' WHERE Zona_idZona = '$Zona_idZona' AND Implementos_idImplementos = '$Implementos_idImplementos";
        $guardar_nuevo_implemento_zona = mysqli_query($this->conexion->link, $actualizar_implemento_zona);

        if ($guardar_nuevo_implemento_zona) {
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

$editarImplementoZona = new EditarImplementoZona();
$editarImplementoZona->editarImplementoZona();
?>
