<?php
include("../Modelo/Entrenador.php");

class ControladorEntrenador{
    private $Entrenador;
    function __construct (){
        $Entrenador=new Entrenador();
    }

    function seleccionarOpcion(){
        
    if(isset($_POST['anexar'])){

    $this->controlEntrenador(1);
    }

    if(isset($_POST['actualizar'])){

    $this->controlEntrenador(2);
    }

    if(isset($_POST['borrar'])){

    $this->controlEntrenador(3);
    }

    if(isset($_POST['listar'])){

    $this->controlEntrenador(4);
    }

}

public function controlEntrenador($seleccion){
    
    $cedulaEntrenador=$_POST['cedulaEntrenador'];
    $nombreEntrenador=$_POST['nombreEntrenador'];
    $edadEntrenador=$_POST['edadEntrenador'];
    $numTelefonoEntrenador=$_POST['numTelefonoEntrenador'];
    $especializacionEntrenador=$_POST['especializacionEntrenador'];


    $Entrenador=new Entrenador();

    switch($seleccion){

        case 1:
        
        $Entrenador->anexarEntrenador($cedulaEntrenador,$nombreEntrenador,$edadEntrenador,$numTelefonoEntrenador,$especializacionEntrenador);      
        break;
        
        case 2:        
        $Entrenador->actualizarEntrenador($cedulaEntrenador,$nombreEntrenador,$edadEntrenador,$numTelefonoEntrenador,$especializacionEntrenador);
        
        break;
         
        case 3:
        
        $Entrenador->borrarEntrenador($cedulaEntrenador);        
        break;
        
        case 4:
        
        $Entrenador->buscarEntrenador($cedulaEntrenador);        
        break;
        
        case 5:
        
        $Entrenador->listarEntrenadors();        
        break;
        
        }     
}

}

$controlEntrenador = new ControladorEntrenador();

$controlEntrenador -> seleccionarOpcion();
?>