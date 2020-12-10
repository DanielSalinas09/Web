<?php

require_once 'models/cliente.php';

/* 
    crear controlador de cliente y administrador usuario pasaria a ser abstracta 
    crear moelo de cliente y administraor :D 
*/
class clienteController extends usuarioController{
   



    public function registro() {//registro para usuarios 
        require_once 'views/usuario/registro.php';
    }
    
    
    public function save() {//metodo abstracto del cliente
        //
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : FALSE;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : FALSE;
            $email = isset($_POST['email']) ? $_POST['email'] : FALSE;
            $password = isset($_POST['password']) ? $_POST['password'] : FALSE;

            if ($nombre && $apellidos && $email && $password) {
                $cliente = new cliente();
                $cliente->setNombre($nombre);
                $cliente->setApellidos($apellidos);
                $cliente->setEmail($email);
                $cliente->setPassword($password);
                
                $save = $cliente->save();
                
                if ($save) {
                    $_SESSION['register'] = "complete";
                    echo "<script> location.href='http://localhost/proyecto-poo/cliente/registro'; </script>";
                }
            } else {
                $_SESSION['register'] = "failed";
                echo "<script> location.href='http://localhost/proyecto-poo/cliente/registro'; </script>";
            }
        } else {
            $_SESSION['register'] = "failed";
            echo "<script> location.href='http://localhost/proyecto-poo/cliente/registro'; </script>";
        }
    }
    
    //cerrar sesion  :D 
    public function logout() {
        parent::logout();
          
    }


    
}
