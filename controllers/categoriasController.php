<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class categoriasController{

    public function index() {
        Utils::isAdmin();
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $categoria = new categoria();
        $categorias = $categoria->paginacion($page);
        require_once 'views/categoria/index.php';
    }

    public function ver() {
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
            $productos = $producto->paginacion($page, 'categorias');
        }
        require_once 'views/categoria/ver.php';
    }

    public function crear() {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save() {
        Utils::isAdmin();

        //guardar la categoria
        if (isset($_POST) && isset($_POST['nombre'])) {


            $categoria = new categoria();
            $categoria->setNombre($_POST['nombre']);
            $save = $categoria->save();
        }
        echo "<script> location.href='http://localhost/web/categorias/index'; </script>";
    }

}
