<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CREAR ABONO</title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <link rel="stylesheet" href="../../css/form.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">CREACION DE NUEVOS ABONOS</h3>
            </div>

            <div class="col-md-12">
                <form class="form-group" accept=-"charset utf8" action="save_abono.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <br>
                        <label class="control-label" for="Modelo">NOMBRE</label>
                        <input type="text" class="form-control" placeholder="NOMBRE" required="" name="abono" id="abono">
                    </div>
                    <div class="form-group">
                        <br>
                        <label class="control-label" for="Precio">IMPORTE</label>
                        <input type="text" class="form-control" placeholder="IMPORTE" name="importe" id="importe" required="">
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-success" value="añadir producto">
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="..js/jquery-3.4.1.min.js"> </script>
    <script src="../js/bootstrap.min.js"> </script>
</body>

</html>