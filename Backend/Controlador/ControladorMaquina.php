<?php
include("../Modelo/Maquina.php");

class ControladorMaquina{
    private $Maquina;
    function __construct (){
        $Maquina=new Maquina();
    }

    function seleccionarOpcion(){
        
    if(isset($_POST['anexar'])){

    $this->controlMaquina(1);
    }

    if(isset($_POST['actualizar'])){

    $this->controlMaquina(2);
    }

    if(isset($_POST['borrar'])){

    $this->controlMaquina(3);
    }

    if(isset($_POST['listar'])){

    $this->controlMaquina(4);
    }

}

public function controlMaquina($seleccion){
    
    $idMaquina=$_POST['idMaquina'];
    $nombreMaquina=$_POST['nombreMaquina'];
    $funcionalidadMaquina=$_POST['funcionalidadMaquina'];
    $estadoMaquina=$_POST['estadoMaquina'];

    $Maquina=new Maquina();

    switch($seleccion){

        case 1:
        
        $Maquina->anexarMaquina($idMaquina,$nombreMaquina,$funcionalidadMaquina,$estadoMaquina);      
        break;
        
        case 2:        
        $Maquina->actualizarMaquina($idMaquina,$nombreMaquina,$funcionalidadMaquina,$estadoMaquina);
        
        break;
         
        case 3:
        
        $Maquina->borrarMaquina($idMaquina);        
        break;
        
        case 4:
        
        $Maquina->buscarMaquina($idMaquina);        
        break;
        
        case 5:
        
        $Maquina->listarMaquinas();        
        break;
        
        }     
}

}

$controlMaquina = new ControladorMaquina();

$controlMaquina -> seleccionarOpcion();
?>