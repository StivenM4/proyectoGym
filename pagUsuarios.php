<?php

include("Backend/Conexion.php"); 

$conexion = new Conexion();


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
    $email = $_SESSION['Usuario'];

// Obtener el ID del usuario actual
$BuscarUsuario = "SELECT idUsuario, NombreUsuario FROM Usuario WHERE Correo = '$email'";
$GuardarUsuario = mysqli_query($conexion->link, $BuscarUsuario);
$row = mysqli_fetch_assoc($GuardarUsuario);
$idUsuario = $row['idUsuario'];
$nombreUsuario = $row['NombreUsuario'];

// Consulta SQL con el ID del usuario
$BuscarPlan = "SELECT Plan.NombrePlan
FROM Usuario
JOIN Pago ON Usuario.idUsuario = Pago.Usuario_idUsuario
JOIN Plan ON Pago.Plan_idPlan = Plan.idPlan
WHERE Usuario.idUsuario = $idUsuario";
$GuardarPlan = mysqli_query($conexion->link, $BuscarPlan);



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <header>
        <div class="navegacion"></div>
        <h2></h2>
        <nav>
            <a href="Backend/Login/CerrarSesion.php"> Cerrar Sesion</a>
        </nav>
    </header>
    <div class="contenedorInicial">
         
    <div class="cajaUsuario">
    <div class="caja">
        <?= $row['NombreUsuario'] ?>
        </div>

       <div class="caja">
        
        <?php if (mysqli_num_rows($GuardarPlan) > 0) {

        while ($fila = mysqli_fetch_assoc($GuardarPlan)) {

            $nombrePlan = $fila['NombrePlan'];
            echo $nombrePlan . "<br>";
        }
        } else {
        Header("Location: formPago.php");
        } ?>
       </div>
       <div class="caja">
        <a href="OpcionesUser.php">Opciones</a>
       </div>
    </div>
       

    </div>

</body>

</html>