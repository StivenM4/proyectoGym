<?php
include("../Modelo/Servicio.php");

class ControladorServicios{
    private $Servicio;
    function __construct (){
        $Servicio=new Servicio();
    }

    function seleccionarOpcion(){
        
    if(isset($_POST['anexar'])){

    $this->controlServicio(1);
    }

    if(isset($_POST['actualizar'])){

    $this->controlServicio(2);
    }

    if(isset($_POST['borrar'])){

    $this->controlServicio(3);
    }

    if(isset($_POST['listar'])){

    $this->controlServicio(4);
    }

}

public function controlServicio($seleccion){
    
    $idServicio=$_POST['idServicio'];
    $nombreServicio=$_POST['nombreServicio'];
    $descripcionServicio=$_POST['descripcionServicio'];
    

    $Servicio=new Servicio();

    switch($seleccion){

        case 1:
        
        $Servicio->anexarServicio($idServicio,$nombreServicio,$descripcionServicio);      
        break;
        
        case 2:        
        $Servicio->actualizarServicio($idServicio,$nombreServicio,$descripcionServicio);
        
        break;
         
        case 3:
        
        $Servicio->borrarServicio($idServicio);        
        break;
        
        case 4:
        
        $Servicio->buscarServicio($idServicio);        
        break;

        case 5:
        
        $Servicio->listarServicios();        
        break;
        
        }     
}

}

$controlServicio = new ControladorServicios();

$controlServicio -> seleccionarOpcion();
?>
