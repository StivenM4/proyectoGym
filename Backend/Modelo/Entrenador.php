<?php

include("../Conexion.php"); 

Class Entrenador{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarEntrenador($cedulaEntrenador,$nombreEntrenador,$edadEntrenador,$numTelefonoEntrenador,$especializacionEntrenador){

    $grabar_Entrenador="INSERT INTO entrenador(cedulaEntrenador,nombreEntrenador,edadEntrenador,numTelefonoEntrenador,especializacionEntrenador) VALUES('$cedulaEntrenador','$nombreEntrenador','$edadEntrenador','$numTelefonoEntrenador','$especializacionEntrenador')";
    $guardar_Entrenador=mysqli_query($this->conexion->link,$grabar_Entrenador) 
    or die('El registro de datos fallo;: ' . mysqli_connect_error());

    if($guardar_Entrenador){
        echo'
        <script>
        alert("entrenador Registrado");
        window.location = "";
        </script>
        ';
    }
    else{
        echo'
        <script>
        alert("....Error...");
        window.location = "";
        </script>
        ';
    }
    mysqli_close($this->conexion->link);
    
}

function actualizarEntrenador($cedulaEntrenador,$nombreEntrenador,$edadEntrenador,$numTelefonoEntrenador,$especializacionEntrenador){
    $actualizar_Entrenador="UPDATE entrenador SET nombreEntrenador='$nombreEntrenador',edadEntrenador='$edadEntrenador',numTelefonoEntrenador='$numTelefonoEntrenador',especializacionEntrenador='$especializacionEntrenador' WHERE cedulaEntrenador='$cedulaEntrenador'";
    $guardar_New_Entrenador = mysqli_query($this->conexion->link,$actualizar_Entrenador)
    or die('Fallo actualizar datos;: ' . mysqli_connect_error()); 

    if($guardar_New_Entrenador){
        echo'
        <script>
        alert("entrenador Actualizado");
        </script>
        ';
        }

    else{
        echo'
        <script>
        alert("....El entrenador no existe...");
        window.location = "";
        </script>
        ';
    }
    }

    function borrarEntrenador($cedulaEntrenador){
        $Borrar_Entrenador="DELETE FROM entrenador WHERE cedulaCliente='$cedulaEntrenador' ";
        $Borrar=mysqli_query($this->conexion->link,$Borrar_Entrenador)
        or die('Fallo borrar usuario;: ' . mysqli_connect_error()); 

        if($Borrar){
            echo'
            <script>
            alert("entrenador Borrado");
            </script>
            ';
            }
    
        else{
            echo'
            <script>
            alert("....El entrenador no existe...");
            window.location = "";
            </script>
            ';
        }
    }

    function listarentrenador(){
        $consultar_Entrenador="SELECT * FROM entrenador ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Entrenador)
        or die('Fallo borrar usuario;: ' . mysqli_connect_error()); 
    if ($row = mysqli_fetch_array($consulta)) {
        do {

            echo '<p class="Entrenador-info">'.$row["cedulaEntrenador"].'</p>
            <p class="Entrenador-info">'.$row["nombreEntrenador"].'</p>
            <p class="Entrenador-info">'.$row["edadEntrenador"].'</p>
            <p class="Entrenador-info">'.$row["numTelefonoEntrenador"].'</p>
            <p class="Entrenador-info">'.$row["especializacionEntrenador"].'</p>';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}