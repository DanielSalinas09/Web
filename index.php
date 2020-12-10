<?php
session_start();
require_once 'helpers/util/util.php';
require_once './autoload.php';
require_once './config/db.php';
require_once './config/parametros.php';
require_once  './views/layout/header.php';
require_once './views/layout/sidebar.php';



function show_error(){
    $error= new errorController;
    $error->index();
}
if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';

}else if(!isset($_GET['controller']) && !isset ($_GET['action'])){
  $nombre_controlador=controler_default;  
    
}else{
    show_error();
    exit();
}

if(class_exists($nombre_controlador)){
    $controller = new $nombre_controlador();

    if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
       $action = $_GET['action'];
       $controller->$action();

    }else if(!isset($_GET['controller']) && !isset ($_GET['action'])){
        $action_default = action_default;
        $controller->$default();
    
}else{
        
        show_error();
        exit();
    }
    
}else{
    show_error();
}
require_once './views/layout/footer.php';