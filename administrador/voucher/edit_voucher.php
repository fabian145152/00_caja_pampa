<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Raleway&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/form.css">

</head>

<body>

    <?php
    $id = $_GET['id'];

    include_once '../../includes/db.php';

    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    $sql = "SELECT * FROM voucher_temporales WHERE id = '$id' ";
    $result = $con->query($sql);


    $row = $result->fetch_assoc();
    ?>


    <div class="container-sm">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">ACTUALIZAR VOUCHER No: <?php echo $row['viaje_no'] ?></h3>
            </div>
            <div class="col-md-12">
                <form class="form-group" accept=-"charset utf8" action="update_product.php" method="post">
                    <div class="from-group">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <!-- ojo la linea anterior es para mandar el id directamente al la pagina update y no verlo en otro lado -->
                        <div class="form-group">
                            <label class="control-label">Movil</label>
                            <input type="text" class="form-control" id="movil" name="movil" value="<?php echo $row['movil']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Fecha</label>
                            <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo $row['fecha']; ?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Reloj</label>
                            <input type="text" class="form-control" id="reloj" name="reloj" value="<?php echo $row['reloj']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Peaje</label>
                            <input type="text" class="form-control" id="peaje" name="peaje" value="<?php echo $row['peaje']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Equipaje</label>
                            <input type="text" class="form-control" id="equipaje" name="equipaje" value="<?php echo $row['equipaje']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Adicional</label>
                            <input type="text" class="form-control" id="adicional" name="adicional" value="<?php echo $row['adicional']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Plus</label>
                            <input type="text" class="form-control" id="plus" name="plus" value="<?php echo $row['plus']; ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Total</label>
                            <input type="text" class="form-control" id="plus" name="plus" value="
                            <?php echo $total =  $row['plus'] + $row['adicional'] + $row['equipaje'] + $row['peaje'] + $row['reloj'];

                            ?>">
                        </div>
                        <div class="text-center">
                            <br>
                            <input type="submit" class="btn btn-success" value="Validar">

                        </div>





                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    ?>
</body>