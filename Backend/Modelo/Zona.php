<?php

include("../Conexion.php"); 

Class Zona{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarZona($idZona,$nombreZona,$ubicacionZona,$serviciosDisponiblesZona){

    $grabar_Zona="INSERT INTO zona(idZona,nombreZona,ubicacionZona,serviciosDisponiblesZona) VALUES('$idZona','$nombreZona','$ubicacionZona','$serviciosDisponiblesZona')";
    $guardar_Zona=mysqli_query($this->conexion->link,$grabar_Zona) 
    or die('' . mysqli_connect_error());

    if($guardar_Zona){
        echo'
        <script>
        alert("Zona Registrado");
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

function actualizarZona($idZona,$nombreZona,$ubicacionZona,$serviciosDisponiblesZona){
    $actualizar_Zona="UPDATE zona SET nombreZona='$nombreZona',ubicacionZona='$ubicacionZona',serviciosDisponiblesZona='$serviciosDisponiblesZona' WHERE idZona='$idZona'";
    $guardar_New_Zona = mysqli_query($this->conexion->link,$actualizar_Zona)
    or die('' . mysqli_connect_error()); 

    if($guardar_New_Zona){
        echo'
        <script>
        alert("Zona Actualizado");
        window.location = "";
        </script>
        ';
        }

    else{
        echo'
        <script>
        alert("....La Zona no existe...");
        window.location = "";
        </script>
        ';
    }
    }

    function borrarZona($idZona){
        $Borrar_Zona="DELETE FROM zona WHERE cedulaCliente='$idZona' ";
        $Borrar=mysqli_query($this->conexion->link,$Borrar_Zona)
        or die('' . mysqli_connect_error()); 

        if($Borrar){
            echo'
            <script>
            alert("Zona Borrado");
            </script>
            ';
            }
    
        else{
            echo'
            <script>
            alert("....La Zona no existe...");
            window.location = "";
            </script>
            ';
        }
    }

    function listarZona(){
        $consultar_Zona="SELECT * FROM zona ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Zona)
        or die('' . mysqli_connect_error()); 
    if ($row = mysqli_fetch_array($consulta)) {
        do {

            echo '<p class="Zona-info">'.$row["idZona"].'</p>
            <p class="Zona-info">'.$row["nombreZona"].'</p>
            <p class="Zona-info">'.$row["ubicacionZona"].'</p>
            <p class="Zona-info">'.$row["serviciosDisponiblesZona"].'</p>';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}