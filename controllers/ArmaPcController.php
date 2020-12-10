<?php

require_once 'models/ArmaPc.php';
require_once 'models/producto.php';

class ArmaPcController {

    public function index() {
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            //conseguir categoria
            $categoria = new categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();

            //conseguir productos
            $producto = new producto();
            $producto->setCategoria_id($id);
            $productos = $producto->paginacion($page);
        }


        require_once 'views/ArmaPc/index.php';
    }

    public function procesadores() {

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        if (isset($_GET['marca'])) {
            $marca = $_GET['marca'];
            $producto = new ArmaPc;
            $producto->setMarca($marca);
            $productos = $producto->getAllProcesadores($page);


            require_once 'views/ArmaPc/procesadores.php';
        } else {
            echo "<script> location.href='http://localhost/web/ArmaPc/index'; </script>";
        }
    }

    public function board() {
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        if (isset($_GET['marca'])) {
            $marca = $_GET['marca'];
            $producto = new ArmaPc;
            $producto->setMarca($marca);
            $productos = $producto->getAllBoard($page);

            require_once 'views/ArmaPc/board.php';
        } else {
            echo "<script> location.href='http://localhost/web/ArmaPc/index'; </script>";
        }
    }

    public function ram() {
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        if (isset($_GET['socket'])) {
            $socket = $_GET['socket'];
            $producto = new ArmaPc;
            $producto->setSocket($socket);
            $productos = $producto->getAllRam($page);

            require_once 'views/ArmaPc/ram.php';
        } else {
            echo "<script> location.href='http://localhost/web/ArmaPc/index'; </script>";
        }
    }

    public function discoDuroMecanico() {
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $producto = new ArmaPc;
        $productos = $producto->getAllDiscoDuro('disco duro mecanico', $page);

        require_once 'views/ArmaPc/discoDuroMecanico.php';
    }

    public function discoDuroSolido() {
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $producto = new ArmaPc;
        $productos = $producto->getAllDiscoDuro('disco duro estado solido', $page);

        require_once 'views/ArmaPc/discoDuroSolido.php';
    }

    public function tarjetaGrafica() {
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $producto = new ArmaPc;
        $productos = $producto->getAllTargetaGrafica($page);

        require_once 'views/ArmaPc/grafica.php';
    }

    public function chazis() {
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $producto = new ArmaPc;
        $productos = $producto->getAllchazis($page);

        require_once 'views/ArmaPc/chazis.php';
    }

    public function seleccionProcesador() {

        $marca = $_GET['marca'];
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            echo "<script> location.href='http://localhost/web/Armapc/index'; </script>";
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        echo "<script> location.href='http://localhost/web/ArmaPc/board&marca=" . $marca . "&page=1'; </script>";
    }

    public function seleccionBoard() {
        $socket = $_GET['socket'];
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            echo "<script> location.href='http://localhost/web/Armapc/index'; </script>";
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        echo "<script> location.href='http://localhost/web/ArmaPc/ram&socket=" . $socket . "&page=1'; </script>";
    }

    public function seleccionRam() {
        $id = $_GET['id'];
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            echo "<script> location.href='http://localhost/web/Armapc/index'; </script>";
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        echo "<script> location.href='http://localhost/web/ArmaPc/discoDuroMecanico&page=1'; </script>";
    }

    public function seleccionDDMecanico() {
        $id = $_GET['id'];
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            echo "<script> location.href='http://localhost/web/Armapc/index'; </script>";
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        echo "<script> location.href='http://localhost/web/ArmaPc/discoDuroSolido&page=1'; </script>";
    }

    public function seleccionDDSolido() {
        $id = $_GET['id'];
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            echo "<script> location.href='http://localhost/web/Armapc/index'; </script>";
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        echo "<script> location.href='http://localhost/web/ArmaPc/tarjetaGrafica&page=1'; </script>";
    }

    public function seleccionGrafica() {
        $id = $_GET['id'];
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            echo "<script> location.href='http://localhost/web/Armapc/index'; </script>";
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades'] ++;
                    $counter++;
                }
            }
        }

        if (!isset($counter) || $counter == 0) {
            // Conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // Añadir al carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        echo "<script> location.href='http://localhost/web/ArmaPc/chazis&page=1'; </script>";
    }


}
