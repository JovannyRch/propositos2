<?php
include './../db.php';
session_start();


if (sizeof($_POST) > 0) {

    $id_proposito = $_POST['id_proposito'];
    $proposito = $_POST['proposito'];
    $vencimiento = $_POST['vencimiento'];
    $id_usuario = $_SESSION['id_usuario'];


    if ($id_proposito) {
        //UPDATE
        try {
            $query = "UPDATE propositos set proposito = '$proposito', vencimiento = '$vencimiento' where id = '$id_proposito'";
            $res = $db->query($query);

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
}
