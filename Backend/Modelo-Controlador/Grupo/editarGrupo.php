<?php
include("../../Conexion.php");

class EditarGrupo {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function editarGrupo() {
        $idGrupo = $_POST["idGrupo"];
        $Clase_idClase = $_POST['idClaseGrupo'];
        $NombreGrupo = $_POST['NombreGrupo'];
        $Descripcion = $_POST['Descripcion'];
        $Tamanio = $_POST['Tamanio'];

        $actualizar_grupo = "UPDATE grupo SET Clase_idClase = '$Clase_idClase', NombreGrupo = '$NombreGrupo', Descripcion = '$Descripcion', Tamanio = '$Tamanio' WHERE idGrupo = '$idGrupo'";
        $guardar_nuevo_grupo = mysqli_query($this->conexion->link, $actualizar_grupo);

        if ($guardar_nuevo_grupo) {
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

$editarGrupo = new EditarGrupo();
$editarGrupo->editarGrupo();
?>



