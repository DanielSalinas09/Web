<?php

class categoria extends Database{

    private $id;
    private $nombre;

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

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDb($db) {
        $this->db = $db;
    }

    public function getAll() {
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");
        return $categorias;
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


 public function paginacion($page) {      
        $sql = "SELECT * FROM categorias ORDER BY id DESC;";

        $producto = $this->db->query($sql);
          
        $LI = (($page - 1) * 21);
        $categorias[1] = ceil($producto->num_rows/21);
        $sql = "SELECT * FROM categorias "
                . "ORDER BY id DESC LIMIT $LI,21;";

        $categorias[2] = $this->db->query($sql);
    
  
        
      
        return $categorias;
      }
}
