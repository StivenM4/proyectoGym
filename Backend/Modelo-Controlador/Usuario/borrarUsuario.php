<?php
include("../../Conexion.php");

class BorrarUsuario {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function borrarUsuario() {
        $idUsuario = $_GET["idUsuario"];

        $borrar_Usuario= "DELETE FROM usuario WHERE idUsuario = '$idUsuario'";
        $Usuario = mysqli_query($this->conexion->link, $borrar_Usuario);

        if ($Usuario) {
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

$borrarUsuario = new BorrarUsuario();
$borrarUsuario->borrarUsuario();
?>
