<?php
include("../../Conexion.php");

class AgregarClase {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function anexarClase() {
        $idClase = null;
        $Actividades_idActividades = $_POST['idActividadesClase'];
        $NombreClase = $_POST['NombreClase'];
        $Duracion = $_POST['Duracion'];

        $grabar_clase = "INSERT INTO clase (idClase, Actividades_idActividades, NombreClase, Duracion) VALUES ('$idClase', '$Actividades_idActividades', '$NombreClase', '$Duracion')";
        $guardar_clase = mysqli_query($this->conexion->link, $grabar_clase);

        if ($guardar_clase) {
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

$agregarClase = new AgregarClase();
$agregarClase->anexarClase();
?>
