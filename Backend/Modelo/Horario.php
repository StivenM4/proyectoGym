<?php

include("../Conexion.php"); 

Class Horario{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarHorario($idHorario,$fechaHorario,$horaInicioHorario,$horaFinalizacionHorario){

    $grabar_Horario="INSERT INTO horario(idHorario,fechaHorario,horaInicioHorario,horaFinalizacionHorario) VALUES('$idHorario','$fechaHorario','$horaInicioHorario','$horaFinalizacionHorario')";
    $guardar_Horario=mysqli_query($this->conexion->link,$grabar_Horario) 
    or die('' . mysqli_connect_error());

    if($guardar_Horario){
        echo'
        <script>
        alert("Horario Registrado");
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

function actualizarHorario($idHorario,$fechaHorario,$horaInicioHorario,$horaFinalizacionHorario){
    $actualizar_Horario="UPDATE horario SET fechaHorario='$fechaHorario',horaInicioHorario='$horaInicioHorario',horaFinalizacionHorario='$horaFinalizacionHorario' WHERE idHorario='$idHorario'";
    $guardar_New_Horario = mysqli_query($this->conexion->link,$actualizar_Horario)
    or die('' . mysqli_connect_error()); 

    if($guardar_New_Horario){
        echo'
        <script>
        alert("Horario Actualizado");
        window.location = "";
        </script>
        ';
        }

    else{
        echo'
        <script>
        alert("....El Horario no existe...");
        window.location = "";
        </script>
        ';
    }
    }

    function borrarHorario($idHorario){
        $Borrar_Horario="DELETE FROM horario WHERE cedulaCliente='$idHorario' ";
        $Borrar=mysqli_query($this->conexion->link,$Borrar_Horario)
        or die('' . mysqli_connect_error()); 

        if($Borrar){
            echo'
            <script>
            alert("Horario Borrado");
            window.location = "";
            </script>
            ';
            }
    
        else{
            echo'
            <script>
            alert("....El Horario no existe...");
            window.location = "";
            </script>
            ';
        }
    }

    function listarhorario(){
        $consultar_Horario="SELECT * FROM horario ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Horario)
        or die('' . mysqli_connect_error()); 
    if ($row = mysqli_fetch_array($consulta)) {
        do {

            echo '<p class="Horario-info">'.$row["idHorario"].'</p>
            <p class="Horario-info">'.$row["fechaHorario"].'</p>
            <p class="Horario-info">'.$row["horaInicioHorario"].'</p>
            <p class="Horario-info">'.$row["horaFinalizacionHorario"].'</p>';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}