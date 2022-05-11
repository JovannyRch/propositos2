<?php
include './../db.php';

$id = $_POST['id'];

try {
    $db = new Db();

    $res = $db->query("DELETE from propositos where id = $id");

    if ($res) {
        header("Location: index.php");
    } else {
        echo "Error al crear el propósito";
    }
} catch (\Throwable $th) {
    echo $th;
}
