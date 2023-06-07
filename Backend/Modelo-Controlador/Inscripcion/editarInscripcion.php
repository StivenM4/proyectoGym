<?php

include("../../Conexion.php"); 

class EditarInscripcion {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function editarInscripcion() {

        $Usuario_idUsuario = $_POST['Usuario_idUsuario'];
        $Grupo_idGrupo = $_POST['Grupo_idGrupo'];
        $FechaInscripcion = $_POST['FechaInscripcion'];

        $editar_inscripcion = "UPDATE inscripcion SET Usuario_idUsuario = '$Usuario_idUsuario', Grupo_idGrupo = '$Grupo_idGrupo', FechaInscripcion = '$FechaInscripcion' WHERE Usuario_idUsuario = '$Usuario_idUsuario' AND Grupo_idGrupo = '$Grupo_idGrupo'";
        $editar = mysqli_query($this->conexion->link, $editar_inscripcion);

        if ($editar) {
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

$editarInscripcion = new EditarInscripcion();
$editarInscripcion->editarInscripcion();
?>
