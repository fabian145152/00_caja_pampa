<?php
//session_start();

//if ($_SESSION['logueado']) {
include_once '../../includes/db.php';
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");
/*print_r($_POST); */

/*La linea anterior sirve solo para ver */

/*
id_titu es el numero de movil
*/

$movil = $_POST['movil'];

echo $movil;

$id = $_POST['id'];

$sql = "UPDATE completa SET movil = '$movil' WHERE id =" . $id;
$con->query($sql);
header('Location:list_no_movil.php');
