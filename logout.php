<?php
session_start();

unset($_SESSION['id_usuario']);
unset($_SESSION['nombre']);
unset($_SESSION['email']);

header("location: index.php");
