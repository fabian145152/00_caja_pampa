

<?php
session_start();
if ($_SESSION['logueado']) {

    echo "BIENVENIDO ,"  . $_SESSION['uname'] . '<br>';

    echo "Hora de conexión :" . $_SESSION['time'] . '<br>';



    include_once '../includes/db.php';
    $con = openCon('../config/db_admin.ini');
    $con->set_charset("utf8mb4");
    $id_del = $_GET['q'];

    $sql = "DELETE FROM users WHERE id_users=" . $id_del;
    $result = $con->query($sql);

    header("Location:inicio_usuarios.php");
}
