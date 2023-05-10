<?php
include("../Modelo/Clase.php");

class ControladorClase{
    private $Clase;
    function __construct (){
        $Clase=new Clase();
    }

    function seleccionarOpcion(){
        
    if(isset($_POST['anexar'])){

    $this->controlClase(1);
    }

    if(isset($_POST['actualizar'])){

    $this->controlClase(2);
    }

    if(isset($_POST['borrar'])){

    $this->controlClase(3);
    }

    if(isset($_POST['listar'])){

    $this->controlClase(4);
    }

}

public function controlClase($seleccion){
    
    $idClase=$_POST['idClase'];
    $nombreClase=$_POST['nombreClase'];
    $descripcionClase=$_POST['descripcionClase'];
    $DuracionClase=$_POST['DuracionClase'];


    $Clase=new Clase();

    switch($seleccion){

        case 1:  
        $Clase->anexarClase($idClase,$nombreClase,$descripcionClase,$DuracionClase);      
        break;
        
        case 2:        
        $Clase->actualizarClase($idClase,$nombreClase,$descripcionClase,$DuracionClase);       
        break;
         
        case 3:    
        $Clase->borrarClase($idClase);        
        break;
        
        case 4:     
            $Clase->buscarClase($idClase);        
        break;
        case 5:
        
        $Clase->listarClases();        
        break;
        
        }     
}

}

$controlClase = new ControladorClase();

$controlClase -> seleccionarOpcion();
?>