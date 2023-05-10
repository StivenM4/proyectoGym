<?php
include("../Modelo/Horario.php");

class ControladorHorario{
    private $Horario;
    function __construct (){
        $Horario=new Horario();
    }

    function seleccionarOpcion(){
        
    if(isset($_POST['anexar'])){

    $this->controlHorario(1);
    }

    if(isset($_POST['actualizar'])){

    $this->controlHorario(2);
    }

    if(isset($_POST['borrar'])){

    $this->controlHorario(3);
    }

    if(isset($_POST['listar'])){

    $this->controlHorario(4);
    }

}

public function controlHorario($seleccion){
    
    $idHorario=$_POST['idHorario'];
    $fechaHorario=$_POST['fechaHorario'];
    $horaInicioHorario=$_POST['horaInicioHorario'];
    $horafinalizacionHorario=$_POST['horafinalizacionHorario'];


    $Horario=new Horario();

    switch($seleccion){

        case 1:
        
        $Horario->anexarHorario($idHorario,$fechaHorario,$horaInicioHorario,$horafinalizacionHorario);      
        break;
        
        case 2:        
        $Horario->actualizarHorario($idHorario,$fechaHorario,$horaInicioHorario,$horafinalizacionHorario);
        
        break;
         
        case 3:
        
        $Horario->borrarHorario($idHorario);        
        break;
        
        case 4:
        
        $Horario->buscarHorario($idHorario);        
        break;
        
        case 5:
        
        $Horario->listarHorarios();        
        break;
        
        }     
}

}

$controlHorario = new ControladorHorario();

$controlHorario -> seleccionarOpcion();
?>