<?php

include("../../Conexion.php"); 

class EditarTarjeta {

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function editarTarjeta() {

        $idTarjeta = $_POST["idTarjeta"];
        $Numero = $_POST['Numero'];
        $FechaExpiracion = $_POST['FechaExpiracion'];
        $Codigo = $_POST['Codigo'];

        $actualizar_tarjeta = "UPDATE tarjeta SET Numero = '$Numero', FechaExpiracion = '$FechaExpiracion', Codigo = '$Codigo' WHERE idTarjeta = '$idTarjeta'";
        $guardar_nueva_tarjeta = mysqli_query($this->conexion->link, $actualizar_tarjeta);

        if ($guardar_nueva_tarjeta) {
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

$editarTarjeta = new EditarTarjeta();
$editarTarjeta->editarTarjeta();
?>
