<?php
include("../../Conexion.php");

class EditarImplemento {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function editarImplemento() {
        $idImplemento = $_POST["idImplemento"];
        $NombreImplemento = $_POST['NombreImplemento'];
        $Tipo = $_POST['Tipo'];
        $Funcionalidad = $_POST['Funcionalidad'];
        $Estado = $_POST['Estado'];

        $actualizar_implemento = "UPDATE implementos SET NombreImplemento = '$NombreImplemento', Tipo = '$Tipo', Funcionalidad = '$Funcionalidad', Estado = '$Estado' WHERE idImplementos = '$idImplemento'";
        $guardar_nuevo_implemento = mysqli_query($this->conexion->link, $actualizar_implemento);

        if ($guardar_nuevo_implemento) {
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

$editarImplemento = new EditarImplemento();
$editarImplemento->editarImplemento();
?>
