<?php

//session_start();

//if ($_SESSION['logueado']) {

include_once '../../includes/db.php';
/* en ese archivo estan las funciones */
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");
$id_upd = $_GET['q'];
echo $id_upd;



$sql = "SELECT * FROM completa WHERE id=" . $id_upd;
$result = $con->query($sql);
$row = $result->fetch_assoc();
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualizar-products</title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/form.css">

</head>

<body>

    <div class="container">
        <h3 class="text-center">ACTUALIZAR NUMEROS DE MOVIL</h3>
        <div class="row">

            <div class="col-md-12">

                <form class="form-group" accept=-"charset utf8" action="update_no_movil.php" method="post">
                    <div class="from-group">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">movil</label>
                        <input type="text" class="form-control" id="movil" name="movil" value="<?php echo  $row['movil']; ?>">
                    </div>
                    <div class="text-center">
                        <br>
                        <input type="submit" class="btn btn-primary" value="GUARDAR MOVIL">
                        <br>
                        <br><br>
                        <a href="list_no_movil.php" class="btn btn-primary">SALIR</a>
                    </div>
            </div>
        </div>
    </div>


</html>