<?php
session_start();
if ($_SESSION['logueado']) {

    echo '<h4>' . "BIENVENIDO ,"  . $_SESSION['uname'] . '</h4>' . '<br>';

    $_SESSION['time'] . '<br>';

    $nombre = $_SESSION['uname'];

    $fecha = date('Y-m-d');
    $abre = $_SESSION['time'];

    include_once 'includes/db.php';
    include_once 'includes/variables.php';
    include_once 'includes/funciones.php';

    $con = openCon('config/db_admin.ini');
    $con->set_charset("utf8mb4");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $usuario_logeado = "INSERT INTO `users_logeado`(nombre, fecha, abre) VALUES ('$nombre', '$fecha', '$abre')";

    if ($con->query($usuario_logeado) === TRUE) {
        //echo "Usuario Guardado exitosamente.";
    } else {
        echo "Error: " . $usuario_logeado . "<br>" . $con->error;
    }

?>

    <body>

        <?php
        $rutaArchivo = "administrador/caja/semana/semana.txt";

        // Llamar a la función para leer el archivo
        $contenidoArchivo = leerArchivoTXT($rutaArchivo);
        leerArchivoTXT($contenidoArchivo);
        $contenidoArchivo;
        echo "<br>";

        $semana_ahora = date('W');

        if ($contenidoArchivo < $semana_ahora) {
            echo "Rutina suma semana";
            echo "<br>";

            header('Location:administrador/caja/semana/semana.php');
        }

        ?>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>MENU PINCIPAL</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="css/bootstrap.min.css">

            <link rel="stylesheet" href="css/ultima.css">
            <script src="js/jquery-3.4.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/bootbox.min.js"></script>

        </head>

        <body>
            <h4>SEMANA: <?php echo $semana_ahora ?></h4>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Menu Usuarios</h3>
                        <ul class="list-group">
                            <li><a href="usuarios/inicio_usuarios.php" class="btn btn-primary btn-block">Crear Usuarios</a></li>
                            <br>
                            <li><a href="administrador/logeados/logeos.php" class="btn btn-info btn-block">SESIONES en proceso</a></li>
                            <br>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Menu Moviles</h3>
                        <ul class="list-group">
                            <li><a href="administrador/crear_no_de_movil/list_no_movil.php" class="btn btn-primary btn-block">NUEVO NUMERO DE MOVIL f/listar</a></li>
                            <br>
                            <li><a href="administrador/choferes/list_chofer.php" class="btn btn-primary btn-block">Crear Choferes</a></li>
                            <br>
                            <li><a href="administrador/unidades/list_unidades.php" class="btn btn-primary btn-block">Crear unidades</a></li>
                            <br>
                            <li><a href="administrador/titulares//list_titulares.php" class="btn btn-primary btn-block">crear titulares</a></li>
                            <br>
                            <li><a href="administrador/arma_unidad/list_unidad.php" class="btn btn-primary btn-block">UNIDAD COMPLETA</a></li>

                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Menu de Caja</h3>
                        <ul class="list-group">
                            <li> <a href="administrador/voucher/inicio_voucher.php" class="btn btn-primary btn-block">VOUCHER</a></li>
                            <br>
                            <li> <a href="administrador/caja/index.php" class="btn btn-primary btn-block" target="__blank">CAJA</a></li>
                            <br>

                            <li><a href="Backup_DDBB/index.php" class=" btn btn-primary btn-block">BackUP</a></li>
                            <br>
                            <li><a href="administrador/abonos/list_abonos.php" class="btn btn-danger btn-block">ABONOS</a></li>
                            <br>
                        </ul>
                    </div>
                </div>
            </div>
            <br><br><br><br><br>
            <div id="Power-Contenedor">
                <a href="salir.php" class="btn btn-danger btn-lg ">Salir</a>
            </div>

        </body>

        </html>
    <?php

} else {
    header("location:../index.html");
}
