<?php

class ConexionPDOModel{

    private $conexion;
    private $server = 'db5017330343.hosting-data.io';
    private $bdName = 'dbs13897525';
    private $username = 'root';
    private $pass = '';


    public function __construct() {
        $this->conexion = new PDO("mysql:host=$this->server;dbname=$this->bdName", $this->username, $this->pass);
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }


    
    public function getConexion(){
        echo 'conexion EStablecida PDO';
        return $this->conexion;
    }


}

?>