<?php

include("../Conexion.php"); 

Class nameClase{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarObj($Id,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6){

    $grabar_Obj="INSERT INTO objeto(id,valor1,valor2,valor3,valor4,valor5,valor6) VALUES('$Id','$valor1','$valor2','$valor3','$valor4','$valor5','$valor6')";
    $guardar_Obj=mysqli_query($this->conexion->link,$grabar_Obj) 
    or die('El registro de datos fallo;: ' . mysqli_connect_error());

    if($guardar_Obj){
        echo'
        <script>
        alert("Usuario Registrado");
        window.location = "";
        </script>
        ';
    }
    else{
        echo'
        <script>
        alert("....Error...");
        window.location = "";
        </script>
        ';
    }
    mysqli_close($this->conexion->link);
    
}

function actualizarObj($Id,$valor1,$valor2,$valor3,$valor4,$valor5,$valor6){
    $actualizar_Obj="UPDATE objeto SET valor1='$valor1',valor2='$valor2',valor3='$valor3',valor4='$valor4',valor5='$valor5',valor6='$valor6' WHERE id='$Id'";
    $guardar_New_Obj = mysqli_query($this->conexion->link,$actualizar_Obj)
    or die('Fallo actualizar datos;: ' . mysqli_connect_error()); 

    if($guardar_New_Obj){
        echo'
        <script>
        alert("cliente Actualizado");
        </script>
        ';
        }

    else{
        echo'
        <script>
        alert("....El cliente no existe...");
        window.location = "";
        </script>
        ';
    }
    }

    function borrarObj($Id){
        $Borrar_Obj="DELETE FROM objeto WHERE cedulaCliente='$Id' ";
        $Borrar=mysqli_query($this->conexion->link,$Borrar_Obj)
        or die('Fallo borrar usuario;: ' . mysqli_connect_error()); 

        if($Borrar){
            echo'
            <script>
            alert("Cliente Borrado");
            </script>
            ';
            }
    
        else{
            echo'
            <script>
            alert("....El usuario no existe...");
            window.location = "";
            </script>
            ';
        }
    }

    function listarobjeto(){
        $consultar_Obj="SELECT * FROM objeto ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Obj)
        or die('Fallo borrar usuario;: ' . mysqli_connect_error()); 
    if ($row = mysqli_fetch_array($consulta)) {
        do {

            echo '<p class="obj-info">'.$row["id"].'</p>
            <p class="obj-info">'.$row["valor1"].'</p>
            <p class="obj-info">'.$row["valor2"].'</p>
            <p class="obj-info">'.$row["valor3"].'</p>
            <p class="obj-info">'.$row["valor4"].'</p>';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}