<?php

include("../Conexion.php"); 

Class Servicio{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarServicio($idServicio,$nombreServicio,$descripcion){

    $grabar_Servicio="INSERT INTO servicio(idServicio,nombreServicio,descripcion) VALUES('$idServicio','$nombreServicio','$descripcion')";
    $guardar_Servicio=mysqli_query($this->conexion->link,$grabar_Servicio) 
    or die('' . mysqli_connect_error());

    if($guardar_Servicio){
        echo'
        <script>
        alert("Servicio Registrado");
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

function actualizarServicio($idServicio,$nombreServicio,$descripcion){
    $actualizar_Servicio="UPDATE servicio SET nombreServicio='$nombreServicio',descripcion='$descripcion' WHERE idServicio='$idServicio'";
    $guardar_New_Servicio = mysqli_query($this->conexion->link,$actualizar_Servicio)
    or die('' . mysqli_connect_error()); 

    if($guardar_New_Servicio){
        echo'
        <script>
        alert("Servicio Actualizado");
        window.location = "";
        </script>
        ';
        }

    else{
        echo'
        <script>
        alert("....El Servicio no existe...");
        window.location = "";
        </script>
        ';
    }
    }

    function borrarServicio($idServicio){
        $Borrar_Servicio="DELETE FROM servicio WHERE cedulaCliente='$idServicio' ";
        $Borrar=mysqli_query($this->conexion->link,$Borrar_Servicio)
        or die('' . mysqli_connect_error()); 

        if($Borrar){
            echo'
            <script>
            alert("Servicio Borrado");
            window.location = "";
            </script>
            ';
            }
    
        else{
            echo'
            <script>
            alert("....El Servicio no existe...");
            window.location = "";
            </script>
            ';
        }
    }

    function listarServicio(){
        $consultar_Servicio="SELECT * FROM servicio ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Servicio)
        or die('' . mysqli_connect_error()); 
    if ($row = mysqli_fetch_array($consulta)) {
        do {

            echo '<p class="Servicio-info">'.$row["idServicio"].'</p>
            <p class="Servicio-info">'.$row["nombreServicio"].'</p>
            <p class="Servicio-info">'.$row["descripcion"].'</p> ';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}