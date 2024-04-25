<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO IMPORTE xVIAJE</title>

    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <script src="../../../js/jquery-3.4.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootbox.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">CREACION DE IMPORTES X VIAJE.</h3>
            </div>

            <div class="col-md-12">
                <form class="form-group" accept=-"charset utf8" action="save_imp_viaje.php" method="POST">

                    <div class="form-group">
                        <br>
                        <label class="control-label" for="nombre">NOMBRE</label>
                        <input type="text" class="form-control" placeholder="nombre" required name="nombre" id="nombre" autofocus>
                    </div>

                    <div class="form-group">
                        <br>
                        <label class="control-label" for="nombre">IMPORTE</label>
                        <input type="text" class="form-control" placeholder="valor" required name="valor" id="valor">
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="CREAR">
                    </div>
                    <br>
                    <div class="text-center">
                        <a href="viaje.php" class="btn btn-success" value="SALIR">SALIR</a>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="..js/jquery-3.4.1.min.js"> </script>
    <script src="../js/bootstrap.min.js"> </script>
</body>

</html>