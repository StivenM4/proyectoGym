<?php

include("../../Conexion.php"); 

class BorrarInscripcion {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function borrarInscripcion() {

        $Usuario_idUsuario = $_GET['Usuario_idUsuario'];
        $Grupo_idGrupo = $_GET['Grupo_idGrupo'];

        $borrar_inscripcion = "DELETE FROM inscripcion WHERE Usuario_idUsuario = '$Usuario_idUsuario' AND Grupo_idGrupo = '$Grupo_idGrupo'";
        $borrar = mysqli_query($this->conexion->link, $borrar_inscripcion);

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

$borrarInscripcion = new BorrarInscripcion();
$borrarInscripcion->borrarInscripcion();
?>
