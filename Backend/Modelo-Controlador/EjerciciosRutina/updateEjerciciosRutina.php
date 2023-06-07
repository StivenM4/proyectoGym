<?php 
    include("../../Conexion.php");

    $conexion = new Conexion();
    $verRutina= "SELECT * FROM rutina";
    $verEjercicios= "SELECT * FROM ejercicios";
    

    $Rutina_idRutina = $_GET['Rutina_idRutina'];
    $Ejercicios_idEjercicios = $_GET['Ejercicios_idEjercicios'];
    $verEjercicioRutina = "SELECT * FROM ejerciciosrutina WHERE Rutina_idRutina = '$Rutina_idRutina' AND Ejercicios_idEjercicios = '$Ejercicios_idEjercicios'";
    $guardar_ejercicio_rutina = mysqli_query($conexion->link, $verEjercicioRutina);
    $row1 = mysqli_fetch_array($guardar_ejercicio_rutina);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../../Frontend/assets/css/updates.css">
    <title>Editar ejercicio en rutina</title>
</head>
<body>
    <div class="Contenedor">
    <h2>Editar Ejercicios -Rutina</h2>
        <form action="editarEjercicioRutina.php" method="POST">
         
            <select name="Rutina_idRutina">
                        <?php 
                        
                        $guardar_EjerRutina=mysqli_query($conexion->link,$verRutina);
                        while ($row = mysqli_fetch_array($guardar_EjerRutina)): ?>

                        <option value="<?= $row['idRutina'] ?>">
                            <?= $row['NombreRutina'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>
           
            <select name="Ejercicios_idEjercicios">
                        <?php 
                        
                        $guardar_EjerEjercicios=mysqli_query($conexion->link,$verEjercicios);
                        while ($row = mysqli_fetch_array($guardar_EjerEjercicios)): ?>

                        <option value="<?= $row['idEjercicios'] ?>">
                            <?= $row['NombreEjercicio'] ?>

                        </option>

                        <?php endwhile; ?>
                    </select>


            <input type="text" name="Series" placeholder="Series" value="<?= $row1['Series']?>">
            <input type="text" name="Repeticiones" placeholder="Repeticiones" value="<?= $row1['Repeticiones']?>">
            <input type="submit" value="Actualizar">
        </form>
    </div>
</body>
</html>
