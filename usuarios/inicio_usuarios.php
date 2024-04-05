<?php
session_start();
if ($_SESSION['logueado']) {

    echo "BIENVENIDO ,"  . $_SESSION['uname'] . '<br>';

    echo "Hora de conección :" . $_SESSION['time'] . '<br>';

    include_once '../includes/db.php';
    include_once '../includes/variables.php';
    $con = openCon('../config/db_admin.ini');
    $con->set_charset("utf8mb4");

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/columnas.css">
        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootbox.min.js"></script>
    </head>

    <body>
        <?php
        $sql = "SELECT * FROM users WHERE 1";
        $listar = $con->query($sql);
        ?>
        <table class="table table-bordered table-sm table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nombre de usuario</th>
                    <th>Password</th>
                    <th>email</th>
                    <th>initial_date</th>
                </tr>
            </thead>



            <div>
                <thead>
                    <?php

                    while ($ver = $listar->fetch_assoc()) {
                    ?>
                        <tr>
                            <th><?php echo $ver['id_users'] ?></th>
                            <th><?php echo $ver['username'] ?></th>
                            <th><?php echo "*******" ?></th>
                            <th><?php echo $ver['email'] ?></th>
                            <th><?php echo $ver['initial_date'] ?></th>
                        </tr>
                        <p></p>
                    <?php
                    }
                    ?>
                    <a href="../salir.php">SALIR</a>
                </thead>
            </div>
        </table>
    </body>

    </html>
<?php
}
?>