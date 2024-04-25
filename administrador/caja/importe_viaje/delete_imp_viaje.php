<?php session_start();

include_once '../../../includes/db.php';
$con = openCon('../../../config/db_admin.ini');
$con->set_charset("utf8mb4");
$id_del = $_GET['q'];

$sql = "SELECT * FROM importe_viajes WHERE id=" . $id_del;

$result = $con->query($sql);

$row = $result->fetch_assoc();

$borra = "DELETE FROM importe_viajes WHERE id=" . $id_del;
$res = $con->query($borra);

header('Location: viaje.php');
