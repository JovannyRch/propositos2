<?php
/*Lógica para guardar los datos de un nuevo usuario*/
include '../config/conexion.php';
include '../db.php';

$email = $_POST['email'];
$name = $_POST['name'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];


$query = "SELECT * from usuarios where email = '$email'";
$db = new Db();
$usuarios = $db->array($query);

$passHashed = md5($pass1);


if (sizeof($usuarios) > 0) {
    echo "Email duplicado, por favor intente con otro";

    echo "<br/><a href='nuevo.php'>Regresar</a>";
} else {

    $insert = "insert into usuarios (email, nombre, password) values ('$email','$name','$passHashed')";
    $resp = $db->insert($insert);
    if ($resp) {
        header('location: ../index.php');
    } else {
        echo 'Error en BD: ' . mysqli_error($conexion);
    }
}
