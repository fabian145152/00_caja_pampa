<?php
//session_start();

//if ($_SESSION['logueado']) {
include_once '../../includes/db.php';
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");
/*print_r($_POST); */

/*La linea anterior sirve solo para ver */


$abono = $_POST['abono'];
$importe = $_POST['importe'];


$id = $_POST['id'];

$sql = "UPDATE abonos SET abono = '$abono', 
                                importe = '$importe'
                                WHERE id =" . $id;
$con->query($sql);
header('Location:list_abonos.php');
//}
