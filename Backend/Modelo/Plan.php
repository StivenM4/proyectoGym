<?php

include("../Conexion.php"); 

Class Plan{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarPlan($idPlan,$nombrePlan,$duracionPlan,$precioPlan,$beneficiosPlan,$restriccionesPlan){

    $grabar_Plan="INSERT INTO plan(idPlan,nombrePlan,duracionPlan,precioPlan,beneficiosPlan,restriccionesPlan) VALUES('$idPlan','$nombrePlan','$duracionPlan','$precioPlan','$beneficiosPlan','$restriccionesPlan')";
    $guardar_Plan=mysqli_query($this->conexion->link,$grabar_Plan) 
    or die('' . mysqli_connect_error());

    if($guardar_Plan){
        echo'
        <script>
        alert("Plan Registrado");
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

function actualizarPlan($idPlan,$nombrePlan,$duracionPlan,$precioPlan,$beneficiosPlan,$restriccionesPlan){
    $actualizar_Plan="UPDATE plan SET nombrePlan='$nombrePlan',duracionPlan='$duracionPlan',precioPlan='$precioPlan',beneficiosPlan='$beneficiosPlan',restriccionesPlan='$restriccionesPlan' WHERE idPlan='$idPlan'";
    $guardar_New_Plan = mysqli_query($this->conexion->link,$actualizar_Plan)
    or die('' . mysqli_connect_error()); 

    if($guardar_New_Plan){
        echo'
        <script>
        alert("Plan Actualizado");
        window.location = "";
        </script>
        ';
        }

    else{
        echo'
        <script>
        alert("....El Plan no existe...");
        window.location = "";
        </script>
        ';
    }
    }

    function borrarPlan($idPlan){
        $Borrar_Plan="DELETE FROM plan WHERE cedulaCliente='$idPlan' ";
        $Borrar=mysqli_query($this->conexion->link,$Borrar_Plan)
        or die('' . mysqli_connect_error()); 

        if($Borrar){
            echo'
            <script>
            alert("Plan Borrado");
            window.location = "";
            </script>
            ';
            }
    
        else{
            echo'
            <script>
            alert("....El Plan no existe...");
            window.location = "";
            </script>
            ';
        }
    }

    function listarplan(){
        $consultar_Plan="SELECT * FROM plan ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Plan)
        or die('' . mysqli_connect_error()); 
    if ($row = mysqli_fetch_array($consulta)) {
        do {

            echo '<p class="Plan-info">'.$row["idPlan"].'</p>
            <p class="Plan-info">'.$row["nombrePlan"].'</p>
            <p class="Plan-info">'.$row["duracionPlan"].'</p>
            <p class="Plan-info">'.$row["precioPlan"].'</p>
            <p class="Plan-info">'.$row["beneficiosPlan"].'</p>';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}