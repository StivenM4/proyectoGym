<?php
include("../Modelo/Rutina.php");

class ControladorRutina{
    private $Rutina;
    function __construct (){
        $Rutina=new Rutina();
    }

    function seleccionarOpcion(){
        
    if(isset($_POST['anexar'])){

    $this->controlRutina(1);
    }

    if(isset($_POST['actualizar'])){

    $this->controlRutina(2);
    }

    if(isset($_POST['borrar'])){

    $this->controlRutina(3);
    }

    if(isset($_POST['listar'])){

    $this->controlRutina(4);
    }

}

public function controlRutina($seleccion){
    
    $idRutina=$_POST['idRutina'];
    $nombreRutina=$_POST['nombreRutina'];
    $descripcionRutina=$_POST['descripcionRutina'];
    $ejerciciosRutina=$_POST['ejerciciosRutina'];
    $repeticionesRutina=$_POST['repeticionesRutina'];
    $seriesRutina=$_POST['seriesRutina'];
    $objetivosRutina=$_POST['objetivosRutina'];

    $Rutina=new Rutina();

    switch($seleccion){

        case 1:
        
        $Rutina->anexarRutina($idRutina,$nombreRutina,$descripcionRutina,$ejerciciosRutina,$repeticionesRutina,$seriesRutina,$objetivosRutina);      
        break;
        
        case 2:        
        $Rutina->actualizarRutina($idRutina,$nombreRutina,$descripcionRutina,$ejerciciosRutina,$repeticionesRutina,$seriesRutina,$objetivosRutina);
        
        break;
         
        case 3:
        
        $Rutina->borrarRutina($idRutina);        
        break;
        
        case 4:
        
        $Rutina->buscarRutina($idRutina);        
        break;

        case 5:
        
        $Rutina->listarRutinas();        
        break;
        
        }     
}

}

$controlRutina = new ControladorRutina();

$controlRutina -> seleccionarOpcion();
?>
