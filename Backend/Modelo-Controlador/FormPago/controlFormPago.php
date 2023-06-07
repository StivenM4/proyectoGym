<?php
include("../../Conexion.php");


session_start();
if(!isset($_SESSION['Usuario'])){
    echo'
    <script>
        alert("Inicie sesion para continuar");
    </script>
    ';
    header("location: login.");
    session_destroy();
    die();
    
}

class controlFormPago {
    private $conexion;

    function __construct() {
        $this->conexion = new Conexion();
    }

    function controlFormPago() {

    $email = $_SESSION['Usuario'];

    $verPlan= "SELECT * FROM plan";
    $guardar_Plan=mysqli_query($this->conexion->link,$verPlan);

    $BuscarUsuario = "SELECT idUsuario, NombreUsuario FROM Usuario WHERE Correo = '$email'";
    $GuardarUsuario = mysqli_query($this->conexion->link, $BuscarUsuario);
    $row = mysqli_fetch_assoc($GuardarUsuario);
    $idUsuario = $row['idUsuario'];

        $NumeroTarjeta = $_POST['numeroTarjeta'];
        $FechaTarjeta = $_POST['fechaTarjeta'];
        $CodigoTarjeta = $_POST['codigoTarjeta'];
        $Plan_idPlan = $_POST['PlanPago'];


        $Generar_Pago="INSERT INTO Pago (Usuario_idUsuario, Tarjeta_idTarjeta, Plan_idPlan, FechaPago, Total)
        VALUES (
            $idUsuario,
            (SELECT idTarjeta FROM Tarjeta WHERE Numero = '$NumeroTarjeta' AND FechaExpiracion='$FechaTarjeta' AND codigo='$CodigoTarjeta'), 
            (SELECT idPlan FROM Plan WHERE idPlan = '$Plan_idPlan'), 
            CURDATE(), 
            (SELECT Precio FROM Plan WHERE idPlan = '$Plan_idPlan') 
        )";
        $validar_Pago=mysqli_query($this->conexion->link,$Generar_Pago);


        if($validar_Pago){
           
            
            Header("Location: ../../../pagUsuarios.php");
                
        }
        else{
            echo'
            <script>
            alert("....Error...");
            window.location = "../../../pagUsuarios.php";
            </script>
            ';
        }
        mysqli_close($this->conexion->link);
        
    }

    }


$controlFormPago = new controlFormPago();
$controlFormPago->controlFormPago();
?>