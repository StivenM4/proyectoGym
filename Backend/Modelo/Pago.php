<?php

include("../Conexion.php"); 

Class Pago{

    private $conexion;

    function __construct() {  
        $this->conexion = new Conexion();
    }
    

function anexarPago($idPago,$valorPago,$fechaPago,$estadoPago){

    $grabar_Pago="INSERT INTO pago(idPago,valorPago,fechaPago,estadoPago) VALUES('$idPago','$valorPago','$fechaPago','$estadoPago')";
    $guardar_Pago=mysqli_query($this->conexion->link,$grabar_Pago) 
    or die('' . mysqli_connect_error());

    if($guardar_Pago){
        echo'
        <script>
        alert("Pago Registrado");
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

function actualizarPago($idPago,$valorPago,$fechaPago,$estadoPago){
    $actualizar_Pago="UPDATE pago SET valorPago='$valorPago',fechaPago='$fechaPago',estadoPago='$estadoPago' WHERE idPago='$idPago'";
    $guardar_New_Pago = mysqli_query($this->conexion->link,$actualizar_Pago)
    or die('' . mysqli_connect_error()); 

    if($guardar_New_Pago){
        echo'
        <script>
        alert("Pago Actualizado");
        window.location = "";
        </script>
        ';
        }

    else{
        echo'
        <script>
        alert("....El Pago no existe...");
        window.location = "";
        </script>
        ';
    }
    }

    function borrarPago($idPago){
        $Borrar_Pago="DELETE FROM pago WHERE cedulaCliente='$idPago' ";
        $Borrar=mysqli_query($this->conexion->link,$Borrar_Pago)
        or die('' . mysqli_connect_error()); 

        if($Borrar){
            echo'
            <script>
            alert("Pago Borrado");
            window.location = "";
            </script>
            ';
            }
    
        else{
            echo'
            <script>
            alert("....El Pago no existe...");
            window.location = "";
            </script>
            ';
        }
    }

    function listarPago(){
        $consultar_Pago="SELECT * FROM pago ";
        $consulta = mysqli_query($this->conexion->link,$consultar_Pago)
        or die('' . mysqli_connect_error()); 
    if ($row = mysqli_fetch_array($consulta)) {
        do {

            echo '<p class="Pago-info">'.$row["idPago"].'</p>
            <p class="Pago-info">'.$row["valorPago"].'</p>
            <p class="Pago-info">'.$row["fechaPago"].'</p>
            <p class="Pago-info">'.$row["estadoPago"].'</p>';
            
            } while ($row = mysqli_fetch_array($consulta));
            
            } else {
            
            echo "¡ No se ha encontrado ningún registro !";
            
            }
        
    }
}