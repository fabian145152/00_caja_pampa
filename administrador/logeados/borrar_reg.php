<?php

include_once '../../includes/db.php';
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");

$sql = "DELETE FROM users_logeado";

if ($con->query($sql) === TRUE) {
    echo "La tabla ha sido vaciada correctamente";
} else {
    echo "Error al vaciar la tabla: " . $con->error;
}

header("Location: logeos.php");
