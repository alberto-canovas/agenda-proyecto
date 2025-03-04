<?php
class ConexionModel{


    private static $conexion = null;
    private static $server = 'localhost';
    private static $pass = '';
    private static $username = 'root';
    private static $bdName = 'agenda';


    public static function connect(){
        if(self::$conexion == null){
            try{
                self::$conexion = new mysqli(self::$server,self::$username,self::$pass,self::$bdName);
                //echo "Conexión establecida";
            }catch(Exception $exception){
                return "Error al crear la conexión". $exception->getMessage();
            }
        }
        return self::$conexion;
    }


}








?>