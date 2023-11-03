<?php
//session_start();

//if ($_SESSION['logueado']) {
include_once '../../includes/db.php';
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");
/*print_r($_POST); */

/*La linea anterior sirve solo para ver */
echo $id = $_POST['id'];

echo $abono = $_POST['abono'];
echo "<br>";
echo $abono_x_viaje = $_POST['abono_viaje'];
echo "<br>";
echo $nombre = $_POST['nombre'];
echo "<br>";
echo $apellido = $_POST['apellido'];
echo "<br>";
echo $direccion = $_POST['direccion'];
echo "<br>";
echo $dni = $_POST['dni'];
echo "<br>";
echo $licencia = $_POST['licencia'];
echo "<br>";
echo $cel = $_POST['cel'];
echo "<br>";
echo $fecha_ini = $_POST['fecha_inicio'];
echo "<br>";
echo $fecha_fact = $_POST['fecha_fact'];






$sql = "UPDATE completa SET nombre_titu = '$nombre',
apellido_titu = '$apellido',
direccion_titu = '$direccion',
dni_titu ='$dni',
licencia_titu = '$licencia',
cel_titu = '$cel',
fecha_inicio = '$fecha_ini',
fecha_facturacion = '$fecha_fact',
x_viaje = '$abono_x_viaje',
abono = '$abono'
WHERE id = " . $id;

$con->query($sql);
header('Location:list_titulares.php');
