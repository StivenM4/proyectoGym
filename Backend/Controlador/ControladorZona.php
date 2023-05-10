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
    
    $idZona=$_POST['idZona'];
    $nombreZona=$_POST['nombreZona'];
    $ubicacionZona=$_POST['ubicacionZona'];
    $serviciosDisponiblesZona=$_POST['serviciosDisponiblesZona'];
   

    $Zona=new Zona();

    switch($seleccion){

        case 1:
        
        $Zona->anexarZona($idZona,$nombreZona,$ubicacionZona,$serviciosDisponiblesZona);      
        break;
        
        case 2:        
        $Zona->actualizarZona($idZona,$nombreZona,$ubicacionZona,$serviciosDisponiblesZona);
        
        break;
         
        case 3:
        
        $Zona->borrarZona($idZona);        
        break;
        
        case 4:
        
        $Zona->buscarZona($idZona);        
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
