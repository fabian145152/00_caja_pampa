<?php
/*
session_start();
if ($_SESSION['logueado']) {

    echo "BIENVENIDO ,"  . $_SESSION['uname'] . '<br>';

    echo "Hora de conexión :" . $_SESSION['time'] . '<br>';
*/
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/form.css">
</head>

<body>
    <?php

    include_once '../includes/db.php';
    include_once '../includes/variables.php';
    $con = openCon('../config/db_admin.ini');
    $con->set_charset("utf8mb4");
    ?>
    <div class="container">
        <h3 class="text-center">CREAR NUEVO USUARIO</h3>
        <div class="row">

            <div class="col-md-12">

                <form class="form-group" accept=-"charset utf8" action="guarda_usuario.php" method="post" enctype="multipart/form-data">

                    <div class="from-group">
                        <label class="control-label" for="username">Nombre de Usuario</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>

                    <div class="from-group">
                        <label class="control-label" for="pass_1">Password</label>
                        <input type="password" class="form-control" name="pass_1" id="pass_1">
                    </div>

                    <div class="from-group">
                        <label class="control-label" for="pass">Repita Password</label>
                        <input type="password" class="form-control" name="pass_2" id="pass_2">
                    </div>

                    <div class="form-group">
                        <label class="control-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="GUARDAR DATOS">
                    </div>

                </form>
            </div>
        </div>

</body>

</html>
<?php

?>