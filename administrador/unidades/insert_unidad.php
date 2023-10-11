<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CREAR TITULARES</title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <link rel="stylesheet" href="../../css/form.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">CREACION DE UNIDADES</h3>
            </div>

            <div class="col-md-12">
                <form class="form-group" accept=-"charset utf8" action="save_unidad.php" method="post" enctype="multipart/form-data">

                   
                    <div class="form-group">
                        <br>
                        <label class="control-label" for="Modelo">MARCA</label>
                        <input type="text" class="form-control" placeholder="MARCA" required="" name="marca" id="marca">
                    </div>
                    <div class="form-group">
                        <br>
                        <label class="control-label" for="Precio">MODELO</label>
                        <input type="text" class="form-control" placeholder="MODELO" name="modelo" id="modelo" required="">
                    </div>
                    <div class="form-group">
                        <br>
                        <label class="control-label">DOMINIO</label>
                        <input type="text" class="form-control" placeholder="DOMINIO" name="dominio" id="dominio" required="">
                    </div>

                    <div class="form-group">
                        <br>
                        <label class="control-label">AÑO</label>
                        <input type="text" class="form-control" placeholder="AÑO" name="año" id="año" required="">
                    </div>


                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="CREAR AUTO">
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
    <script src="..js/jquery-3.4.1.min.js"> </script>
    <script src="../js/bootstrap.min.js"> </script>
</body>

</html>