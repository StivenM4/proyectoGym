<?php

include("../Conexion.php"); 

Class Clase{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarClase($idClase,$nombreClase,$descripcionClase,$DuracionClase){

    $grabar_Clase="INSERT INTO clase(idClase,nombreClase,descripcionClase,DuracionClase) VALUES('$idClase','$nombreClase','$descripcionClase','$DuracionClase')";
    $guardar_Clase=mysqli_query($this->conexion->link,$grabar_Clase) 
    or die('' . mysqli_connect_error());

    if($guardar_Clase){
        echo'
        <script>
        alert("Clase Registrado");
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

function actualizarClase($idClase,$nombreClase,$descripcionClase,$DuracionClase){
    $actualizar_Clase="UPDATE clase SET nombreClase='$nombreClase',descripcionClase='$descripcionClase',DuracionClase='$DuracionClase' WHERE idClase='$idClase'";
    $guardar_New_Clase = mysqli_query($this->conexion->link,$actualizar_Clase)
    or die('' . mysqli_connect_error()); 

    if($guardar_New_Clase){
        echo'
        <script>
        alert("Clase Actualizado");
        window.location = "";
        </script>
        ';
        }

    else{
        echo'
        <script>
        alert("....la Clase no existe...");
        window.location = "";
        </script>
        ';
    }
    }

    function borrarClase($idClase){
        $Borrar_Clase="DELETE FROM clase WHERE cedulaCliente='$idClase' ";
        $Borrar=mysqli_query($this->conexion->link,$Borrar_Clase)
        or die('' . mysqli_connect_error()); 

        if($Borrar){
            echo'
            <script>
            alert("Clase Borrado");
            window.location = "";
            </script>
            ';
            }
    
        else{
            echo'
            <script>
            alert("....la Clase no existe...");
            window.location = "";
            </script>
            ';
        }
    }

    function listarClase(){
        $consultar_Clase="SELECT * FROM clase ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Clase)
        or die('' . mysqli_connect_error()); 
    if ($row = mysqli_fetch_array($consulta)) {
        do {

            echo '<p class="Clase-info">'.$row["idClase"].'</p>
            <p class="Clase-info">'.$row["nombreClase"].'</p>
            <p class="Clase-info">'.$row["descripcionClase"].'</p>
            <p class="Clase-info">'.$row["DuracionClase"].'</p>';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}