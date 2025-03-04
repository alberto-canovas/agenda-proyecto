<?php

    require_once __DIR__.'/ConexionPDOModel.php';

class ContactosPDOModel{


    private $conexion;


    public function __construct() {
        $this->conexion = (new ConexionPDOModel())->getConexion();
        
        
    }


    public function obtenerContactosModelPDO(){
        $consulta = "SELECT * FROM contactos";
        $stmt = $this->conexion->prepare($consulta);
        $stmt -> execute();
        return $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }


    public function borrarContactoModelPDOPorId($id){
        $consulta = "DELETE FROM productos WHERE id_contacto = ?";
        $stmt = $this->conexion->prepare($consulta);
        $stmt -> bindParam(1,$id);
        return $stmt->execute();  
    }

    public function addContactoModelPDO($nombre, $email, $tlf, $direccion){
        $consulta ="INSERT INTO productos (nombre, email, tlf, direccion) VALUES(?,?,?,?)";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(1,$nombre);
        $stmt->bindParam(2,$email);
        $stmt->bindParam(3,$tlf);
        $stmt->bindParam(4,$direccion);
        return $stmt->execute();
    }


    public function actualizarContactoModelPDO($id,$nombre,$email,$tlf,$direccion){
        $consulta = "UPDATE contactos SET nombre = ?, email = ?, tlf=?, direccion=? WHERE id_contacto = ?";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(1,$nombre);
        $stmt->bindParam(2,$email);
        $stmt->bindParam(3,$tlf);
        $stmt->bindParam(4,$direccion);
        $stmt->bindParam(5,$id);

        return $stmt->execute();

    }





}





?>