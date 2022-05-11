<?php
include './../db.php';
session_start();


if (sizeof($_POST) > 0) {

    $id_proposito = $_POST['id_proposito'];
    $proposito = $_POST['proposito'];
    $vencimiento = $_POST['vencimiento'];
    $id_usuario = $_SESSION['id_usuario'];
    $db = new Db();

    if ($id_proposito) {
        //UPDATE
        try {
            $query = "UPDATE propositos set proposito = '$proposito', vencimiento = '$vencimiento' where id = '$id_proposito'";
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
                    $query = "UPDATE propositos set image = '$img_content' where id = '$id_proposito'";
                    $res = $db->query($query);
                }
            }

            if ($res) {
                header("Location: index.php");
            } else {
                echo "Error al actualizar el propósito";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    } else {
        //INSERT
        try {
            $query = "INSERT INTO propositos(proposito, vencimiento, id_usuario) values('$proposito', '$vencimiento', $id_usuario)";


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
                    $query = "INSERT INTO propositos(proposito, vencimiento, id_usuario, image) values('$proposito', '$vencimiento', $id_usuario, '$img_content')";
                }
            }


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
}
