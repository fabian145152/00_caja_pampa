<?php
//session_start();

//if ($_SESSION['logueado']) {
include_once '../../includes/db.php';
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");
/*print_r($_POST); */

/*La linea anterior sirve solo para ver */


echo $nombre = $_POST['nombre'];
echo $apellido = $_POST['apellido'];
echo $direccion = $_POST['direccion'];
echo $dni = $_POST['dni'];
echo $cel = $_POST['cel'];


$id = $_POST['id'];

$sql = "UPDATE completa SET nombre_chof_1 = '$nombre', 
                                apellido_chof_1 = '$apellido', 
                                direccion_chof_1 = '$direccion', 
                                dni_chof_1 ='$dni',
                                cel_chof_1 = '$cel'
                                WHERE id =" . $id;
                                
$con->query($sql);
header('Location:list_chofer.php');
