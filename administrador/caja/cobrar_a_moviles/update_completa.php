<?php
//session_start();

//if ($_SESSION['logueado']) {
include_once '../../../includes/db.php';
$con = openCon('../../../config/db_admin.ini');
$con->set_charset("utf8mb4");
/*print_r($_POST); */

/*La linea anterior sirve solo para ver */

$id = $_POST['id'];

$obs = $_POST['obs'];




$sql = "UPDATE completa SET obs = '$obs' 
                                
                        WHERE id =" . $id;
$con->query($sql);
header('Location:inicio.php');
//}
