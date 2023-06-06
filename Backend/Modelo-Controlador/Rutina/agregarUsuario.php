<?php

include("../../Conexion.php"); 

class agregarUsuario{

private $conexion;

function __construct() {  
    $this->conexion = new Conexion();
}

    function anexarUsuario(){
        
        $idUsuario = null;
        $NombreUsuario = $_POST['NombreUsuario'];
        $Correo = $_POST['Correo'];
        $Contrasena =md5( $_POST['Contrasena']);

        $grabar_usuario="INSERT INTO usuario VALUES('$idUsuario','$NombreUsuario','$Correo','$Contrasena')";
        $guardar_usuario=mysqli_query($this->conexion->link,$grabar_usuario);


        if($guardar_usuario){
           
            Header("Location: ../../../pagAdmo.php");
                
        }
        else{
            echo'
            <script>
            alert("....Error...");
            window.location = "../../../pagAdmo.php";
            </script>
            ';
        }
        mysqli_close($this->conexion->link);
        
    }
}
$agregarUsuario = new agregarUsuario();

$agregarUsuario -> anexarUsuario();
?>