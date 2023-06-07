<?php

include("../Conexion.php");

class LogeoUsuario{

private $conexion;

function __construct() {  
    $this->conexion = new Conexion();
}

function Logear(){

    $email=$_POST['correoL'];
    $contrasena =md5($_POST['contraL']);

    $Buscar_Usuario ="SELECT * FROM usuario WHERE correo='$email' AND Contrasena='$contrasena'";
    $Verificar_Usuario = mysqli_query($this->conexion->link,$Buscar_Usuario);
    
    $Buscar_Administrador ="SELECT * FROM administradores WHERE correoAdmo='$email' AND contraAdmo='$contrasena'";
    $verificar_Administrador = mysqli_query($this->conexion->link,$Buscar_Administrador);
    
    if(mysqli_num_rows($Verificar_Usuario)==1){
        session_start();
        $_SESSION['Usuario']= $email;
        header("location: ../../pagUsuarios.php");
        exit;
    }else if(mysqli_num_rows($verificar_Administrador)==1){
        session_start();
        $_SESSION['Administrador']= $email;
        header("location: ../../pagAdministracion.php");
        exit;
    }
    else{
        echo'
        <script>
        alert("Correo o Contraseña Incorrecto");
        window.location = "../../login.php";
        </script>
        ';
        exit;
    }
    }
 
}

$Logeo = new LogeoUsuario();
$Logeo -> Logear();
?>