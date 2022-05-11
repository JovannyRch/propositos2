<?php
include './../db.php';

$id = null;

if (sizeof($_GET) > 0) {
    $id = $_GET['id'];
}

$db = new Db();
$id_proposito = "";


$query = "SELECT * from propositos where id = '$id'";


$proposito = $db->row($query);

if (!is_null($proposito)) {
    $id_proposito = $proposito['id_proposito'];
} else {
    $proposito = array('proposito' => '', 'vencimiento' => '');
}

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

    <form action="guardar.php" method="post">
        <div class="container">

            <div class="row mb-5">
                <div class="col-md-12">
                    <h1>Propósito</h1>

                    <a href="index.php" class="btn btn-secondary">Cancelar</a>
                    <input type="submit" name="accion" value="Guardar" class="btn btn-primary">
                    <input type="hidden" name="id_proposito" value="<?= $id_proposito ?>" />
                </div>
            </div>


            <?php if (is_null($id)) { ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row ">
                    <div class="col-md-6">
                        <img src="../img/image-placeholder.png" class="img-thumbnail">
                    </div>
                <?php } ?>

                <div class="row ">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Propósito</label>
                            <input type="text" value="<?= $proposito['proposito'] ?>" name="proposito" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Fecha de vencimiento</label>
                            <input type="date" name="vencimiento" value="<?= $proposito['vencimiento'] ?>" class="form-control" />
                        </div>
                    </div>
                </div>

                <!--  <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Imagen</label>
            <input type="file" name="imagen" class="form-control" />
        </div>
    </div>
</div> -->
                </div>
    </form>

</body>

</html>