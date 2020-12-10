<?php

include_once 'usuario.php';
class admin extends usuario {

    public function __construct() {
        parent::__construct();
    }

    public function save() {
        $sql = "INSERT INTO usuarios VALUES (NULL,'{$this->getNombre()}' , '{$this->getApellidos()}' , '{$this->getEmail()}' , '{$this->getPassword()}' , 'admin')";
        $save = $this->db->query($sql);

        if (!$save) {
            $result = false;
        }
        $result = true;
        return $result;
    }
       
    public function destacados() {//funcion para administrador
        $sql = "SELECT u.* , COUNT(u.id) AS 'compras' FROM usuarios u, pedidos p   WHERE  u.id = p.usuario_id GROUP BY u.id LIMIT 0,2;";
        $mayoresCompradores = $this->db->query($sql);

        $destacados['compradoresFrecuentes'] = $mayoresCompradores;
        $sql = "SELECT u.* , max(p.costo) AS 'mayorCompra' FROM usuarios u, pedidos p   WHERE  u.id = p.usuario_id GROUP BY u.id LIMIT 0,1;";
        $mayorPedido = $this->db->query($sql);

        $destacados['mayorPedido'] = $mayorPedido;


        return $destacados;
    }

}
