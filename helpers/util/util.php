<?php


class Utils{
    
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return$name;
    }
    
    public static function isAdmin(){
        if (!isset($_SESSION['admin'])){
             echo "<script> location.href='http://localhost/master-php/aprendiendophp/productos/index'; </script>";
        }else{
            return true;
        }
    }
        public static function isIdentity(){
        if (!isset($_SESSION['identity'])){
             echo "<script> location.href='http://localhost/master-php/aprendiendophp/productos/index'; </script>";
        }else{
            return true;
        }
    }
    
    
    public static function showCategorias(){
        require_once 'models/categoria.php';
        $categoria = new categoria;
        $categoria=$categoria->getAll();
        return $categoria;
    }
    
    public static function statsCarrito (){
        $stats= array(
          'count'=>0,
          'total'=>0
        );
        if(isset($_SESSION['carrito'])){
            $stats['count'] = count($_SESSION['carrito']);
            foreach ($_SESSION['carrito'] as $index => $producto){
                $stats['total']+= $producto['precio']*$producto['unidades'];
            }
        }
        return $stats;
    }
    public static function showEstado($estado){
        $value="pendiente";
        if($estado=='confirmado'){
        $value="pendiente";    
        }elseif($estado=='listo para enviar'){
        $value="listo para enviar";    
        }else{
            $value="enviado";
        }
        return $value;
    }
    
}