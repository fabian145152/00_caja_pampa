<?php
session_start();
if ($_SESSION['logueado']) {
    echo '<h4>' . "BIENVENIDO ,"  . $_SESSION['uname'] . '</h4>';
    $_SESSION['time'];
    echo '<h4>' . "SEMANA ,"  . date('W') . '</h4>' . '<br>';

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MENU DE CAJA</title>
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <link rel="stylesheet" href="../../css/main.css">
        <link rel="stylesheet" href="../../css/ultima.css">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
    </head>

    <body>
        <?php
        include "../voucher/pertiga.php";

        ?>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        <li><a href="cobrar_a_moviles/inicio.php" class="btn btn-primary btn-block">COBRR A MOVILES</a></li>
                        <br>
                        <li><a href="genera_deuda/genera_deuda.php" class="btn btn-primary btn-block">GENERAR DEUDA ANTERIOR</a></li>
                        <br>
                        <li><a href="semana/inicio_semana.php" class="btn btn-primary btn-block">SEMANA</a></li>
                        <br>
                        <li><a href="importe_viaje/viaje.php" class="btn btn-info btn-block">IMPORTE x VIAJE en proceso</a></li>
                        <br>

                        <li><a href="resumen_de_caja/index.php" class="btn btn-info btn-block">RESUMEN DE CAJA en proceso</a></li>
                        <br>
                        <li><a href="venta/venta_prod.php" class="btn btn-info btn-block">VENTA DE PRODUCTOS en proceso</a></li>
                        <br>
                        <li><a href="../../includes/modifica_variables.php/" class="btn btn-info btn-block">IMPORTES Y ABONOS en proceso</a></li>
                        <br>
                        <li><a href="#" class="btn btn-info btn-block">INGRESAR FT en proceso</a></li>
                        <br>
                        <li><a href="#" class="btn btn-info btn-block">EXTRAER FT en proceso</a></li>
                        <br>
                        <li><a href="../../menu.php" class="btn btn-primary btn-block">SALIR</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
}
?>