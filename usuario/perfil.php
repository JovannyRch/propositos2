<?php
include './../db.php';
session_start();
$id_usuario = $_SESSION['id_usuario'];

$db = new Db();


if (sizeof($_POST) > 0) {
    $nombre = $_POST['name'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];

    $query = "UPDATE usuarios set nombre = '$nombre' where id = '$id_usuario'";
    if ($pass1 != '' && $pass2 != '') {
        if ($pass1 == $pass2) {
            $hashedPass = md5($pass1);
            $query = "UPDATE usuarios set password = '$hashedPass', nombre = '$nombre' where id = '$id_usuario'";
        }
    }

    $res = $db->query($query);

    if (!empty($_FILES["image"]["name"])) {

        //file info 
        $file_name = basename($_FILES["image"]["name"]);
        $file_type = pathinfo($file_name, PATHINFO_EXTENSION);

        //make an array of allowed file extension
        $allowed_file_types = array('jpg', 'jpeg', 'png', 'gif');


        //check if upload file is an image
        if (in_array($file_type, $allowed_file_types)) {
            $tmp_image = $_FILES['image']['tmp_name'];
            $img_content = addslashes(file_get_contents($tmp_image));
            $query = "UPDATE usuarios set image = '$img_content' where id = '$id_usuario'";
            $res = $db->query($query);
        }
    }


    if ($res) {
        echo "Datos del usuario actualizados";
    }
}


$usuario = $db->row("SELECT * from usuarios where id  = '$id_usuario'");

if (is_null($usuario)) {

    echo "Datos del usuario no encontrado";
}

$img_file = base64_encode($usuario['image']);

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Propósitos</title>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../css/estilos.css" />
</head>

<body>

    <?php require '../config/nav.php' ?>



    <form action="perfil.php" method="post" enctype="multipart/form-data">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    <a href="../proposito/index.php" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>

            <h1>Perfil</h1>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </div>
            </div>

            <?php if (is_null($usuario['image'])) { ?>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <img src="../img/image-placeholder.png" class="img-thumbnail">
                    </div>
                </div>
            <?php } else { ?>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <img src="data:image/jpg;charset=utf8;base64,<?= $img_file; ?>" class="img-thumbnail">
                    </div>
                </div>
            <?php } ?>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Fotografía</label>
                        <input type="file" name="image" class="form-control" />
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="email" value="<?= $usuario['email'] ?>" class="form-control-plaintext" readonly>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" value="<?= $usuario['nombre'] ?>" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="pass1" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Confirmar</label>
                        <input type="password" name="pass2" class="form-control">
                    </div>
                </div>
            </div>

        </div>
    </form>

</body>

</html>