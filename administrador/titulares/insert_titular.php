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
                <h3 class="text-center">CREACION DE TITULARES</h3>
            </div>

            <div class="col-md-12">
                <form class="form-group" accept=-"charset utf8" action="save_titular.php" method="post" enctype="multipart/form-data">


                    <div class="form-group">
                        <br>
                        <label class="control-label" for="movil">MOVIL</label>
                        <select name="movil" id="movil" class="form-control" required>

                            <?php

                            include_once '../../includes/db.php';
                            $con = openCon('../../config/db_admin.ini');
                            $con->set_charset("utf8mb4");

                            $sql = "SELECT * FROM completa WHERE 1";
                            $result = $con->query($sql);

                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['movil'] ?></option>
                            <?php

                            }
                            ?>


                        </select>
                    </div>


                    <div class="form-group">
                        <br>
                        <label class="control-label" for="Modelo">NOMBRE</label>
                        <input type="text" class="form-control" placeholder="NOMBRE" required="" name="nombre" id="nombre">
                    </div>
                    <div class="form-group">
                        <br>
                        <label class="control-label" for="Precio">APELLIDO</label>
                        <input type="text" class="form-control" placeholder="APELLIDO" name="apellido" id="apellido" required="">
                    </div>
                    <div class="form-group">
                        <br>
                        <label class="control-label">DIRECCION</label>
                        <input type="text" class="form-control" placeholder="DIRECCION" name="direccion" id="direccion" required="">
                    </div>


                    <div class="form-group">
                        <br>
                        <label class="control-label">CP</label>
                        <input type="text" class="form-control" placeholder="CP" name="cp" id="cp" required="">
                    </div>


                    <div class="form-group">
                        <br>
                        <label class="control-label">DNI</label>
                        <input type="text" class="form-control" placeholder="DNI" name="dni" id="dni" required="">
                    </div>

                    <div class="form-group">
                        <br>
                        <label class="control-label">LICENCIA</label>
                        <input type="text" class="form-control" placeholder="No de Licencia" name="licencia" id="licencia" required="">
                    </div>

                    <div class="form-group">
                        <br>
                        <label class="control-label">CELULAR</label>
                        <input type="text" class="form-control" placeholder="CELULAR" name="cel" id="cel" required="">
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Añadir Titular">
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="..js/jquery-3.4.1.min.js"> </script>
    <script src="../js/bootstrap.min.js"> </script>
</body>

</html>