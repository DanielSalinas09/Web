<?php

require_once 'models/admin.php';

/*
  crear controlador de cliente y administrador usuario pasaria a ser abstracta
  crear moelo de cliente y administraor :D
 */

class adminController extends usuarioController {

    public function save() {//metodo abstracto del cliente
        //
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : FALSE;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : FALSE;
            $email = isset($_POST['email']) ? $_POST['email'] : FALSE;
            $password = isset($_POST['password']) ? $_POST['password'] : FALSE;

            if ($nombre && $apellidos && $email && $password) {

                $admin = new admin();

                $admin->setNombre($nombre);
                $admin->setApellidos($apellidos);
                $admin->setEmail($email);
                $admin->setPassword($password);

                $save = $admin->save();

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

    public function registroAdmin() {
        require_once 'views/usuario/registroAdmin.php';
    }

    public function destacados() {
        Utils::isAdmin();
        $destacados = new admin();
        $destacados = $destacados->destacados();

        require_once 'views/usuario/destacados.php';
    }

}
