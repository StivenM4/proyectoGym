<?php

include("../../Conexion.php"); 

class editarUsuario{

private $conexion;

function __construct() {  
    $this->conexion = new Conexion();
}

    function editarUsuario(){

        $idUsuario=$_POST["idUsuario"];
        $NombreUsuario = $_POST['NombreUsuario'];
        $Correo = $_POST['Correo'];
        $Contrasena =md5($_POST['Contrasena']);


        $actualizar_Usuario="UPDATE usuario SET NombreUsuario='$NombreUsuario', Correo='$Correo', Contrasena='$Contrasena' WHERE idUsuario='$idUsuario'";
        $guardar_New_Usuario = mysqli_query($this->conexion->link, $actualizar_Usuario);

        if($guardar_New_Usuario){
            
            Header("Location: ../../../pagAdministracion.php");            
        }
        else{
            echo'
            <script>
            alert("....Error...");
            window.location = "../../../pagAdministracion.php";
            </script>
            ';
        }
        mysqli_close($this->conexion->link);
}
}
$editarUsuario = new editarUsuario();

$editarUsuario -> editarUsuario();
?>