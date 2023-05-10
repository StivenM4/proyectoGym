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
        
        $idplan=$_POST['idplan'];
        $nombrePlan=$_POST['nombrePlan'];
        $duracionPlan=$_POST['duracionPlan'];
        $precioPlan=$_POST['precioPlan'];
        $beneficiosPlan=$_POST['beneficiosPlan'];
        $restriccionesPlan=$_POST['restriccionesPlan'];
        
    
        $Plan=new Plan();
    
        switch($seleccion){
    
            case 1:
            
            $Plan->anexarPlan($idplan,$nombrePlan,$duracionPlan,$precioPlan,$beneficiosPlan,$restriccionesPlan);      
            break;
            
            case 2:        
            $Plan->actualizarPlan($idplan,$nombrePlan,$duracionPlan,$precioPlan,$beneficiosPlan,$restriccionesPlan);
            
            break;
             
            case 3:
            
            $Plan->borrarPlan($idplan);        
            break;
            
            case 4:
            
            $Plan->buscarPlan($idplan);        
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
   