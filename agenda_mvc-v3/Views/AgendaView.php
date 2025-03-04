<?php
    require_once __DIR__ . '/../Controllers/AgendaController.php';

    $contactos = new AgendaController;

    //print_r($contactos->ObtenerContactosController());

    //$listaContactos = $contactos->obtenerContactosController();
    $listaContactos = $contactos->obtenerContactosControllerPDO();


    
    
    //comprobamos que botón se ha pulsado
    
    if(isset($_POST['crear'])){
        echo 'has pulsado crear ';
        header('Location: AddEditView.php');
        exit();
        
    }elseif(isset($_POST['borrar']) && isset($_POST['id_contacto'])){
        $id = $_POST['id_contacto'];
        $contactoEliminado = $contactos->borrarContactoControllerPorId($id);


    }elseif(isset($_POST['editar']) && isset($_POST['id_contacto'])){
        $id = $_POST['id_contacto'];

        //le pasamos a la url el id_contacto seleccionado

        header('Location: AddEditView.php?id_contacto='.$id);

        exit();
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
    <table>
        <thead>
            <tr>
                <th>BORRAR</th>
                <th>EDITAR</th>
                <th>ID</th>
                <th>NOMBRE</th>
                <TH>EMAIL</TH>
                <th>TELÉFONO</th>
                <th>DIRECCION</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($listaContactos as $contacto){ ?>
                <form method="post">

                    <tr>
                        <td>
                            <input type="submit" value="Borrar" name="borrar">
                            <input type="hidden" value="<?php echo $contacto['id_contacto']?>" name="id_contacto" >
                        </td>
                        <td>
                            <input type="submit" value="Editar" name="editar">
                            <input type="hidden" value="<?php echo $contacto['id_contacto']?>" name="id_contacto" >
                        </td>
                        <td><?php echo $contacto['id_contacto'] ?></td>
                        <td><?php echo $contacto['nombre'] ?></td>
                        <td><?php echo $contacto['email'] ?></td>
                        <td><?php echo $contacto['tlf'] ?></td>
                        <td><?php echo $contacto['direccion'] ?></td>
                    </tr>
                </form>




            <?php } ?>
        </tbody>

    </table>
    <form method="post">
        <input type="submit" value="Crear nuevo contacto" name="crear">
    </form>


    
</body>
</html>