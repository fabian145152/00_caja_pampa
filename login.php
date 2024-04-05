<?php

//include_once '../includes/db.php';
include_once "includes/database.php";

//$con = openCon('../config/db_admin.ini');

$usr = $_POST['username'];
$pass = md5($_POST['password']);
/*m
d5 queda encriptado la contraseña*/
$con->set_charset("utf-8");/*$con es un metodo*/
$sql = "select * from users where (username='$usr' or email='$usr') and (password='$pass')";
$result = $con->query($sql);
$row = $result->fetch_assoc();
if ($row == 0) {
    echo "<h1> Ingreso invalido </h1>";
} else {
    session_start();
    $_SESSION['uname'] = $usr;
    $_SESSION['logueado'] = true;
    $_SESSION['time'] = date('H i s');
    header("location:menu.php");
}
