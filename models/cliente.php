<?php

include_once 'usuario.php';
class cliente extends usuario {

    


    public function __construct() {
        parent::__construct();
    }

    public function save() {
        $sql = "INSERT INTO usuarios VALUES (NULL,'{$this->getNombre()}' , '{$this->getApellidos()}' , '{$this->getEmail()}' , '{$this->getPassword()}' , 'user')";
        $save = $this->db->query($sql);

        if (!$save) {
            $result = false;
        }
        $result = true;
        return $result;
    }

}
