<?php


$movil = $_POST['id'];

// id_titu es el numero de movil

include_once '../../includes/db.php';
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");

$sql = "INSERT INTO completa (movil) VALUES (?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $movil);



if ($stmt->execute()) {

?>

    <script>
        alert("Movil Generado")
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