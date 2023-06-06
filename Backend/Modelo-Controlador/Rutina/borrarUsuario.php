<?php

include("../../Conexion.php"); 

class borrarUsuario{

private $conexion;

function __construct() {  
    $this->conexion = new Conexion();
}

    function borrarUsuario(){

        $idUsuario=$_GET["idUsuario"];

        $Borrar_Usuario="DELETE FROM usuario WHERE idUsuario='$idUsuario'";
        $Borrar = mysqli_query($this->conexion->link,$Borrar_Usuario);

        if($Borrar){
                
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
$borrarUsuario = new borrarUsuario();

$borrarUsuario -> borrarUsuario();

?>