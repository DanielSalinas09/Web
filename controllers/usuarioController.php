<?php

require_once 'models/usuario.php';
/* 
    crear controlador de cliente y administrador usuario pasaria a ser abstracta 
    crear moelo de cliente y administraor :D 
*/
abstract class usuarioController{

    abstract function save();
    
    public function index() {
        echo 'controlador Usuarios, Accion index';
    }

    public function registro() {//registro para usuarios 
        echo "<script> location.href='http://localhost/web/cliente/registro'; </script>";
    }
    // public function registroAdmin() {//eliminar esto  se registra a nivel de DB tener en cuenta
    //     //eliminar el metoddo del modelo y de la vista 
    //     require_once 'views/usuario/registroAdmin.php';
    // }
   

    public function login() {
      
        if (isset($_POST)) {
            //identificar al usuario super clase 
            //consulta a la base de datos
            $usuario = new cliente();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
       
            $identity = $usuario->login();

            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;
                if ($identity->tipo == 'admin') {
                    $_SESSION['admin'] = true;
                }
            } else {
                $_SESSION['error_login'] = 'Identificacion fallida!!';
            }



        }

        echo "<script> location.href='http://localhost/web/productos/index'; </script>";
    }

    public function logout() {
        //super clase 
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        if (isset($_SESSION['carrito'])) {
            unset($_SESSION['carrito']);
        }
        echo "<script> location.href='http://localhost/web/productos/index'; </script>";
    }


}
