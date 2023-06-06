<?php
include("../../Conexion.php");

class BorrarGrupo {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function borrarGrupo() {
        $idGrupo = $_GET["idGrupo"];

        $borrar_grupo = "DELETE FROM grupo WHERE idGrupo = '$idGrupo'";
        $borrar = mysqli_query($this->conexion->link, $borrar_grupo);

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

$borrarGrupo = new BorrarGrupo();
$borrarGrupo->borrarGrupo();
?>
