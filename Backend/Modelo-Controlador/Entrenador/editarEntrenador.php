<?php
include("../../Conexion.php");

class EditarEntrenador {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function editarEntrenador() {
        $DniEntrenador = $_POST["DniEntrenador"];
        $NombreEntrenador = $_POST['NombreEntrenador'];
        $Edad = $_POST['Edad'];
        $numTelefono = $_POST['numTelefono'];

        $actualizar_entrenador = "UPDATE entrenador SET NombreEntrenador = '$NombreEntrenador', Edad = '$Edad', numTelefono = '$numTelefono' WHERE DniEntrenador = '$DniEntrenador'";
        $guardar_nuevo_entrenador = mysqli_query($this->conexion->link, $actualizar_entrenador);

        if ($guardar_nuevo_entrenador) {
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

$editarEntrenador = new EditarEntrenador();
$editarEntrenador->editarEntrenador();
?>
