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
                <div class="text-right"></div>

                <h1>Todos mis propósitos</h1>

                <a href="guardar.php" type="button" class="btn btn-primary text-white">Nuevo propósito</a>

                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Propósito</th>
                            <th>Vencimiento</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Propósito de año nuevo 1</td>
                            <td>2020-02-01</td>
                            <td><button class="btn btn-danger btn-sm">Eliminar</button></td>
                            <td><button class="btn btn-secondary btn-sm">Actualizar</button></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</body>

</html>