<?php
include './../db.php';
session_start();


if (sizeof($_POST) > 0) {

    $proposito = $_POST['proposito'];
    $vencimiento = $_POST['vencimiento'];
    $id_usuario = $_SESSION['id_usuario'];



    try {
        $query = "INSERT INTO propositos(proposito, vencimiento, id_usuario) values('$proposito', '$vencimiento', $id_usuario)";

        $db = new Db();
        $res = $db->insert($query);


        if ($res) {
            header("Location: index.php");
        } else {
            echo "Error al crear el propósito";
        }
    } catch (\Throwable $th) {
        echo $th;
    }
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


</head>

<body>

    <?php require '../config/nav.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <a href="index.php" type="button" class="btn btn-primary text-white mt-4">Todos mis propósitos</a>

                <form action="guardar.php" method="post" class="mt-4">

                    <div class="row">
                        <div class="col-md-12">
                            <h1>Propósito</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Propósito</label>
                                <input type="text" name="proposito" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fecha de vencimiento</label>
                                <input type="date" name="vencimiento" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>