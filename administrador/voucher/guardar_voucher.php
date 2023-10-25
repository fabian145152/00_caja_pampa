<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Guarda Voucher</h1>
    <?php
    echo $id = $_GET['q'];

    include_once '../../includes/db.php';



    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");
    $sql = "SELECT * FROM voucher_nuevos WHERE id = $id ";

    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    ?>
    <ul>
        <li><?php echo $row['movil'] ?></li>
       
        <li><?php echo $row['viaje_no'] ?></li>
        <li><?php echo $row['cc'] ?></li>
        <li><?php echo $row['reloj'] ?></li>
        <li><?php echo $row['peaje'] ?></li>
        <li><?php echo $row['equipaje'] ?></li>
        <li><?php echo $row['adicional'] ?></li>
        <li><?php echo $row['plus'] ?></li>
    </ul>



</body>

</html>