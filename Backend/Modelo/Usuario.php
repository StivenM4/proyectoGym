
<?php

include("../Conexion.php"); 

class Usuario{

private $conexion;

function __construct() {  
    $this->conexion = new Conexion();
}

    function anexarUsuario($nombreUsuario,$usuario,$email,$contrasena){

        $grabar_usuario="INSERT INTO usuarios(nombreUsuario,usuario,email,contra) VALUES('$nombreUsuario','$usuario','$email','$contrasena')";
        $guardar_usuario=mysqli_query($this->conexion->link,$grabar_usuario) 
        or die('El registro de datos fallo;: ' . mysqli_connect_error());

        if($guardar_usuario){
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
            alert("....Error...");
            window.location = "../../login.php";
            </script>
            ';
        }
        mysqli_close($this->conexion->link);
        
    }

    function actualizarUsuario($codigo,$nombreUsuario,$usuario,$email,$contrasena){
        $actualizar_Usuario="UPDATE usuarios SET nombreUsuario='$nombreUsuario',usuario='$usuario',email='$email',contra='$contrasena' WHERE codUsuario='$codigo'";
        $guardar_New_Usuario = mysqli_query($this->conexion->link,$actualizar_Usuario)
        or die('Fallo actualizar datos;: ' . mysqli_connect_error()); 

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
        or die('Fallo borrar usuario;: ' . mysqli_connect_error()); 

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

    function listarUsuarios(){
        $consultar_Clientes="SELECT * FROM clientes ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Clientes)
        or die('Fallo borrar usuario;: ' . mysqli_connect_error()); 

        if ($row = mysqli_fetch_array($consulta)) {
            do {

                echo '<p class="cliente-info">'.$row["codUsuario"].'</p>
                <p class="cliente-info">'.$row["nombreUsuario"].'</p>
                <p class="cliente-info">'.$row["usuario"].'</p>
                <p class="cliente-info">'.$row["email"].'</p>
                <p class="cliente-info">'.$row["contra"].'</p>';
                
                } while ($row = mysqli_fetch_array($consulta));
                
            } else {            
            echo "¡ No se ha encontrado ningún registro !";   
            }   
    }
}
?>