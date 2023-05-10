<?php

include("../Conexion.php"); 

Class Plan{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarObj($ID_Plan,$NombrePlan,$Duracion,$PrecioPlan,$Beneficios,$Restricciones){

    $grabar_Obj="INSERT INTO objeto(ID_Plan,NombrePlan,Duracion,PrecioPlan,Beneficios,Restricciones,valor6) VALUES('$ID_Plan','$NombrePlan','$Duracion','$PrecioPlan','$Beneficios','$Restricciones')";
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

function actualizarObj($ID_Plan,$NombrePlan,$Duracion,$PrecioPlan,$Beneficios,$Restricciones){
    $actualizar_Obj="UPDATE objeto SET NombrePlan='$NombrePlan',Duracion='$Duracion',PrecioPlan='$PrecioPlan',Beneficios='$Beneficios',Restricciones='$Restricciones' WHERE ID_Plan='$ID_Plan'";
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

    function borrarObj($ID_Plan){
        $Borrar_Obj="DELETE FROM objeto WHERE cedulaCliente='$ID_Plan' ";
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

            echo '<p class="obj-info">'.$row["ID_Plan"].'</p>
            <p class="obj-info">'.$row["NombrePlan"].'</p>
            <p class="obj-info">'.$row["Duracion"].'</p>
            <p class="obj-info">'.$row["PrecioPlan"].'</p>
            <p class="obj-info">'.$row["Beneficios"].'</p>';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}