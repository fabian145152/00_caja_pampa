
    <?php

    session_start();

    include_once '../../../includes/db.php';
    include_once '../../../includes/variables.php';
    $con = openCon('../../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    $id = $_POST['id'];

    $nombre = $_POST['nombre'];

    $importe = $_POST['importe'];

    $sql = "UPDATE importe_viajes SET nombre = '$nombre', importe='$importe' WHERE id=" . $id;
    $con->query($sql);

    header('Location: viaje.php');
    ?>
