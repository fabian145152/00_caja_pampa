<body>
    <?php
    include_once '../../../includes/db.php';
    $con = openCon('../../../config/db_admin.ini');
    $con->set_charset("utf8mb4");
    $id_upd = $_GET['q'];
    echo $id_upd;
    $sql = "SELECT id, obs FROM completa WHERE id=" . $id_upd;
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Actualizar-products</title>
        <link href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../../css/form.css">

    </head>

    <body>
        <div class="container">
            <h3 class="text-center">ACTUALIZACION DEL MENSAJE GUARDADO</h3>
            <div class="row">

                <div class="col-md-12">

                    <form class="form-group" accept=-"charset utf8" action="update_completa.php" method="post">

                        <div class="from-group">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        </div>

                        <br><br>
                        <div class="input-group input-group-lg">
                            <span class="control-label" id="inputGroup-sizing-lg">Mensaje</span>
                            <textarea rows="3" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" id="obs" name="obs">
                                <?php
                                $obs = $row['obs'];
                                echo trim($obs);
                                ?>
                            </textarea>
                        </div>

                        <div class="text-center">
                            <br>
                            <input type="submit" class="btn btn-success" value="GUARDAR DATOS">
                        </div>


                </div>

            </div>
        </div>
        </div>
    </body>

    </html>