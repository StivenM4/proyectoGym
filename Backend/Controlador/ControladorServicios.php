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
    
    $ID_Servicio=$_POST['ID_Servicio'];
    $NombreServicio=$_POST['NombreServicio'];
    $Descripcion=$_POST['Descripcion'];
    

    $Servicio=new Servicio();

    switch($seleccion){

        case 1:
        
        $Servicio->anexarServicio($ID_Servicio,$NombreServicio,$Descripcion);      
        break;
        
        case 2:        
        $Servicio->actualizarServicio($ID_Servicio,$NombreServicio,$Descripcion);
        
        break;
         
        case 3:
        
        $Servicio->borrarServicio($ID_Servicio);        
        break;
        
        case 4:
        
            $Servicio->buscarServicio($ID_Servicio);        
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
