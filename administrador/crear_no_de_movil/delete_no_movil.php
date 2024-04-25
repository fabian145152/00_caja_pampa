<?php

session_start();
//if ($_SESSION['logueado']) {

include_once '../../includes/db.php';
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");
$id_del = $_GET['q'];



$sql_semana = "SELECT * FROM completa WHERE id=" . $id_del;

$result_semana = $con->query($sql_semana);
$row_semana = $result_semana->fetch_assoc();



echo "<br>";
echo $semana_movil = $row_semana['movil'];
echo "<br>";

$sql_del_semana = "DELETE FROM semanas WHERE movil=" . $semana_movil;
$result_semanas = $con->query($sql_del_semana);




echo "<br>";
echo "<br>";
echo "<br>";


$sql = "DELETE FROM completa WHERE id=" . $id_del;
$result = $con->query($sql);




header("Location:list_no_movil.php");
