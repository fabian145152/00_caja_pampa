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

        include_once '../../includes/db.php';

        $con = openCon('../../config/db_admin.ini');
        $con->set_charset("utf8mb4");


        /*
        
        if (!isset($movil)) {
            echo "es nula";
            $sql_1 = "SELECT * FROM voucher_nuevos WHERE movil = '$movil' ";
            $con->set_charset("utf8mb4");
            $result_ = $con->query($sql_1);
        } else {
            echo "no es nula";
            $id = $_GET['q'];
            echo $id;
        }
*/
        if (isset($id)) {
            $id = $_GET['id'];
            echo "No esta definida";
            $sql = "SELECT * FROM voucher_nuevos WHERE id = '$id' ";
            $result = $con->query($sql);
            $row = $result->fetch_assoc();
        }

        echo $id = $_GET['id'];
        echo "<br>";
        echo $movil = $row['movil'];

        $sql = "SELECT * FROM voucher_nuevos WHERE movil = '$movil' ";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();

        ?>

        <h2 class="text-center" style="margin: 5px ; ">DETALLES DEL VOUCHER No: <?php echo $row['viaje_no'] ?></h2>
        <form class="form-group" accept="charset utf8" action=" valida_voucher.php?=" <?php echo $movil ?> method=" post">
            <div class="grid" name="movil">

                <div id="contenedor">
                    <ul>
                        <li>Movil</li>
                        <li>ID </li>
                        <li>id_Voucher</li>
                        <li>Viaje Numero</li>
                        <li>Origen</li>
                        <li>Estado</li>
                        <li>Nombre del Pasajero</li>
                        <li>Telefono del pasajero</li>
                        <li>Chofer</li>
                        <li>DNI</li>
                        <li>Marca</li>
                        <li>Dominio</li>
                        <li>Centro de costo</li>
                        <li>Cuenta Corriente</li>
                        <li>Cuenta </li>
                        <li>Cuenta</li>
                        <li>Traslado</li>
                        <li>Siniestro</li>
                        <li>Fecha solicitado</li>
                        <li>Fecha Completado</li>
                        <li>Direccion de destino</li>
                        <li>Reloj</li>
                        <li>Peaje</li>
                        <li>Equipaje</li>
                        <li>Adicional</li>
                        <li>Plus</li>
                        <li>Operador</li>
                        <li>Autorizante</li>
                        <li>Observaciones Chofer</li>
                        <li>Observaciones Pasajero</li>
                        <li>Fecha de creacion</li>

                    </ul>
                    <ul>
                        <li><?php echo $row['movil'] ?></li>
                        <li><?php echo $row['id'] ?></li>
                        <li><?php echo $row['id_vou'] ?></li>
                        <li><?php echo $row['viaje_no'] ?></li>
                        <li><?php echo $row['origen'] ?></li>
                        <li><?php echo $row['estado'] ?></li>
                        <li><?php echo $row['nom_pasaj'] ?></li>
                        <li><?php echo $row['tel_pasaj'] ?></li>
                        <li><?php echo $row['chof'] ?></li>
                        <li><?php echo $row['dni'] ?></li>
                        <li><?php echo $row['marca'] ?></li>
                        <li><?php echo $row['patente'] ?></li>
                        <li><?php echo $row['c_costo'] ?></li>
                        <li><?php echo $row['cc'] ?></li>
                        <li><?php echo $row['c_corr'] ?></li>
                        <li><?php echo $row['c_cont'] ?></li>
                        <li><?php echo $row['traslado'] ?></li>
                        <li><?php echo $row['siniestro'] ?></li>
                        <li><?php echo $row['solicitado'] ?></li>
                        <li><?php echo $row['completado'] ?></li>
                        <li><?php echo $row['destino'] ?></li>
                        <li><?php echo $row['reloj'] ?></li>
                        <li><?php echo $row['peaje'] ?></li>
                        <li><?php echo $row['equipaje'] ?></li>
                        <li><?php echo $row['adicional'] ?></li>
                        <li><?php echo $row['plus'] ?></li>
                        <li><?php echo $row['operador'] ?></li>
                        <li><?php echo $row['autorizante'] ?></li>
                        <li><?php echo $row['obs_chof'] ?></li>
                        <li><?php echo $row['obs_pas'] ?></li>
                        <li><?php echo $row['created_at'] ?></li>
                    </ul>
                </div>
            </div>
            <input type="submit" value="Submit">
        </form>

        <a href="inicio_voucher.php" class="boton">Volver</a>
    </body>

    </html>