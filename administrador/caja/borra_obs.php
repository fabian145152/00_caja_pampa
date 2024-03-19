<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once '../../includes/db.php';
    include_once '../../includes/variables.php';
    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    echo $movil = $_POST['movil'];

    $sql = "UPDATE completa SET obs = '' WHERE movil =" . $movil;



    $con->query($sql);
    header("Location:inicio.php");

    ?>

</body>

</html>