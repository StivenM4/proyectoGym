<?php

include("../Conexion.php"); 

Class Servicios{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarObj($ID_Servicio,$NombreServicio,$Descripcion){

    $grabar_Obj="INSERT INTO objeto(ID_Servicio,NombreServicio,Descripcion) VALUES('$ID_Servicio','$NombreServicio','$Descripcion')";
    $guardar_Obj=mysqli_query($this->conexion->link,$grabar_Obj) 
    or die('El registro de datos fallo;: ' . mysqli_connect_error());

    if($guardar_Obj){
        echo'
        <script>
        alert("Usuario Registrado");
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

function actualizarObj($ID_Servicio,$NombreServicio,$Descripcion){
    $actualizar_Obj="UPDATE objeto SET NombreServicio='$NombreServicio',Descripcion='$Descripcion' WHERE ID_Servicio='$ID_Servicio'";
    $guardar_New_Obj = mysqli_query($this->conexion->link,$actualizar_Obj)
    or die('Fallo actualizar datos;: ' . mysqli_connect_error()); 

    if($guardar_New_Obj){
        echo'
        <script>
        alert("cliente Actualizado");
        </script>
        ';
        }

    else{
        echo'
        <script>
        alert("....El cliente no existe...");
        window.location = "";
        </script>
        ';
    }
    }

    function borrarObj($ID_Servicio){
        $Borrar_Obj="DELETE FROM objeto WHERE cedulaCliente='$ID_Servicio' ";
        $Borrar=mysqli_query($this->conexion->link,$Borrar_Obj)
        or die('Fallo borrar usuario;: ' . mysqli_connect_error()); 

        if($Borrar){
            echo'
            <script>
            alert("Cliente Borrado");
            </script>
            ';
            }
    
        else{
            echo'
            <script>
            alert("....El usuario no existe...");
            window.location = "";
            </script>
            ';
        }
    }

    function listarobjeto(){
        $consultar_Obj="SELECT * FROM objeto ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Obj)
        or die('Fallo borrar usuario;: ' . mysqli_connect_error()); 
    if ($row = mysqli_fetch_array($consulta)) {
        do {

            echo '<p class="obj-info">'.$row["ID_Servicio"].'</p>
            <p class="obj-info">'.$row["NombreServicio"].'</p>
            <p class="obj-info">'.$row["Descripcion"].'</p>
            ';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}