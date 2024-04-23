<?php session_start();

include_once '../../../includes/db.php';
include_once '../../../includes/variables.php';
$con = openCon('../../../config/db_admin.ini');
$con->set_charset("utf8mb4");

echo $id = $_POST['id'];
echo "<br>";
echo $movil = $_POST['movil'];
echo "<br>";
echo $x_semana = $_POST['x_semana'];
echo "<br>";
echo $total = $_POST['total'];
echo "<br>";
echo $fecha = $_POST['fecha'];


$sql = "UPDATE semanas SET movil = '$movil', 
                        x_semana = '$x_semana', 
                        total = '$total',
                        fecha = '$fecha' 
                        WHERE id=" . $id;

$stmt = $con->query($sql);

header('Location:../index.php');
