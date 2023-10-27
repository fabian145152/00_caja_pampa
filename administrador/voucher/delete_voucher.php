
    <?php

/*
Borra los voucher que ya estan cargados en la tabla voucher validados
*/


    include_once '../../includes/db.php';
    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    echo $id = $_GET['q'];

    $sql = "DELETE FROM `voucher_nuevos` WHERE id =" . $id;
    $result = $con->query($sql);

    header("Location:inicio_voucher.php");

    ?>
