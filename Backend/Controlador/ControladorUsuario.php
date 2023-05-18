<?php
include("../Modelo/Usuario.php");

class ControladorUsuario{
    private $Usuario;
    function __construct (){
        $Usuario=new Usuario();
    }

    function seleccionarOpcion(){
        
    if(isset($_POST['anexar'])){

    $this->controlUsuario(1);
    }

    if(isset($_POST['actualizar'])){

    $this->controlUsuario(2);
    }

    if(isset($_POST['borrar'])){

    $this->controlUsuario(3);
    }

    if(isset($_POST['listar'])){

    $this->controlUsuario(4);
    }

}

public function controlUsuario($seleccion){
    
    $codUsuario=$_POST['codUsuario'];
    $nombreUsuario=$_POST['nombreUsuario'];
    $usuario=$_POST['usuario'];
    $emailUsuario=$_POST['emailUsuario'];
    $contraUsuario=md5($_POST['contraUsuario']);

    $Usuario=new Usuario();

    switch($seleccion){

        case 1:
        
        $Usuario->anexarUsuario($codUsuario,$nombreUsuario,$usuario,$emailUsuario,$contraUsuario);      
        break;
        
        case 2:        
        $Usuario->actualizarUsuario($codUsuario,$nombreUsuario,$usuario,$emailUsuario,$contraUsuario);
        
        break;
         
        case 3:
        
        $Usuario->borrarUsuario($codUsuario);        
        break;

        case 4:
        
        $Usuario->listarUsuario();        
        break;
        
        }     
}

}

$controlUsuario = new ControladorUsuario();

$controlUsuario -> seleccionarOpcion();
?>