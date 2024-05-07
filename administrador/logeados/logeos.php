<?php
session_start();
if ($_SESSION['logueado']) {

    echo "<h4>" . "BIENVENIDO "  . $_SESSION['uname'];
    echo "   ";
    echo "Hora de conexión :" . $_SESSION['time'] . "</h4>";
    $fecha = date('Y-m-d');
    $abre = $_SESSION['time'];





?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/ultima.css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
    </head>

    <body>
        <h1 class="text-center" style="margin: 5px ; ">Listado de usuarios que iniciaron Sesion</h1>

        <div class="row">
            <div class="btn-group d-flex w-50" role="group">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <!-- <a href="insert_unidad.php" class="btn btn-primary btn-sm">NUEVO UNIDAD</a>  -->
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <a href="borrar_reg.php" class="btn btn-primary btn-sm ">Dejar ultimos 20</a>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <a href="../../menu.php" class="btn btn-primary btn-sm ">SALIR</a>
            </div>

        </div>

        <table class="table table-bordered table-sm table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Abre</th>
                    <th>Cierra</th>


                </tr>
            </thead>

            <tbody>


                <?php
                include_once '../../includes/db.php';
                $con = openCon('../../config/db_admin.ini');
                $con->set_charset("utf8mb4");
                ?>
                <?php
                $sql = "SELECT * FROM users_logeado WHERE 1 ORDER BY id DESC ";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['fecha'] ?></td>
                        <td><?php echo $row['abre'] ?></td>
                        <td><?php echo $row['cierra'] ?></td>
                    </tr>
                    <p></p>

                <?php
                }
                ?>
            </tbody>
        </table>
    </body>

    </html>







<?php

}
