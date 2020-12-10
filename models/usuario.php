<?php

abstract class usuario extends Database {

    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $tipo; // no va 

    public function __construct() {
        $this->db = Database::conect();
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getTipo() {
        return $this->tipo;
    }
    function setId($id) {
        $this->id = $this->db->real_escape_string($id);
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos) {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    abstract function save();
  

    public function login() {
     
        $result = false;
        $email = $this->email;
        $password = $this->password;
        $sql = "SELECT*FROM usuarios WHERE email='$email';";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();


            $verify = password_verify($password, $usuario->password);

            if ($verify) {
                $result = $usuario;
            }
        }
        return $result;
    }



}
