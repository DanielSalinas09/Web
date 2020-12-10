<?php

class Database {
    private $db;
    public static function conect() {
        $db = new mysqli('localhost', 'root', '', 'tienda_tecnologia');
        $db->query("SET NAMES 'utf8'");
        return $db;
    }

}
