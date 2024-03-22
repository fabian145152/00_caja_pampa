    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../../css/bootstrap.min.css">

        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/bootbox.min.js"></script>
        <style>
            #contenedor {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
            }

            #contenedor>div {
                width: 50;
            }
        </style>
    </head>

    <body>
        <?php
        $id = $_GET['q'];

        include_once '../../includes/db.php';


        $con = openCon('../../config/db_admin.ini');
        $con->set_charset("utf8mb4");
        $sql = "SELECT * FROM voucher_nuevos WHERE id = $id ";

        $result = $con->query($sql);
        $row = $result->fetch_assoc();

        ?>

        <h2 class="text-center" style="margin: 5px ; ">DETALLES DEL VOUCHER No: <?php echo $row['viaje_no'] ?></h2>
        <form class="form-group" accept=-"charset utf8 action="save_voucher.php" <?php echo $row['movil'] ?> method="post">
            <div class="grid" name="movil">

                <div id="contenedor">
                    <ul>
                        <li><input placeholder="ID"></li>
                        <li><input placeholder="MOVIL"></li>
                        <li><input placeholder="VIAJE NO"></li>
                        <li><input placeholder="ESTADO"></li>
                        <li><input placeholder="CC"></li>
                        <li><input placeholder="PASAJERO"></li>
                        <li><input placeholder="C. COSTO"></li>
                        <li><input placeholder="TRASLADO"></li>
                        <li><input placeholder="SINIESTRO"></li>
                        <li><input placeholder="COMPLETADO"></li>
                        <li><input placeholder="DESTINO"></li>
                        <li><input placeholder="RELOJ"></li>
                        <li><input placeholder="PEAJE"></li>
                        <li><input placeholder="EQUIPAJE"></li>
                        <li><input placeholder="ADICIONAL"></li>
                        <li><input placeholder="PLUS"></li>
                        <li><input placeholder="TOTAL"></li>
                        <li><input placeholder="OPERADOR"></li>
                        <BR></BR>
                    </ul>

                    <ul>
                        <li><input type="text" id="id" name="id" value="<?php echo $row['id'] ?>" readonly></li>
                        <li><input type="text" id="movil" name="movil" value="<?php echo $row['movil'] ?>" readonly></li>
                        <li><input type="text" id="viaje_no" name="viaje_no" value="<?php echo $row['viaje_no'] ?>" readonly></li>
                        <li><input type="text" id="estado" name="estado" value="<?php echo $row['estado'] ?>" readonly></li>
                        <li><input type="text" id="cc" name="cc" value="<?php echo $row['cc'] ?>" readonly></li>
                        <li><input type="text" id="nom_pasaj" name="nom_pasaj" value="<?php echo $row['nom_pasaj'] ?>" readonly></li>
                        <li><input type="text" id="c_costo" name="c_costo" value="<?php echo $row['c_costo'] ?>" readonly></li>
                        <li><input type="text" id="traslado" name="traslado" value="<?php echo $row['traslado'] ?>" readonly></li>
                        <li><input type="text" id="siniestro" name="siniestro" value="<?php echo $row['siniestro'] ?>" readonly></li>
                        <li><input type="text" id="completado" name="completado" value="<?php echo $row['completado'] ?>" readonly></li>
                        <li><input type="text" id="destino" name="destino" value="<?php echo $row['destino'] ?>" readonly></li>
                        <li><input type="text" id="reloj" name="reloj" value="<?php echo $row['reloj'] ?>"></li>
                        <li><input type="text" id="reaje" name="peaje" value="<?php echo $row['peaje'] ?>"></li>
                        <li><input type="text" id="equipaje" name="equipaje" value="<?php echo $row['equipaje'] ?>"></li>
                        <li><input type="text" id="adicional" name="adicional" value="<?php echo $row['adicional'] ?>"></li>
                        <li><input type="text" id="plus" name="plus" value="<?php echo $row['plus'] ?>"></li>
                        <li><input type="text" id="total" name="total" value="<?php echo $row['total'] ?>" readonly></li>
                        <li><input type="text" id="operador" name="operador" value="<?php echo $row['operador'] ?>"></li>
                        <BR></BR>
                        <input type="submit" VALUE="GUARDAR">
                        <BR></BR>
                        <a href="inicio_voucher.php" class="boton">Volver</a>

                    </ul>

                </div>

            </div>
        </form>
    </body>

    </html>