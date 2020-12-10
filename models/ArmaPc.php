<?php

class ArmaPc extends Database {

    private $id;
    private $nombre;
    private $marca;
    private $socket;

    public function __construct() {
        $this->db = Database::conect();
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDb() {
        return $this->db;
    }

    function getMarca() {
        return $this->marca;
    }

    function getSocket() {
        return $this->socket;
    }

    function setSocket($socket) {
        $this->socket = $socket;
    }

    function setMarca($marca) {
        $this->marca = $marca;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDb($db) {
        $this->db = $db;
    }

    public function getAllProcesadores($page) {
        $sql = "SELECT * FROM productos WHERE tipo='{$this->getMarca()}' and categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'procesadores');";

        $producto = $this->db->query($sql);

        $LI = (($page - 1) * 6);
        $productos[1] = ceil($producto->num_rows / 6);
        $sql = "SELECT * FROM productos WHERE tipo='{$this->getMarca()}' and categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'procesadores')"
                . "ORDER BY id DESC LIMIT $LI,6;";


        $productos[2] = $this->db->query($sql);




        return $productos;
    }

    public function getAllBoard($page) {

        $sql = "SELECT * FROM productos WHERE tipo='{$this->getMarca()}' and categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'boards');";

        $producto = $this->db->query($sql);

        $LI = (($page - 1) * 6);
        $productos[1] = ceil($producto->num_rows / 6);

        $sql = "SELECT * FROM productos WHERE tipo='{$this->getMarca()}' and categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'boards') "
                . "ORDER BY id DESC LIMIT $LI,6;";

        $productos[2] = $this->db->query($sql);


        return $productos;
    }

    public function getAllRam($page) {
        $sql = "SELECT * FROM productos WHERE socket='{$this->getSocket()}' and categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'memorias RAM');";
        $producto = $this->db->query($sql);

        $LI = (($page - 1) * 6);
        $productos[1] = ceil($producto->num_rows / 6);

        $sql = "SELECT * FROM productos WHERE socket='{$this->getSocket()}' and categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'memorias RAM')"
                . "ORDER BY id DESC LIMIT $LI,6;";


        $productos[2] = $this->db->query($sql);



        return $productos;
    }

    public function getAllDiscoDuro($tipo, $page) {
        $sql = "SELECT * FROM productos WHERE categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = '{$tipo}');";
        $producto = $this->db->query($sql);

        $LI = (($page - 1) * 6);
        $productos[1] = ceil($producto->num_rows / 6);

        $sql = "SELECT * FROM productos WHERE categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = '{$tipo}')"
                . "ORDER BY id DESC LIMIT $LI,6;";



        $productos[2] = $this->db->query($sql);


        return $productos;
    }

    public function getAllTargetaGrafica($page) {
        $sql = "SELECT * FROM productos WHERE categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'tarjeta grafica');";
        $producto = $this->db->query($sql);

        $LI = (($page - 1) * 6);
        $productos[1] = ceil($producto->num_rows / 6);

        $sql = "SELECT * FROM productos WHERE categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'tarjeta grafica')"
                . "ORDER BY id DESC LIMIT $LI,6;";



        $productos[2] = $this->db->query($sql);




        return $productos;
    }

    public function getAllChazis($page) {
        $sql = "SELECT * FROM productos WHERE categoria_id= "
                . "( SELECT id FROM categorias WHERE nombre = 'chazis');";
        
        $producto = $this->db->query($sql);

        $LI = (($page - 1) * 6);
        $productos[1] = ceil($producto->num_rows / 6);

        $sql = "SELECT * FROM productos WHERE categoria_id= "
        . "( SELECT id FROM categorias WHERE nombre = 'chazis')"
        . "ORDER BY id DESC LIMIT $LI,6;";



        $productos[2] = $this->db->query($sql);


        return $productos;
    }

    public function getOne() {
        $categoria = $this->db->query("SELECT * FROM categorias WHERE id = {$this->getId()};");
        return $categoria->fetch_object();
    }

    public function save() {
        $sql = "INSERT INTO categorias VALUES (NULL,'{$this->getNombre()}')";
        $save = $this->db->query($sql);



        if (!$save) {
            $result = false;
        }
        $result = true;
        return $result;
    }

}
