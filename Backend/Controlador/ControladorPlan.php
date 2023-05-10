<?php
include("../Modelo/obj.php");

class Controladorobj{
    private $obj;
    function __construct (){
        $obj=new obj();
    }

    function seleccionarOpcion(){
        
    if(isset($_POST['anexar'])){

    $this->controlobj(1);
    }

    if(isset($_POST['actualizar'])){

    $this->controlobj(2);
    }

    if(isset($_POST['borrar'])){

    $this->controlobj(3);
    }

    if(isset($_POST['listar'])){

    $this->controlobj(4);
    }

}

public function controlobj($seleccion){
    
    $valorid=$_POST['valorid'];
    $valor1=$_POST['valor1'];
    $valor2=$_POST['valor2'];
    $valor3=$_POST['valor3'];
    $valor4=$_POST['valor4'];
    $valor5=$_POST['valor5'];
    $valor6=$_POST['valor6'];

    $obj=new obj();

    switch($seleccion){

        case 1:
        
        $obj->anexarobj($id,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6);      
        break;
        
        case 2:        
        $obj->actualizarobj($id,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6);
        
        break;
         
        case 3:
        
        $obj->borrarobj($id);        
        break;
        
        case 4:
        
            $obj->buscarobj($id);        
        break;
        case 5:
        
        $obj->listarobjs();        
        break;
        
        }     
}

}

$controlObj = new Controladorobj();

$controlObj -> seleccionarOpcion();
?>