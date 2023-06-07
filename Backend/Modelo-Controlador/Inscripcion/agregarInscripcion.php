<?php

include("../../Conexion.php"); 

class AgregarInscripcion {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function agregarInscripcion() {

        
        $Usuario_idUsuario = $_POST['Usuario_idUsuario'];
        $Grupo_idGrupo = $_POST['Grupo_idGrupo'];
        $FechaInscripcion = $_POST['FechaInscripcion'];

        $grabar_inscripcion = "INSERT INTO inscripcion (Usuario_idUsuario, Grupo_idGrupo, FechaInscripcion) VALUES ('$Usuario_idUsuario', '$Grupo_idGrupo', '$FechaInscripcion')";
        $guardar_inscripcion = mysqli_query($this->conexion->link, $grabar_inscripcion);

        if ($guardar_inscripcion) {
            Header("Location: ../../../pagAdministracion.php");
            exit();
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

$agregarInscripcion = new AgregarInscripcion();
$agregarInscripcion->agregarInscripcion();
?>
