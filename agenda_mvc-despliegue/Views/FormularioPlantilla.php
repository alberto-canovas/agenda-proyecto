<?php

if(!$_POST){
    $errores=[];

}else{

    //CONTROL ERRORES NOMBRE
    if(!isset($_POST['nombre'])||$_POST['']){
        $errores['nombre']='El campo nombre no puede estar vacío';
    }elseif(strlen($_POST['nombre'])<3){
        $errores['nombre'] = 'El campo nombre tiene que tener más de 2 letras';
    }elseif(is_numeric($_POST['nombre'])){
        $errores['nombre']= 'El campo nombre no puede tener números';
    }else{
        $nombre = $_POST['nombre'];
    }


    //CONTROL ERRORES EMAIL
    if(!isset($_POST['email'])||$_POST['']){
        $errores['email']='El campo email no puede estar vacío';
    }else{
        $email=$_POST['email'];
    }


    //CONTROL ERRORES TLF
    if(!isset($_POST['tlf'])||$_POST['']){
        $errores['tlf'] = 'El campo tlf no puede estar vacío';
    }elseif(!is_numeric($_POST['tlf'])){
        $errores['tlf'] = 'El campo tfl es un número';
    }else{
        $tlf = $_POST['tlf'];
    }

    //CONTROL ERRORES DIRECCIÓN
    if(!isset($_POST['direccion'])||$_POST['']){
        $errores['direccion'] = 'El campo direccion no puede estar vacío';
    }elseif(strlen($_POST['direccion'])<3){
        $errores['direccion'] = 'El campo direccion tiene que tener más de 2 letras';
    }else{
        $direccion = $_POST['direccion'];
    }


    if($errores[]=''){
        //función añadir o editar contacto

    }else{
        print_r($errores);
    }


}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form method="post" action="AgendaView.php">
        <label for="nombre">NOMBRE</label>
        <input type="text" name="nombre" id="nombre">

        <label for="email">EMAIL</label>
        <input type="email" name="email" id="email">

        <label for="tlf">TELÉFONO</label>
        <input type="text" name="tlf" id="tlf">

        <label for="direccion">DIRECCION</label>
        <input type="text" name="direccion" id="direccion">

        <input type="submit" value="Enviar">
    </form>
</body>
</html>