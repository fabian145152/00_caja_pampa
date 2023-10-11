<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>EDITAR</h1>
    <?php
    include_once '../../includes/db.php';
    /* en ese archivo estan las funciones */
    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    $id_upd = $_GET['q'];

    $sql = "SELECT * FROM `unidad_armada` WHERE id=" . $id_upd;;

    $result = $con->query($sql);
    $row = $result->fetch_assoc();

    ?>
    <div class="container">
        <h3 class="text-center">ACTUALIZAR DATOS DEL TITULAR</h3>
        <div class="row">

            <div class="col-md-12">

                <form class="form-group" accept=-"charset utf8" action="update_uni_completa.php" method="post">

                    <div class="from-group">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo  $row['id']; ?>">
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>