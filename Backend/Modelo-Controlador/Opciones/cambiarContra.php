<?php
include("../../Conexion.php");

class cambiarContra {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function cambiarContra() {

        $ContraAntigua = md5($_POST['contrasenaAntigua']);
        $ContraNueva = md5($_POST['contrasenaNueva']);
        
        $actualizar_ContraUser = "UPDATE usuario SET contrasena = '$ContraNueva' WHERE contrasena = '$ContraAntigua'";
        $guardar_nuevo_ContraUser = mysqli_query($this->conexion->link, $actualizar_ContraUser);
        
        if ($guardar_nuevo_ContraUser) {
            Header("Location: ../../../pagUsuarios.php");
        } else {
            echo '
            <script>
            alert("contraseña antigua no coincide");
            window.location = "../../../pagUsuarios.php";
            </script>
            ';
        }
        mysqli_close($this->conexion->link);
    }
}

$cambiarContra = new cambiarContra();
$cambiarContra->cambiarContra();
?>