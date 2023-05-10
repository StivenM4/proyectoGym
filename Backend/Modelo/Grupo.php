<?php

include("../Conexion.php"); 

Class Grupo{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarGrupo($idGrupo,$nombreGrupo,$descripcionGrupo,$tamGrupo){

    $grabar_Grupo="INSERT INTO grupo(idGrupo,nombreGrupo,descripcionGrupo,tamGrupo) VALUES('$idGrupo','$nombreGrupo','$descripcionGrupo','$tamGrupo')";
    $guardar_Grupo=mysqli_query($this->conexion->link,$grabar_Grupo) 
    or die('' . mysqli_connect_error());

    if($guardar_Grupo){
        echo'
        <script>
        alert("Grupo Registrado");
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

function actualizarGrupo($idGrupo,$nombreGrupo,$descripcionGrupo,$tamGrupo){
    $actualizar_Grupo="UPDATE grupo SET nombreGrupo='$nombreGrupo',descripcionGrupo='$descripcionGrupo',tamGrupo='$tamGrupo' WHERE idGrupo='$idGrupo'";
    $guardar_New_Grupo = mysqli_query($this->conexion->link,$actualizar_Grupo)
    or die('' . mysqli_connect_error()); 

    if($guardar_New_Grupo){
        echo'
        <script>
        alert("Grupo Actualizado");
        window.location = "";
        </script>
        ';
        }

    else{
        echo'
        <script>
        alert("....El Grupo no existe...");
        window.location = "";
        </script>
        ';
    }
    }

    function borrarGrupo($idGrupo){
        $Borrar_Grupo="DELETE FROM grupo WHERE cedulaCliente='$idGrupo' ";
        $Borrar=mysqli_query($this->conexion->link,$Borrar_Grupo)
        or die('' . mysqli_connect_error()); 

        if($Borrar){
            echo'
            <script>
            alert("Grupo Borrado");
            window.location = "";
            </script>
            ';
            }
    
        else{
            echo'
            <script>
            alert("....El Grupo no existe...");
            window.location = "";
            </script>
            ';
        }
    }

    function listarGrupo(){
        $consultar_Grupo="SELECT * FROM grupo ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Grupo)
        or die('' . mysqli_connect_error()); 
    if ($row = mysqli_fetch_array($consulta)) {
        do {

            echo '<p class="Grupo-info">'.$row["idGrupo"].'</p>
            <p class="Grupo-info">'.$row["nombreGrupo"].'</p>
            <p class="Grupo-info">'.$row["descripcionGrupo"].'</p>
            <p class="Grupo-info">'.$row["tamGrupo"].'</p>';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}