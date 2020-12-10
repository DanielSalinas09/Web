<?php

class pedido extends Database{

    private $id;
    private $usuario_id;
    private $departamento;
    private $ciudad;
    private $direccion;
    private $costo;
    private $estado;
    private $fecha;
    private $hora;
    private $metodoPago;

    function __construct() {
        $this->db = Database::conect();
    }

    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getDepartamento() {
        return $this->departamento;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCosto() {
        return $this->costo;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }
    function getMetodoPago() {
        return $this->metodoPago;
    }

    function setMetodoPago($metodoPago) {
        $this->metodoPago = $metodoPago;
    }

    
    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setDepartamento($departamento) {
        $this->departamento = $this->db->real_escape_string($departamento);
    }

    function setCiudad($ciudad) {
        $this->ciudad = $this->db->real_escape_string($ciudad);
    }

    function setDireccion($direccion) {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setCosto($costo) {
        $this->costo = $costo;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    public function save() {
        $sql = "INSERT INTO pedidos VALUES(NULL, {$this->getUsuario_id()}, '{$this->getDepartamento()}', '{$this->getCiudad()}', '{$this->getDireccion()}', {$this->getCosto()}, 'confirmado', CURDATE(), CURTIME(), '{$this->getMetodoPago()}');";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function saveProductosPedidos() {
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";

        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];
            $insert = "INSERT INTO productos_pedidos VALUES(null,{$pedido_id},{$producto->id},{$elemento['unidades']})";
            $save = $this->db->query($insert);
        }

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function getOne() {
       
        $sql="SELECT * FROM pedidos WHERE id = {$this->getId()};";
        
        $productos = $this->db->query($sql);
        return $productos->fetch_object();
    }

    public function getOneUser() {
        $sql = "SELECT p.id, p.costo,p.MetodoPago FROM pedidos p "
                . "INNER JOIN productos_pedidos pp ON pp.pedido_id = p.id "
                . "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1;";

        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }
        public function getAllOneByUser($page) {
            
        $sql = "SELECT p.* FROM pedidos p "
                . "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC ;";

        $pedido = $this->db->query($sql);
          
        $LI = (($page - 1) * 12);
        $pedidos[1] = ceil($pedido->num_rows/12);
        $sql = "SELECT p.* FROM pedidos p "
                . "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT $LI,12;";
  
        $pedidos[2] = $this->db->query($sql);     
        return $pedidos;
            
       

        $pedido = $this->db->query($sql);
        return $pedido;
    }

    public function getProdictosByPedidos($id) {

                
        $sql=" SELECT PR.*, pp. unidades FROM productos PR "
                . "INNER JOIN productos_pedidos pp ON pr.id = pp.producto_id WHERE PP.pedido_id ={$id};";       
                
                
        $productos = $this->db->query($sql);

        return $productos;
    }

    public function getAll() {
        $sql="SELECT * FROM pedidos ORDER BY id DESC;";
        $productos = $this->db->query($sql);
        return $productos;
    }
    
    public function edit(){
        $sql = "UPDATE  pedidos SET estado='{$this->getEstado()}'";

           $sql.="WHERE id ={$this->getId()};";
        
        $edit=$this->db->query($sql);
        $result = false;
        if($edit){
                $result = true;
        }
        return $result;
    }

     public function paginacion($page) {      
        $sql = "SELECT * FROM pedidos ORDER BY id DESC;";

        $producto = $this->db->query($sql);
          
        $LI = (($page - 1) * 21);
        $pedidos[1] = ceil($producto->num_rows/21);
        $sql = "SELECT * FROM pedidos "
                . "ORDER BY id DESC LIMIT $LI,21;";

        $pedidos[2] = $this->db->query($sql);     
        return $pedidos;
      }

    
    
}
