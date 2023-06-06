<?php
include("../../Conexion.php");

class AgregarHorario {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function anexarHorario() {
        $idHorario = null;
        $Clase_idClase = $_POST['idClaseHorario'];
        $NombreHorario = $_POST['NombreHorario'];
        $Tiempo = $_POST['Tiempo'];

        $grabar_horario = "INSERT INTO horario (idHorario, Clase_idClase, NombreHorario, Tiempo) VALUES ('$idHorario', '$Clase_idClase', '$NombreHorario', '$Tiempo')";
        $guardar_horario = mysqli_query($this->conexion->link, $grabar_horario);

        if ($guardar_horario) {
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

$agregarHorario = new AgregarHorario();
$agregarHorario->anexarHorario();
?>
