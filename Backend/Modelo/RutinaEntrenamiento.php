<?php

include("../Conexion.php"); 

Class RutinaEntrenamiento{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarRutina($idRutina,$nombreRutina,$descripcionRutina,$ejerciciosRutina,$repeticionesRutina,$seriesRutina,$objetivosRutina){

    $grabar_Rutina="INSERT INTO rutina(idRutina,nombreRutina,descripcionRutina,ejerciciosRutina,repeticionesRutina,seriesRutina,objetivosRutina) VALUES('$idRutina','$nombreRutina','$descripcionRutina','$ejerciciosRutina','$repeticionesRutina','$seriesRutina','$objetivosRutina')";
    $guardar_Rutina=mysqli_query($this->conexion->link,$grabar_Rutina) 
    or die('' . mysqli_connect_error());

    if($guardar_Rutina){
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

function actualizarRutina($idRutina,$nombreRutina,$descripcionRutina,$ejerciciosRutina,$repeticionesRutina,$seriesRutina,$objetivosRutina){
    $actualizar_Rutina="UPDATE rutina SET nombreRutina='$nombreRutina',descripcionRutina='$descripcionRutina',ejerciciosRutina='$ejerciciosRutina',repeticionesRutina='$repeticionesRutina',seriesRutina='$seriesRutina',objetivosRutina='$objetivosRutina' WHERE idRutina='$idRutina'";
    $guardar_New_Rutina = mysqli_query($this->conexion->link,$actualizar_Rutina)
    or die('' . mysqli_connect_error()); 

    if($guardar_New_Rutina){
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

    function borrarRutina($idRutina){
        $Borrar_Rutina="DELETE FROM rutina WHERE cedulaCliente='$idRutina' ";
        $Borrar=mysqli_query($this->conexion->link,$Borrar_Rutina)
        or die('' . mysqli_connect_error()); 

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

    function listarRutina(){
        $consultar_Rutina="SELECT * FROM rutina ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Rutina)
        or die('' . mysqli_connect_error()); 
    if ($row = mysqli_fetch_array($consulta)) {
        do {

            echo '<p class="Rutina-info">'.$row["idRutina"].'</p>
            <p class="Rutina-info">'.$row["nombreRutina"].'</p>
            <p class="Rutina-info">'.$row["descripcionRutina"].'</p>
            <p class="Rutina-info">'.$row["ejerciciosRutina"].'</p>
            <p class="Rutina-info">'.$row["repeticionesRutina"].'</p>';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}