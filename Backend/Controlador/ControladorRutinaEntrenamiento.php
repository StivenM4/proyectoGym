<?php
include("../Modelo/RutinaEntrenamiento.php");

class ControladorRutinaEntrenamiento{
    private $RutinaEntrenamiento;
    function __construct (){
        $RutinaEntrenamiento=new RutinaEntrenamiento();
    }

    function seleccionarOpcion(){
        
    if(isset($_POST['anexar'])){

    $this->controlRutinaEntrenamiento(1);
    }

    if(isset($_POST['actualizar'])){

    $this->controlRutinaEntrenamiento(2);
    }

    if(isset($_POST['borrar'])){

    $this->controlRutinaEntrenamiento(3);
    }

    if(isset($_POST['listar'])){

    $this->controlRutinaEntrenamiento(4);
    }

}

public function controlRutinaEntrenamiento($seleccion){
    
    $ID_Rutina=$_POST['ID_Rutina'];
    $NombreRutina=$_POST['NombreRutina'];
    $Descripcion=$_POST['Descripcion'];
    $Ejercicios=$_POST['Ejercicios'];
    $Repeticiones=$_POST['Repeticiones'];
    $Series=$_POST['Series'];
    $Objetivos=$_POST['Objetivos'];

    $RutinaEntrenamiento=new RutinaEntrenamiento();

    switch($seleccion){

        case 1:
        
        $RutinaEntrenamiento->anexarRutinaEntrenamiento($ID_Rutina,$NombreRutina,$Descripcion,$Ejercicios,$Repeticiones,$Series,$Objetivos);      
        break;
        
        case 2:        
        $RutinaEntrenamiento->actualizarRutinaEntrenamiento($ID_Rutina,$NombreRutina,$Descripcion,$Ejercicios,$Repeticiones,$Series,$Objetivos);
        
        break;
         
        case 3:
        
        $RutinaEntrenamiento->borrarRutinaEntrenamiento($ID_Rutina);        
        break;
        
        case 4:
        
            $RutinaEntrenamiento->buscarRutinaEntrenamiento($ID_Rutina);        
        break;
        case 5:
        
        $RutinaEntrenamiento->listarRutinaEntrenamientos();        
        break;
        
        }     
}

}

$controlRutinaEntrenamiento = new ControladorRutinaEntrenamiento();

$controlRutinaEntrenamiento -> seleccionarOpcion();
?>
