<?php
class ConexionModel{


    private static $conexion = null;
    private static $server = 'db5017330343.hosting-data.io';
    private static $pass = '';
    private static $username = 'dbu1152138';
    private static $bdName = 'dbs13897525';


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