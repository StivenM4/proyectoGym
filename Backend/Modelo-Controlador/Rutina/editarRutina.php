<?php

include("../../Conexion.php"); 

class EditarRutina {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function editarRutina() {

        $idRutina = $_POST["idRutina"];
        $Usuario_idUsuario = $_POST['idUsuarioRutina'];
        $Entrenador_DniEntrenador = $_POST['idEntrenadorRutina'];
        $NombreRutina = $_POST['NombreRutina'];
        $Observaciones = $_POST['Observaciones'];

        $actualizar_rutina = "UPDATE rutina SET Usuario_idUsuario = '$Usuario_idUsuario', Entrenador_DniEntrenador = '$Entrenador_DniEntrenador', NombreRutina = '$NombreRutina', Observaciones = '$Observaciones' WHERE idRutina = '$idRutina'";
        $guardar_nueva_rutina = mysqli_query($this->conexion->link, $actualizar_rutina);

        if ($guardar_nueva_rutina) {
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

$editarRutina = new EditarRutina();
$editarRutina->editarRutina();
?>
