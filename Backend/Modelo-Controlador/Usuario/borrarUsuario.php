<?php

include("../../Conexion.php"); 

class borrarActividad {
    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }

    function borrarActividad() {
        $idActividad = $_GET["idActividad"];

        // Paso 1: Eliminar los registros hijos en la tabla "clase"
        $Borrar_Clase = "DELETE FROM clase WHERE Actividades_idActividades = '$idActividad'";
        $BorrarClase = mysqli_query($this->conexion->link, $Borrar_Clase);

        // Paso 2: Verificar si se eliminaron los registros hijos correctamente
        if ($BorrarClase) {
            // Paso 3: Eliminar la actividad de la tabla "tabla_actividades"
            $Borrar_Actividad = "DELETE FROM actividades WHERE idActividades = '$idActividad'";
            $BorrarActividad = mysqli_query($this->conexion->link, $Borrar_Actividad);

            if ($BorrarActividad) {
                header("Location: ../../../pagAdministracion.php");
                exit();
            } else {
                echo '
                <script>
                alert("....Error al eliminar la actividad...");
                window.location = "../../../pagAdministracion.php";
                </script>
                ';
            }
        } else {
            echo '
            <script>
            alert("No se puede eliminar la actividad debido a que existen registros hijos en la tabla Clase.");
            window.location = "../../../pagAdministracion.php";
            </script>
            ';
        }
        
        mysqli_close($this->conexion->link);
    }
}

$borrarActividad = new borrarActividad();
$borrarActividad->borrarActividad();
?>
