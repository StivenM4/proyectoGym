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
    
    $ID_Pago=$_POST['ID_Pago'];
    $ValorPago=$_POST['ValorPago'];
    $FechaPago=$_POST['FechaPago'];
    $EstadoPago=$_POST['EstadoPago'];
  

    $Pago=new Pago();

    switch($seleccion){

        case 1:
        
        $Pago->anexarPago($ID_Pago,$ValorPago,$FechaPago,$EstadoPago);      
        break;
        
        case 2:        
        $Pago->actualizarPago($ID_Pago,$ValorPago,$FechaPago,$EstadoPago);
        
        break;
         
        case 3:
        
        $Pago->borrarPago($ID_Pago);        
        break;
        
        case 4:
        
            $Pago->buscarPago($ID_Pago);        
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