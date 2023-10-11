<?php
//session_start();

//if ($_SESSION['logueado']) {
include_once '../../includes/db.php';
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");
/*print_r($_POST); */

/*La linea anterior sirve solo para ver */


$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$dominio = $_POST['dominio'];
$año = $_POST['año'];



$id = $_POST['id'];

$sql = "UPDATE completa SET     
                                marca = '$marca', 
                                modelo = '$modelo', 
                                dominio = '$dominio',
                                año = '$año'
                        WHERE id =" . $id;
$con->query($sql);
header('Location:list_unidades.php');
//}
