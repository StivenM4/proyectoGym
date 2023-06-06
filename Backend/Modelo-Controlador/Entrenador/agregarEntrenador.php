<?php
include("../../Conexion.php");

class AgregarEntrenador {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function anexarEntrenador() {
        $DniEntrenador = $_POST['DniEntrenador'];
        $NombreEntrenador = $_POST['NombreEntrenador'];
        $Edad = $_POST['Edad'];
        $numTelefono = $_POST['numTelefono'];

        $grabar_entrenador = "INSERT INTO entrenador (DniEntrenador, NombreEntrenador, Edad, numTelefono) VALUES ('$DniEntrenador', '$NombreEntrenador', '$Edad', '$numTelefono')";
        $guardar_entrenador = mysqli_query($this->conexion->link, $grabar_entrenador);

        if ($guardar_entrenador) {
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

$agregarEntrenador = new AgregarEntrenador();
$agregarEntrenador->anexarEntrenador();
?>
