<?php

include("../Conexion.php"); 

Class Zona{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarObj($ID_Zona,$NombreZona,$Ubicacion,$BeneficiosDisponibles){

    $grabar_Obj="INSERT INTO objeto(ID_Zona,NombreZona,Ubicacion,BeneficiosDisponibles) VALUES('$ID_Zona','$NombreZona','$Ubicacion','$BeneficiosDisponibles')";
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

function actualizarObj($ID_Zona,$NombreZona,$Ubicacion,$BeneficiosDisponibles){
    $actualizar_Obj="UPDATE objeto SET NombreZona='$NombreZona',Ubicacion='$Ubicacion',BeneficiosDisponibles='$BeneficiosDisponibles' WHERE ID_Zona='$ID_Zona'";
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

    function borrarObj($ID_Zona){
        $Borrar_Obj="DELETE FROM objeto WHERE cedulaCliente='$ID_Zona' ";
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

            echo '<p class="obj-info">'.$row["ID_Zona"].'</p>
            <p class="obj-info">'.$row["NombreZona"].'</p>
            <p class="obj-info">'.$row["Ubicacion"].'</p>
            <p class="obj-info">'.$row["BeneficiosDisponibles"].'</p>
            <p class="obj-info">'.$row["valor4"].'</p>';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}