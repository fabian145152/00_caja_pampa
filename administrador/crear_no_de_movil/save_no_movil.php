<?php


$movil = $_POST['id'];

// id_titu es el numero de movil

include_once '../../includes/db.php';
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");



$sql_movil = "INSERT INTO completa (movil) VALUES (?)";
$stmt_movil = $con->prepare($sql_movil);
$stmt_movil->bind_param("i", $movil);

$sql_semana = "INSERT INTO semanas (movil) VALUES (?)";
$stmt_semana = $con->prepare($sql_semana);
$stmt_semana->bind_param("i", $movil);

echo $movil;

//exit();

$stmt_movil->execute();
if ($stmt_semana->execute()) {

?>

    <script>
        alert("NUEVO MOVIL CREADO CON EXITO")
        window.location = "list_no_movil.php";
    </script>
<?php

} else {
?>
    <script>
        alert("MOVIL DUPLICADO")
        window.location = "list_no_movil.php";
    </script>
<?php
}

?>