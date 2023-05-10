<?php
include("../Modelo/Pago.php");

class ControladorPago{
    private $Pago;
    function __construct (){
        $Pago=new Pago();
    }

    function seleccionarOpcion(){
        
    if(isset($_POST['anexar'])){

    $this->controlPago(1);
    }

    if(isset($_POST['actualizar'])){

    $this->controlPago(2);
    }

    if(isset($_POST['borrar'])){

    $this->controlPago(3);
    }

    if(isset($_POST['listar'])){

    $this->controlPago(4);
    }

}

public function controlPago($seleccion){
    
    $idPago=$_POST['idPago'];
    $valorPago=$_POST['valorPago'];
    $fechaPago=$_POST['fechaPago'];
    $estadoPago=$_POST['estadoPago'];
  

    $Pago=new Pago();

    switch($seleccion){

        case 1:
        
        $Pago->anexarPago($idPago,$valorPago,$fechaPago,$estadoPago);      
        break;
        
        case 2:        
        $Pago->actualizarPago($idPago,$valorPago,$fechaPago,$estadoPago);
        
        break;
         
        case 3:
        
        $Pago->borrarPago($idPago);        
        break;
        
        case 4:
        
        $Pago->buscarPago($idPago);        
        break;

        case 5:
        
        $Pago->listarPagos();        
        break;
        
        }     
}

}

$controlPago = new ControladorPago();

$controlPago -> seleccionarOpcion();
?>