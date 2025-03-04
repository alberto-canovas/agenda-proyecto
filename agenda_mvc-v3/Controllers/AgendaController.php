<?php
    require_once __DIR__.'/../Models/ContactosModel.php';
    require_once __DIR__.'/../Models/ContactosPDOModel.php';

class AgendaController{

    private $contactosModel;
    private $contactosPDOModel;


    public function __construct() {
        $this->contactosModel = new ContactosModel;
        $this->contactosPDOModel = new ContactosPDOModel;

    }


    public function obtenerContactosController(){
        try {
            $contactos = $this->contactosModel->obtenerContactosModel();
            return $contactos;
            
        }catch(Exception $exception){
            return 'Error al obtener los contactos'. $exception->getMessage();
        }
    }

    public function obtenerContactosControllerPDO(){
        try{
            $listaContactos=$this->contactosPDOModel->obtenerContactosModelPDO();

            return $listaContactos;
        }catch(Exception $exception){
            return 'Error al obtener contactos PDO'. $exception->getMessage();
        }
    }

    public function borrarContactoControllerPorId($id){
        try{
            $contactoBorrado = $this->contactosModel->borrarContactoModelPorId($id);
            echo 'Contacto eliminado correctamente';
            return $contactoBorrado;

        }catch(Exception $exception){
            return 'Error al borrar el contacto'. $exception->getMessage();

        }
    }


    public function addContactoController($nombre,$email,$tlf,$direccion){
        try{
            $contactoAdd = $this->contactosModel->addContacto( $nombre,$email,  $direccion,$tlf);
            echo 'Contacto añadido correctamente';
            return $contactoAdd;

        }catch(Exception $exception){
            return 'Error al añadir el contacto'. $exception->getMessage();
        }

    }

    public function actualizarContactoController($nombre,$email,$tlf,$direccion,$id){
        try{
            $contactoActualizado = $this->contactosModel->actualizarContacto( $nombre,$email,  $direccion,$tlf,$id);
            //echo 'Contacto actualizado correctamente';
            return $contactoActualizado;

        }catch(Exception $exception){
            return 'Error al actualizar el contacto'. $exception->getMessage();
        }

    }
    public function actualizarContactoControllerPDO($nombre,$email,$tlf,$direccion,$id){
        try{
            $contactoActualizado = $this->contactosPDOModel->actualizarContactoModelPDO( $id,$nombre,$email,  $tlf,$direccion);
            //echo 'Contacto actualizado correctamente';
            return $contactoActualizado;

        }catch(Exception $exception){
            return 'Error al actualizar el contacto'. $exception->getMessage();
        }

    }


    public function obtenerContactoPorIdController($id){
        $contactoPorId = $this->contactosModel->obtenerContactoPorIdModelo($id);
        return $contactoPorId;
    }












}




?>