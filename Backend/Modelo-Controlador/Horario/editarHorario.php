<?php
include("../../Conexion.php");

class EditarHorario {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function editarHorario() {
        $idHorario = $_POST["idHorario"];
        $Clase_idClase = $_POST['idClaseHorario'];
        $NombreHorario = $_POST['NombreHorario'];
        $Tiempo = $_POST['Tiempo'];

        $actualizar_horario = "UPDATE horario SET Clase_idClase = '$Clase_idClase', NombreHorario = '$NombreHorario', Tiempo = '$Tiempo' WHERE idHorario = '$idHorario'";
        $guardar_nuevo_horario = mysqli_query($this->conexion->link, $actualizar_horario);

        if ($guardar_nuevo_horario) {
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

$editarHorario = new EditarHorario();
$editarHorario->editarHorario();
?>
