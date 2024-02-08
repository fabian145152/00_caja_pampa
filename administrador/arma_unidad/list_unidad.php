<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIDADES COMPLETAS</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootbox.min.js"></script>
    <style>
        select,
        input.texto {
            width: 120px;
        }

        * {
            font-size: 12px;
        }
    </style>
    <script>
        function deleteProduct(cod_uni_comp) {
            /*  Si no le pongo nada entre los parentesis() me borra todo o sea que 
            la funcion se ejecuta siempore igual. 
            Tengo que cambiarle los parametros de entrada para que la ejecute como yo quiero. 
            Si no tiene ningun paramtero generaliza, si lo tiene se ejecuta de forma particular*/
            bootbox.confirm("Desea Eliminar?" + cod_uni_comp, function(result) {
                /*  si la funcion no tiene nombre es una funcion anonima function() o function = nombre()  */
                if (result) {
                    window.location = "delete_uni_completa.php?q=" + cod_uni_comp;
                }
                /*  La ?q es como si fuera el metodo $_GET */
            });
        }

        function detalleProduct(cod_uni_comp) {
            window.location = "detalle_uni_completa.php?q=" + cod_uni_comp;
        }

        /* ahora viene la funcion update*/
        function updateProduct(cod_uni_comp) {
            window.location = "edit_uni_completa.php?q=" + cod_uni_comp;
        }
        /*
                function guardaProduct(cod_titular) {
                    window.location = "guarda_uni_complet.php?q=" + cod_titular;
                }
                */
    </script>
</head>

<body>
    <h2 class="text-center" style="margin: 5px ; ">LISTADO DE UNIDADES COMPLETAS
        <a href="../../index.php"> &nbsp;&nbsp;SALIR</a>
        &nbsp;&nbsp;<a href="../../ayuda/ayuda.html" target=" _blank">AYUDA</a>
    </h2>

    <table class=" table table-bordered table-sm table-hover">
        <thead class="thead-dark">
            <tr>
                <!-- <th>Id</th>  -->
                <th>Movil</th>
                <th>Nom Titular</th>
                <th>Ape Titu</th>
                <th>Cel titu</th>
                <th>DNI titu</th>
                <th>Licencia</th>
                <th>Nom ch. dia</th>
                <th>Ape ch. dia</th>
                <th>Cel ch. dia</th>
                <th>Nom ch. noche</th>
                <th>Ape ch. noche</th>
                <th>Cel noche</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Dominio</th>
                <th>año</th>
                <th>Abono</th>
                <th>x Viaje</th>
                <th>Detalles</th>
                <th>Actualizar</th>
                <th>Eliminar</th>

            </tr>
        </thead>


        <?php
        include_once '../../includes/db.php';

        $con = openCon('../../config/db_admin.ini');
        $con->set_charset("utf8mb4");

        $sql_comp = "SELECT * FROM `completa` WHERE 1 ORDER BY movil;";
        $res_comp = $con->query($sql_comp);


        while ($row = $res_comp->fetch_assoc()) {
        ?>
            <tr>

                <!-- <th><?php $row['id'] ?></th>  -->
                <th><?php echo $row['movil'] ?></th>
                <th><?php echo $row['nombre_titu'] ?></th>
                <th><?php echo $row['apellido_titu'] ?></th>
                <th><?php echo $row['cel_titu'] ?></th>
                <th><?php echo $row['dni_titu'] ?></th>
                <TH><?PHP echo $row['licencia_titu'] ?></TH>
                <th><?php echo $row['nombre_chof_1'] ?></th>
                <th><?php echo $row['apellido_chof_1'] ?></th>
                <th><?php echo $row['cel_chof_1'] ?></th>
                <th><?php echo $row['nombre_chof_2'] ?></th>
                <th><?php echo $row['apellido_chof_2'] ?></th>
                <th><?php echo $row['cel_chof_2'] ?></th>
                <th><?php echo $row['marca'] ?></th>
                <th><?php echo $row['modelo'] ?></th>
                <th><?php echo $row['dominio'] ?></th>
                <th><?php echo $row['año'] ?></th>
                <th><?php echo $row['abono'];

                    ?></th>

                <th><?php echo $row['x_viaje'] ?></th>

                <td> <a class="btn btn-primary btn-sm" href="#" onclick="detalleProduct(<?php echo $row['id']; ?>)">Detalles</td>
                <td> <a class="btn btn-primary btn-sm" href="#" onclick="updateProduct(<?php echo $row['id']; ?>)">Actualizar</td>
                <td> <a class="btn btn-danger btn-sm" href="#" onclick="deleteProduct(<?php echo $row['id']; ?>)">Eliminar</td>

            </tr>

        <?php
        }
        ?>
        </tr>
    </table>

</body>

</html>