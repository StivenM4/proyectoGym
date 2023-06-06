<?php

include("../../Conexion.php"); 

class AgregarTarjeta {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function agregarTarjeta() {
        
        $idTarjeta = null;
        $Numero = $_POST['Numero'];
        $FechaExpiracion = $_POST['FechaExpiracion'];
        $Codigo = $_POST['Codigo'];

        $grabar_tarjeta = "INSERT INTO tarjeta VALUES ('$idTarjeta', '$Numero', '$FechaExpiracion', '$Codigo')";
        $guardar_tarjeta = mysqli_query($this->conexion->link, $grabar_tarjeta);

        if ($guardar_tarjeta) {
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

$agregarTarjeta = new AgregarTarjeta();
$agregarTarjeta->agregarTarjeta();
?>
