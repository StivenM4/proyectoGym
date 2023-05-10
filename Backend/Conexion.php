<?php

class Conexion{
   
private $servidor;
private $usuario;
private $clave;
private $basedato;

function __construct() {  

    $this->servidor = "127.0.0.1";
    $this->usuario = "root";
    $this->clave = "";
    $this->basedato = "bdprofitgym";
    
    $this->link = mysqli_connect($this->servidor, $this->usuario, $this->clave, $this->basedato);
    
    mysqli_select_db($this->link, $this->basedato);       
}

}
?>