<?php

require_once __DIR__ . '/../Controllers/AgendaController.php';

$agendaController = new AgendaController;

if (isset($_GET['id_contacto'])) {
    //FORM EDITAR

    $idEditar = $_GET['id_contacto'];

    

    //print_r($agendaController -> obtenerContactoPorIdController($idEditar));

    $contactoaEditar=$agendaController -> obtenerContactoPorIdController($idEditar);


    if (!$_POST) {
        $errores[] = '';

    } else {


        //CONTROL ERRORES NOMBRE
        if (!isset($_POST['nombre']) || $_POST['nombre']=='') {
            $errores['nombre'] = 'El campo nombre no puede estar vacío';
        } elseif (strlen($_POST['nombre']) < 3) {
            $errores['nombre'] = 'El campo nombre tiene que tener más de 2 letras';
        } elseif (is_numeric($_POST['nombre'])) {
            $errores['nombre'] = 'El campo nombre no puede tener números';
        } else {
            $nombre = $_POST['nombre'];
        }


        //CONTROL ERRORES EMAIL
        if (!isset($_POST['email']) || $_POST['email']=='') {
            $errores['email'] = 'El campo email no puede estar vacío';
        } else {
            $email = $_POST['email'];
        }


        //CONTROL ERRORES TLF
        if (!isset($_POST['tlf']) || $_POST['tlf']=='') {
            $errores['tlf'] = 'El campo tlf no puede estar vacío';
        } elseif (!is_numeric($_POST['tlf'])) {
            $errores['tlf'] = 'El campo tfl es un número';
        } else {
            $tlf = $_POST['tlf'];
        }

        //CONTROL ERRORES DIRECCIÓN
        if (!isset($_POST['direccion']) || $_POST['direccion']=='') {
            $errores['direccion'] = 'El campo direccion no puede estar vacío';
        } elseif (strlen($_POST['direccion']) < 3) {
            $errores['direccion'] = 'El campo direccion tiene que tener más de 2 letras';
        } else {
            $direccion = $_POST['direccion'];
        }


        if (isset($errores)) {
            foreach($errores as $error){
                print_r($error);
            }
            
        } else {
           $agendaController->actualizarContactoControllerPDO($nombre,$email,$tlf,$direccion,$idEditar);
           //$agendaController->actualizarContactoController($nombre,$email,$tlf,$direccion,$idEditar);
           echo 'El contacto '. $nombre. ' ha sido actualizado';
            
        }


    }

    ?>

    <link rel="stylesheet" href="style.css">

    <body>

        <h1>EDITAR CONTACTO</h1>
        <form method="post">
            <label for="nombre">NOMBRE</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $contactoaEditar['nombre'] ?> ">
            <p style="color:red;"><?php if(isset($errores['nombre'])){ echo($errores['nombre']); }?></p>


            <label for="email">EMAIL</label>
            <input type="email" name="email" id="email" value=" <?php echo $contactoaEditar['email']?>">
            <p style="color:red;"><?php if(isset($errores['email'])){ echo($errores['email']); }?></p>


            <label for="tlf">TELÉFONO</label>
            <input type="text" name="tlf" id="tlf" value="<?php echo $contactoaEditar['tlf']?>">
            <p style="color:red;"><?php if(isset($errores['tlf'])){ echo($errores['tlf']); }?></p>


            <label for="direccion">DIRECCION</label>
            <input type="text" name="direccion" id="direccion" value="<?php echo $contactoaEditar['direccion']?>">
            <p style="color:red;"><?php if(isset($errores['direccion'])){ echo($errores['direccion']); }?></p>


            <input type="submit" value="Enviar">
        </form>
        <form action="AgendaView.php" method="post">
            <input type="submit" value="VOLVER">
        </form>
    </body>
    
    <?php


} else {

    //CONTROL ERRORES AÑADIR

    if (!$_POST) {
        $errores[]="";

    } else {


        //CONTROL ERRORES NOMBRE
        if (!isset($_POST['nombre']) || $_POST['nombre']=='') {
            $errores['nombre'] = 'El campo nombre no puede estar vacío';
        } elseif (strlen($_POST['nombre']) < 3) {
            $errores['nombre'] = 'El campo nombre tiene que tener más de 2 letras';
        } elseif (is_numeric($_POST['nombre'])) {
            $errores['nombre'] = 'El campo nombre no puede tener números';
        } else {
            $nombre = $_POST['nombre'];
        }


        //CONTROL ERRORES EMAIL
        if (!isset($_POST['email']) || $_POST['email']=='') {
            $errores['email'] = 'El campo email no puede estar vacío';
        } else {
            $email = $_POST['email'];
        }


        //CONTROL ERRORES TLF
        if (!isset($_POST['tlf']) || $_POST['tlf']=='') {
            $errores['tlf'] = 'El campo tlf no puede estar vacío';
        } elseif (!is_numeric($_POST['tlf'])) {
            $errores['tlf'] = 'El campo tfl es un número';
        } else {
            $tlf = $_POST['tlf'];
        }

        //CONTROL ERRORES DIRECCIÓN
        if (!isset($_POST['direccion']) || $_POST['direccion']=='') {
            $errores['direccion'] = 'El campo direccion no puede estar vacío';
        } elseif (strlen($_POST['direccion']) < 3) {
            $errores['direccion'] = 'El campo direccion tiene que tener más de 2 letras';
        } else {
            $direccion = $_POST['direccion'];
        }


        if (isset($errores)) {
            // foreach($errores as $error){
            //     print_r($error);
            // }
            
        } else {
            //función añadir contacto
            $addContacto = new AgendaController;
            $addContacto->addContactoController($nombre,$email,$tlf,$direccion);
            
        }
    }

    ?>

    <!-- FORM AÑADIR CONTACTO -->
    <link rel="stylesheet" href="style.css">

    <body>

        <h1>AÑADIR CONTACTO</h1>
        <form method="post">
            <label for="nombre">NOMBRE</label>
            <input type="text" name="nombre" id="nombre">
            <p style="color:red;"><?php if(isset($errores['nombre'])){ echo($errores['nombre']); }?></p>

            <label for="email">EMAIL</label>
            <input type="email" name="email" id="email">
            <p style="color:red;"><?php if(isset($errores['email'])){ echo($errores['email']); }?></p>


            <label for="tlf">TELÉFONO</label>
            <input type="text" name="tlf" id="tlf">
            <p style="color:red;"><?php if(isset($errores['tlf'])){ echo($errores['tlf']); }?></p>


            <label for="direccion">DIRECCION</label>
            <input type="text" name="direccion" id="direccion">
            <p style="color:red;"><?php if(isset($errores['direccion'])){ echo($errores['direccion']); }?></p>


            <input type="submit" value="Enviar">
        </form>
        <form action="AgendaView.php" method="post">
            <input type="submit" value="VOLVER">
        </form>
    </body>
    
    
    <?php

}

?>