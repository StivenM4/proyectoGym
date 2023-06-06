<?php
include("../../Conexion.php");

class AgregarGrupo {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function anexarGrupo() {
        $idGrupo = null;
        $Clase_idClase = $_POST['idClaseGrupo'];
        $NombreGrupo = $_POST['NombreGrupo'];
        $Descripcion = $_POST['Descripcion'];
        $Tamanio = $_POST['Tamanio'];

        $grabar_grupo = "INSERT INTO grupo (idGrupo, Clase_idClase, NombreGrupo, Descripcion, Tamanio) VALUES ('$idGrupo', '$Clase_idClase', '$NombreGrupo', '$Descripcion', '$Tamanio')";
        $guardar_grupo = mysqli_query($this->conexion->link, $grabar_grupo);

        if ($guardar_grupo) {
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

$agregarGrupo = new AgregarGrupo();
$agregarGrupo->anexarGrupo();
?>
