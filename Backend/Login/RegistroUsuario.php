<?php
include("../Modelo/Usuario.php");

class RegistroUsuario{
private $UsuarioR;
function __construct() {  

$UsuarioR=new Usuario();
}

function agregarUsuario(){
    $nombre = $_POST['nombreR'];
    $usuario = $_POST['usuarioR'];
    $email = $_POST['emailR'];
    $contrasena =md5($_POST['contrasR']);
   
    $UsuarioR=new Usuario();
    $UsuarioR->anexarUsuario($nombre,$usuario,$email,$contrasena);
}
   
}
$Registro = new RegistroUsuario();

$Registro -> agregarUsuario();
?>