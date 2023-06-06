<?php
include("../../Conexion.php");

class AgregarImplemento {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function anexarImplemento() {
        $idImplemento = null;
        $NombreImplemento = $_POST['NombreImplemento'];
        $Tipo = $_POST['Tipo'];
        $Funcionalidad = $_POST['Funcionalidad'];
        $Estado = $_POST['Estado'];

        $grabar_implemento = "INSERT INTO implementos (idImplementos, NombreImplemento, Tipo, Funcionalidad, Estado) VALUES ('$idImplemento', '$NombreImplemento', '$Tipo', '$Funcionalidad', '$Estado')";
        $guardar_implemento = mysqli_query($this->conexion->link, $grabar_implemento);

        if ($guardar_implemento) {
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

$agregarImplemento = new AgregarImplemento();
$agregarImplemento->anexarImplemento();
?>
