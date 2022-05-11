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

    $query = "insert into usuarios (email, nombre, password) values ('$email','$name','$passHashed')";


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
            $query = "insert into usuarios (email, nombre, password, image) values ('$email','$name','$passHashed', '$img_content')";
        }
    }
    $resp = $db->insert($query);
    if ($resp) {
        header('location: ../index.php');
    } else {
        echo 'Error en BD: ' . mysqli_error($conexion);
    }
}
