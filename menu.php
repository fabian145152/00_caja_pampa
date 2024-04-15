<?php
session_start();
if ($_SESSION['logueado']) {

    echo "BIENVENIDO ,"  . $_SESSION['uname'] . '<br>';

    echo "Hora de conexión :" . $_SESSION['time'] . '<br>';

    echo $nombre = $_SESSION['uname'];
    echo "<br>";
    echo $fecha = date('Y-m-d');
    echo "<br>";
    echo $abre = $_SESSION['time'];
    echo "<br>";


    include_once 'includes/db.php';
    include_once 'includes/variables.php';
    $con = openCon('config/db_admin.ini');
    $con->set_charset("utf8mb4");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $usuario_logeado = "INSERT INTO users_logeado (nombre, fecha, abre) VALUES ('$nombre', '$fecha', '$abre')";

    if ($con->query($usuario_logeado) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $usuario_logeado . "<br>" . $con->error;
    }



?>

    <body>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>MENU PINCIPAL</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>

        <body>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Menu Usuarios</h3>
                        <ul class="list-group">
                            <li><a href="usuarios/inicio_usuarios.php" class="btn btn-primary">Crear Usuarios</a></li>
                            <br>
                            <li><a href="administrador/logeados/logeos.php" class="btn btn-primary">SESIONES</a></li>
                            <br>
                            <li><a href="#" class="btn btn-primary">Usuarios</a></li>
                            <br>

                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Menu Moviles</h3>
                        <ul class="list-group">
                            <li><a href="administrador/crear_no_de_movil/list_no_movil.php" class="btn btn-primary">Crear nuevo Número</a></li>
                            <br>
                            <li><a href="administrador/choferes/list_chofer.php" class="btn btn-primary">Crear Choferes</a></li>
                            <br>
                            <li><a href="administrador/unidades/list_unidades.php" class="btn btn-primary">Crear unidades</a></li>
                            <br>
                            <li><a href="administrador/titulares//list_titulares.php" class="btn btn-primary">crear titulares</a></li>
                            <br>
                            <li><a href="administrador/arma_unidad/list_unidad.php" class="btn btn-primary">UNIDAD COMPLETA</a></li>

                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Menu de Caja</h3>
                        <ul class="list-group">
                            <li> <a href="administrador/voucher/inicio_voucher.php" class="btn btn-primary">VOUCHER</a></li>
                            <br>
                            <li> <a href="administrador/caja/index.php" class="btn btn-primary" target="__blank">CAJA</a></li>
                            <br>
                           
                            <li><a href="Backup_DDBB/index.php" class=" btn btn-primary">BackUP</a></li>
                            <br>
                            <li><a href="administrador/abonos/list_abonos.php" class="btn btn-danger">ABONOS</a></li>
                            <br>
                            <li><a href="salir.php" class=" btn btn-primary">Salir</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </body>

        </html>
    <?php
    /*El text-center sale de una clase de Bootstrap*/
} else {
    header("location:../findex.html");
}
