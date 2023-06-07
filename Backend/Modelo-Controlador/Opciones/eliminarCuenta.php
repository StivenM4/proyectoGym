<?php
include("../../Conexion.php");

class eliminarCuenta {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function eliminarCuenta() {
        session_start();
if(!isset($_SESSION['Usuario'])){
    echo '
    <script>
        alert("Inicie sesión para continuar");
    </script>
    ';
    header("location: login.");
    session_destroy();
    die();
}

    $email = $_SESSION['Usuario'];
    $BuscarUsuario = "SELECT idUsuario, NombreUsuario FROM Usuario WHERE Correo = '$email'";
    $GuardarUsuario = mysqli_query($this->conexion->link, $BuscarUsuario);
    $row = mysqli_fetch_assoc($GuardarUsuario);
    $idUsuario = $row['idUsuario'];


    $eliminarUsuario = "DELETE FROM Usuario WHERE idUsuario = $idUsuario";
    $verificarEliminacion=mysqli_query($this->conexion->link, $eliminarUsuario);

    if($verificarEliminacion){
        echo '
        <script>
        alert("..SuCuentaFueEliminada..");
        </script>
        ';
        session_start();
        header("location: ../../../index.login");
        session_destroy();
        die();
    exit();
    }else{
        echo '
        <script>
        alert("....Error...");
        window.location = "../../../pagOpcionesUser.php";
        </script>
        ';
    }
}
}
$eliminarCuenta = new eliminarCuenta();
$eliminarCuenta->eliminarCuenta();
?>





