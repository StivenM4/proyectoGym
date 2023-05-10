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
    
    $idRutina=$_POST['idRutina'];
    $nombreRutina=$_POST['nombreRutina'];
    $descripcionRutina=$_POST['descripcionRutina'];
    $ejerciciosRutina=$_POST['ejerciciosRutina'];
    $repeticionesRutina=$_POST['repeticionesRutina'];
    $seriesRutina=$_POST['seriesRutina'];
    $objetivosRutina=$_POST['objetivosRutina'];

    $RutinaEntrenamiento=new RutinaEntrenamiento();

    switch($seleccion){

        case 1:
        
        $RutinaEntrenamiento->anexarRutinaEntrenamiento($idRutina,$nombreRutina,$descripcionRutina,$ejerciciosRutina,$repeticionesRutina,$seriesRutina,$objetivosRutina);      
        break;
        
        case 2:        
        $RutinaEntrenamiento->actualizarRutinaEntrenamiento($idRutina,$nombreRutina,$descripcionRutina,$ejerciciosRutina,$repeticionesRutina,$seriesRutina,$objetivosRutina);
        
        break;
         
        case 3:
        
        $RutinaEntrenamiento->borrarRutinaEntrenamiento($idRutina);        
        break;
        
        case 4:
        
        $RutinaEntrenamiento->buscarRutinaEntrenamiento($idRutina);        
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
