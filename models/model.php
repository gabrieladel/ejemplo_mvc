<?php

class Service {
    
    private $servicio;
    private $db;

    public function __construct() {
        $this->servicio = array();
        $this->db = new PDO('mysql:host=127.0.0.1:3308;dbname=ejemplo_mvc', "root", "");
    }

    private function setNames() {
        return $this->db->query("SET NAMES 'utf8'");
    }

    public function getServicios() {

        self::setNames();
        $sql = "SELECT id, nombre, precio FROM servicio";
        foreach ($this->db->query($sql) as $res) {
            $this->servicio[] = $res;
        }
        return $this->servicio;
    }

    public function setServicio($nombre, $precio) {

        self::setNames();
        $sql = "INSERT INTO servicio(nombre, precio) VALUES ('" . $nombre . "', '" . $precio . "')";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
?>