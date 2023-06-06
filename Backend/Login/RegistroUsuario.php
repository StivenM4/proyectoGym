<?php

include("../Conexion.php");

class RegistroUsuario{

private $conexion;

function __construct() {  
    $this->conexion = new Conexion();
}


function agregarUsuario(){
    $nombre = $_POST['nombreR'];
    $usuario = $_POST['usuarioR'];
    $email = $_POST['emailR'];
    $contrasena =md5($_POST['contrasR']);
   

        $grabar_usuario="INSERT INTO usuario VALUES('$nombre','$usuario','$email','$contrasena')";
        $guardar_usuario=mysqli_query($this->conexion->link,$grabar_usuario);

        if($guardar_usuario){

            echo'
            <script>
            alert("Usuario Registrado");
            window.location = "../../login.php";
            </script>
            ';

            
        }
        else{
            echo'
            <script>
            alert("....Error...");
            window.location = "../../login.php";
            </script>
            ';
        }
        mysqli_close($this->conexion->link);
        
    }
}
   
$Registro = new RegistroUsuario();

$Registro -> agregarUsuario();
?>