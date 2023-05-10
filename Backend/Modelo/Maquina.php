<?php

include("../Conexion.php"); 

Class Maquina{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarMaquina($idMaquina,$nombreMaquina,$funcionalidadMaquina,$estadoMaquina){

    $grabar_Maquina="INSERT INTO maquina(idMaquina,nombreMaquina,funcionalidadMaquina,estadoMaquina) VALUES('$idMaquina','$nombreMaquina','$funcionalidadMaquina','$estadoMaquina')";
    $guardar_Maquina=mysqli_query($this->conexion->link,$grabar_Maquina) 
    or die('' . mysqli_connect_error());

    if($guardar_Maquina){
        echo'
        <script>
        alert("Maquina Registrado");
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

function actualizarMaquina($idMaquina,$nombreMaquina,$funcionalidadMaquina,$estadoMaquina,$valor4,$valor5,$valor6){
    $actualizar_Maquina="UPDATE maquina SET nombreMaquina='$nombreMaquina',funcionalidadMaquina='$funcionalidadMaquina',estadoMaquina='$estadoMaquina',valor4='$valor4',valor5='$valor5',valor6='$valor6' WHERE idMaquina='$idMaquina'";
    $guardar_New_Maquina = mysqli_query($this->conexion->link,$actualizar_Maquina)
    or die('' . mysqli_connect_error()); 

    if($guardar_New_Maquina){
        echo'
        <script>
        alert("Maquina Actualizado");
        window.location = "";
        </script>
        ';
        }

    else{
        echo'
        <script>
        alert("....la Maquina no existe...");
        window.location = "";
        </script>
        ';
    }
    }

    function borrarMaquina($idMaquina){
        $Borrar_Maquina="DELETE FROM maquina WHERE cedulaCliente='$idMaquina' ";
        $Borrar=mysqli_query($this->conexion->link,$Borrar_Maquina)
        or die('' . mysqli_connect_error()); 

        if($Borrar){
            echo'
            <script>
            alert("Maquina Borrado");
            window.location = "";
            </script>
            ';
            }
    
        else{
            echo'
            <script>
            alert("....la Maquina no existe...");
            window.location = "";
            </script>
            ';
        }
    }

    function listarMaquina(){
        $consultar_Maquina="SELECT * FROM maquina ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Maquina)
        or die('' . mysqli_connect_error()); 
    if ($row = mysqli_fetch_array($consulta)) {
        do {

            echo '<p class="Maquina-info">'.$row["idMaquina"].'</p>
            <p class="Maquina-info">'.$row["nombreMaquina"].'</p>
            <p class="Maquina-info">'.$row["funcionalidadMaquina"].'</p>
            <p class="Maquina-info">'.$row["estadoMaquina"].'</p>';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}