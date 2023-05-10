<?php
include("../Modelo/Zona.php");

class ControladorZona{
    private $Zona;
    function __construct (){
        $Zona=new Zona();
    }

    function seleccionarOpcion(){
        
    if(isset($_POST['anexar'])){

    $this->controlZona(1);
    }

    if(isset($_POST['actualizar'])){

    $this->controlZona(2);
    }

    if(isset($_POST['borrar'])){

    $this->controlZona(3);
    }

    if(isset($_POST['listar'])){

    $this->controlZona(4);
    }

}

public function controlZona($seleccion){
    
    $ID_Zona=$_POST['ID_Zona'];
    $NombreZona=$_POST['NombreZona'];
    $Ubicacion=$_POST['Ubicacion'];
    $ServiciosDisponibles=$_POST['ServiciosDisponibles'];
   

    $Zona=new Zona();

    switch($seleccion){

        case 1:
        
        $Zona->anexarZona($ID_Zona,$NombreZona,$Ubicacion,$ServiciosDisponibles);      
        break;
        
        case 2:        
        $Zona->actualizarZona($ID_Zona,$NombreZona,$Ubicacion,$ServiciosDisponibles);
        
        break;
         
        case 3:
        
        $Zona->borrarZona($ID_Zona);        
        break;
        
        case 4:
        
            $Zona->buscarZona($ID_Zona);        
        break;
        case 5:
        
        $Zona->listarZonas();        
        break;
        
        }     
}

}

$controlZona = new ControladorZona();

$controlZona -> seleccionarOpcion();
?>
