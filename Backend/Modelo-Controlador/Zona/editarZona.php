<?php

include("../../Conexion.php"); 

class EditarZona {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function editarZona() {

        $idZona = $_POST["idZona"];
        $Nombre = $_POST['Nombre'];
        $Ubicacion = $_POST['Ubicacion'];

        $actualizar_zona = "UPDATE zona SET Nombre = '$Nombre', Ubicacion = '$Ubicacion' WHERE idZona = '$idZona'";
        $guardar_nueva_zona = mysqli_query($this->conexion->link, $actualizar_zona);

        if ($guardar_nueva_zona) {
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

$editarZona = new EditarZona();
$editarZona->editarZona();
?>
