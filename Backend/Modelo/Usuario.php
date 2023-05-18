
<?php

include("../Conexion.php"); 

class Usuario{

private $conexion;

function __construct() {  
    $this->conexion = new Conexion();
}

    function anexarUsuario($nombreUsuario,$usuario,$emailUsuario,$contrasenaUsuario){

        $grabar_usuario="INSERT INTO usuarios(nombreUsuario,usuario,emailUsuario,contra) VALUES('$nombreUsuario','$usuario','$emailUsuario','$contrasenaUsuario')";
        $guardar_usuario=mysqli_query($this->conexion->link,$grabar_usuario) 
        or die('' . mysqli_connect_error());

        if($guardar_usuario){
            if(isset($_SESSION['Usuario'])){
                echo'
            <script>
            alert("Usuario Registrado");
            window.location = "../../login.php";
            </script>
            ';
            }
            else{
                echo'
                <script>
                alert("Usuario Registrado");
                window.location = "";
                </script>
                ';
            }
            
        }
        else{
            echo'
            <script>
            alert("....Error...");
            window.location = "../../login.php";
            </script>
            ';
        }
        mysqli_close($this->conexion->link);
        
    }

    function actualizarUsuario($codigo,$nombreUsuario,$usuario,$emailUsuario,$contrasenaUsuario){
        $actualizar_Usuario="UPDATE usuarios SET nombreUsuario='$nombreUsuario',usuario='$usuario',emailUsuario='$emailUsuario',contra='$contrasenaUsuario' WHERE codUsuario='$codigo'";
        $guardar_New_Usuario = mysqli_query($this->conexion->link,$actualizar_Usuario)
        or die('' . mysqli_connect_error()); 

        if($guardar_New_Usuario){
            echo'
            <script>
            alert("Usuario Actualizado");
            </script>
            ';
            }

        else{
            echo'
            <script>
            alert("....El usuario no existe...");
            window.location = "../../login.php";
            </script>
            ';
        }
    }

    function borrarUsuario($codigo){
        $Borrar_Usuario="DELETE FROM usuarios WHERE codUsuario='$codigo' ";
        $Borrar=mysqli_query($this->conexion->link,$Borrar_Usuario)
        or die('' . mysqli_connect_error()); 

        if($Borrar){
        echo'
            <script>
            alert("Usuario Borrado");
            </script>
            ';
        }
            
        else{
            echo'
            <script>        
            alert("....El usuario no existe...");
            window.location = "../../login.php";        
            </script>
            ';
        }        
    }  

    function listarUsuario(){
        $consultar_Usuario="SELECT * FROM usuarios ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Usuario)
        or die('' . mysqli_connect_error()); 

        if ($row = mysqli_fetch_array($consulta)) {
            do {

                echo '<p class="cliente-info">'.$row["codUsuario"].'</p>
                <p class="cliente-info">'.$row["nombreUsuario"].'</p>
                <p class="cliente-info">'.$row["usuario"].'</p>
                <p class="cliente-info">'.$row["emailUsuario"].'</p>
                <p class="cliente-info">'.$row["contra"].'</p>';
                
                } while ($row = mysqli_fetch_array($consulta));
                
            } else {            
            echo "¡ No se ha encontrado ningún registro !";   
            }   
    }
}
?>