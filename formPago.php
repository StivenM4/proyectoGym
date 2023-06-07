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

$verPlan= "SELECT * FROM plan";
$guardar_Plan=mysqli_query($conexion->link,$verPlan);


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
                    <a href="#"></a>
                    <a href="#"></a>
                    <a href="#"></a>
                </nav>      
        </header>

        <div class="contenedor formulario">
           
                <form action="Backend/Modelo-Controlador/FormPago/controlFormPago.php" method="post">
                    <h2>Elige tu plan y entrena ya </h2>
                    <div class="caja">
                        <label>Elige Tu Plan</label>
                        <select name="PlanPago">
                        <?php 
                        $guardar_PlanPago=mysqli_query($conexion->link, $verPlan);
                        while ($row = mysqli_fetch_array($guardar_PlanPago)): ?>
                        <option value="<?= $row['idPlan'] ?>">
                            <?= $row['NombrePlan'] ?>
                        </option>
                        <?php endwhile; ?>
                    </select>
                    </div>
                    <h2>datos tarjeta</h2>
                    <div class="caja">
                        <label>Numero Tarjeta</label>
                        <input type="text" name="numeroTarjeta">
                    </div>
                    <div class="caja">
                        <label>FechaExpiracion</label>
                        <input type="text" name="fechaTarjeta">
                    </div>
                    <div class="caja">
                        <label>Codigo</label>
                        <input type="text" name="codigoTarjeta">
                    </div>
                    
                    <div class="botones">
                        <button class="submit" type="submit" name="anexar">Pagar</button>

                    </div>

                </form>
        </div>

    </body>
</html>