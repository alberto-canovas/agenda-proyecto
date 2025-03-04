<?php
    require_once __DIR__.'/ConexionModel.php';



    class ContactosModel{

        private $conexion;


        public function __construct() {
            $this->conexion = ConexionModel::connect();
        }


        public function obtenerContactosModel(){
            $consulta = "SELECT * FROM contactos";
            $stmt = $this->conexion->prepare($consulta);
            $stmt->execute();

            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }


        public function borrarContactoModelPorId($id){
            $consulta = "DELETE FROM contactos WHERE id_contacto = ?";
            $stmt = $this->conexion->prepare($consulta);
            $stmt->bind_param('i',$id);
            return  $stmt->execute();
        }


        public function obtenerContactoPorIdModelo($id){
            $consulta = "SELECT * FROM contactos WHERE id_contacto = ?";
            $stmt = $this->conexion->prepare($consulta);
            $stmt->bind_param('i',$id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }


        public function actualizarContacto($nombre,$email,$direccion,$tlf,$id){
            $consulta = "UPDATE contactos SET nombre = ?, email = ?, direccion = ?, tlf = ? WHERE id_contacto = ? ";
            $stmt=$this->conexion->prepare($consulta);
            $stmt->bind_param("sssii",$nombre,$email,$direccion,$tlf,$id);
            return $stmt->execute();
        }


        public function addContacto($nombre,$email,$direccion,$tlf){
            $consulta = "INSERT INTO contactos (nombre, email, direccion, tlf) VALUES (?,?,?,?)";
            $stmt = $this->conexion->prepare($consulta);
            $stmt->bind_param("sssi",$nombre,$email,$direccion,$tlf);
            return $stmt->execute();
        }

        
    }




?>