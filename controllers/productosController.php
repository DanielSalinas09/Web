<?php

require_once 'models/producto.php';

class productosController{

    public function index() {
        if (isset($_POST) & isset($_POST['search'])) {
            $search = $_POST['search'];

            $producto = new producto();
            $productos = $producto->search($search);
            require_once 'views/producto/destacados.php';
        } else {


            $producto = new producto();
            $productos = $producto->getRamdom(6);

            require_once 'views/producto/destacados.php';
        }
    }

    public function ver() {
//        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $producto = new producto();
            $producto->setId($id);

            $product = $producto->getOne();
        }
        require_once 'views/producto/ver.php';
    }

    public function gestion() {
        Utils::isAdmin();

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $producto = new producto();
        $agotados = $producto->getAgotados()->fetch_object();
        $productos = $producto->paginacion($page, 'productos');

        require_once 'views/producto/gestion.php';
    }

    public function crear() {
        Utils::isAdmin();
        require_once 'views/producto/crear.php';
    }

    public function save() {
        Utils::isAdmin();
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $marca = isset($_POST['marca']) ? $_POST['marca'] : false;
            $socket = isset($_POST['socket']) ? $_POST['socket'] : false;
            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                $save = false;
                $producto = new producto();
                $producto->setNombre($_POST['nombre']);
                $producto->setDescripcion($_POST['descripcion']);
                $producto->setPrecio($_POST['precio']);
                $producto->setCategoria_id($_POST['categoria']);
                $producto->setStock($_POST['stock']);
                $producto->setMarca($_POST['marca']);
                $producto->setSocket($_POST['socket']);
                // Guardar la imagen

                if (isset($_FILES['imagen'])) {
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];
                    if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {
                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }
                        $producto->setImagen($filename);
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    }
                }
                if (isset($_GET['id'])) {
                    $producto->setId($_GET['id']);
                    $_SESSION['editar'] = "complete";
                    if(isset($_POST['inputOferta']) && is_numeric($_POST['inputOferta'])){
                         $save = $producto->edit($_POST['inputOferta']);
                    }else{
                        $save = $producto->edit('null'); 
                    }
                   
                } else {
                    $save = $producto->save('null');
                }
                if ($save) {
                    $_SESSION['producto'] = "complete";
                } else {
                    $_SESSION['producto'] = "failed";
                }
            } else {
                $_SESSION['producto'] = "failed";
            }
        } else {
            $_SESSION['producto'] = "failed";
        }
        echo "<script> location.href='http://localhost/web/productos/gestion&page=1'; </script>";
    }

    public function editar() {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $edit = true;

            $producto = new producto();
            $producto->setId($id);

            $pro = $producto->getOne();

            require_once 'views/producto/crear.php';
        } else {
            echo "<script> location.href='http://localhost/web/productos/gestion&page=1'; </script>";
        }
    }

    public function eliminar() {
        Utils::isAdmin();

        if (isset($_GET['id'])) {
            $producto = new producto();
            $producto->setId($_GET['id']);
            $delete = $producto->delete();
            if ($delete) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        } else {
            $_SESSION['delete'] = 'failed';
        }
        echo "<script> location.href='http://localhost/web/productos/gestion&page=1'; </script>";
    }

    public function agotado() {
        Utils::isAdmin();
        
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $producto = new producto();
        $agotados = $producto->getAgotados()->fetch_object();
        $productos = $producto->paginacion($page, 'agotados');

        require_once 'views/producto/agotados.php';
    }

}
