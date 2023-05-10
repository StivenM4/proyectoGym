<?php

    include("../Modelo/Plan.php");
    
    class ControladorPlan{
        private $Plan;
        function __construct (){
            $Plan=new Plan();
        }
    
        function seleccionarOpcion(){
            
        if(isset($_POST['anexar'])){
    
        $this->controlPlan(1);
        }
    
        if(isset($_POST['actualizar'])){
    
        $this->controlPlan(2);
        }
    
        if(isset($_POST['borrar'])){
    
        $this->controlPlan(3);
        }
    
        if(isset($_POST['listar'])){
    
        $this->controlPlan(4);
        }
    
    }
    
    public function controlPlan($seleccion){
        
        $ID_Plan=$_POST['ID_Plan'];
        $NombrePlan=$_POST['NombrePlan'];
        $Duracion=$_POST['Duracion'];
        $Precio=$_POST['Precio'];
        $Beneficios=$_POST['Beneficios'];
        $Restricciones=$_POST['Restricciones'];
        
    
        $Plan=new Plan();
    
        switch($seleccion){
    
            case 1:
            
            $Plan->anexarPlan($ID_Plan,$NombrePlan,$Duracion,$Precio,$Beneficios,$Restricciones);      
            break;
            
            case 2:        
            $Plan->actualizarPlan($ID_Plan,$NombrePlan,$Duracion,$Precio,$Beneficios,$Restricciones);
            
            break;
             
            case 3:
            
            $Plan->borrarPlan($ID_Plan);        
            break;
            
            case 4:
            
                $Plan->buscarPlan($ID_Plan);        
            break;
            case 5:
            
            $Plan->listarPlans();        
            break;
            
            }     
    }
    
    }
    
    $controlPlan = new ControladorPlan();
    
    $controlPlan -> seleccionarOpcion();
    ?>
   