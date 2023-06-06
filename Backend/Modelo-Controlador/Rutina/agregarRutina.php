<?php

include("../../Conexion.php"); 

class AgregarRutina {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function agregarRutina() {
        
        $idRutina = null;
        $Usuario_idUsuario = $_POST['idUsuarioRutina'];
        $Entrenador_DniEntrenador = $_POST['idEntrenadorRutina'];
        $NombreRutina = $_POST['NombreRutina'];
        $Observaciones = $_POST['Observaciones'];

        $grabar_rutina = "INSERT INTO rutina VALUES ('$idRutina', '$Usuario_idUsuario', '$Entrenador_DniEntrenador', '$NombreRutina', '$Observaciones')";
        $guardar_rutina = mysqli_query($this->conexion->link, $grabar_rutina);

        if ($guardar_rutina) {
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

$agregarRutina = new AgregarRutina();
$agregarRutina->agregarRutina();
?>
