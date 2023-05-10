<?php
include("../Modelo/Grupo.php");

class ControladorGrupo{
    private $Grupo;
    function __construct (){
        $Grupo=new Grupo();
    }

    function seleccionarOpcion(){
        
    if(isset($_POST['anexar'])){

    $this->controlGrupo(1);
    }

    if(isset($_POST['actualizar'])){

    $this->controlGrupo(2);
    }

    if(isset($_POST['borrar'])){

    $this->controlGrupo(3);
    }

    if(isset($_POST['listar'])){

    $this->controlGrupo(4);
    }

}

public function controlGrupo($seleccion){
    
    $idGrupo=$_POST['idGrupo'];
    $nombreGrupo=$_POST['nombreGrupo'];
    $descripcionGrupo=$_POST['descripcionGrupo'];
    $tamGrupo=$_POST['tamGrupo'];


    $Grupo=new Grupo();

    switch($seleccion){

        case 1:
        
        $Grupo->anexarGrupo($idGrupo,$nombreGrupo,$descripcionGrupo,$tamGrupo);      
        break;
        
        case 2:        
        $Grupo->actualizarGrupo($idGrupo,$nombreGrupo,$descripcionGrupo,$tamGrupo);
        
        break;
         
        case 3:
        
        $Grupo->borrarGrupo($idGrupo);        
        break;
        
        case 4:
        
        $Grupo->buscarGrupo($idGrupo);        
        break;

        case 5:
        
        $Grupo->listarGrupos();        
        break;
        
        }     
}

}

$controlGrupo = new ControladorGrupo();

$controlGrupo -> seleccionarOpcion();
?>