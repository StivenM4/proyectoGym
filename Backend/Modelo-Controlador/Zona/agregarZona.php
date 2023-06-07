<?php

include("../../Conexion.php");

class AgregarZona {

    private $conexion;

    function __construct()
    {
        $this->conexion = new Conexion();
    }

    function agregarZona()
    {   
        $idZona=null;
        $nombre = $_POST['Nombre'];
        $ubicacion = $_POST['Ubicacion'];

        $insertar_zona = "INSERT INTO zona (idZona,Nombre, Ubicacion) VALUES ('$idZona','$nombre', '$ubicacion')";
        $resultado = mysqli_query($this->conexion->link, $insertar_zona);

        if ($resultado) {
            header("Location: ../../../pagAdministracion.php");
        } else {
            echo '
            <script>
            alert("Error al agregar la zona");
            window.location = "../../../pagAdministracion.php";
            </script>
            ';
        }
        mysqli_close($this->conexion->link);
    }
}

$agregarZona = new AgregarZona();
$agregarZona->agregarZona();
?>
