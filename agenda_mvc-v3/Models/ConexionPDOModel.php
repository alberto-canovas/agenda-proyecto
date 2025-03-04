<?php

class ConexionPDOModel{

    private $conexion;
    private $server = 'localhost';
    private $bdName = 'agenda';
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