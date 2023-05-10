<?php
class CerrarSesion{
    function __construct() {  
        session_start();
    header("location: ../../index.html");
    session_destroy();
    die();
}
}
 
$CerrarS=new CerrarSesion();
?>