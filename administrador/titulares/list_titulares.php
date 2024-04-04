<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TITULARES</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/columnas.css">
    <script src="../../../js/jquery-3.4.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootbox.min.js"></script>

    <script>
        function deleteProduct(cod_titular) {
            /*  Si no le pongo nada entre los parentesis() me borra todo o sea que 
            la funcion se ejecuta siempore igual. 
            Tengo que cambiarle los parametros de entrada para que la ejecute como yo quiero. 
            Si no tiene ningun paramtero generaliza, si lo tiene se ejecuta de forma particular*/
            bootbox.confirm("Desea Eliminar?" + cod_titular, function(result) {
                /*  si la funcion no tiene nombre es una funcion anonima function() o function = nombre()  */
                if (result) {
                    window.location = "delete_titular.php?q=" + cod_titular;
                }
                /*  La ?q es como si fuera el metodo $_GET */
            });
        }

        /* ahora viene la funcion update*/
        function updateProduct(cod_titular) {
            window.location = "edit_titular.php?q=" + cod_titular;
        }
        /*
                function guardaProduct(cod_titular) {
                    window.location = "guarda_uni_complet.php?q=" + cod_titular;
                }
                */
    </script>
</head>

<body>
  
    <h1 class="text-center" style="margin: 5px ; ">LISTAR TITULARES</h1>

    <div class="row">
        <div class="btn-group d-flex w-50" role="group">
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <!-- <a href="insert_titular.php" class="btn btn-primary btn-sm">NUEVO TITULAR</a> -->
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a href="../../../index.php" class="btn btn-primary btn-sm">SALIR</a>
        </div>

    </div>






    <table class="table table-bordered table-sm table-hover">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Importe</th>
                <th>Fecha Fact</th>
                <TH>movil</TH>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Direccion</th>
                <th>DNI</th>
                <th>Licencia</th>
                <th>Celular</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
        </thead>

        <tbody>



            <?php
            $mov = 0;
            $abono = 0;
            $chof = 0;
            $uni = 0;
            $solucion1 = 0;
            $solucion2 = 0;

            include_once '../../includes/db.php';
            $con = openCon('../../config/db_admin.ini');
            $con->set_charset("utf8mb4");

            $sql = "SELECT id,
                           abono,
                           date_format (fecha_facturacion, '%d-%m-%Y') as fecha_formateada ,
                           movil,
                           nombre_titu,
                           apellido_titu,
                           direccion_titu,
                           dni_titu,
                           licencia_titu,
                           cel_titu
             FROM completa WHERE 1 ORDER BY movil";
            $result = $con->query($sql);





            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>

                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['abono'] ?></td>
                    <td><?php echo $row['fecha_formateada'] ?></td>
                    <td><?php echo $row['movil'] ?></td>
                    <td><?php echo $row['nombre_titu'] ?></td>
                    <td><?php echo $row['apellido_titu'] ?></td>
                    <td><?php echo $row['direccion_titu'] ?></td>
                    <td><?php echo $row['dni_titu'] ?></td>
                    <td><?php echo $row['licencia_titu'] ?></td>
                    <td><?php echo $row['cel_titu'] ?></td>

                    <td> <a class="btn btn-primary btn-sm" href="#" onclick="updateProduct(<?php echo $row['id']; ?>)">Actualizar</td>
                    <td> <a class="btn btn-danger btn-sm" href="#" onclick="deleteProduct(<?php echo $row['id']; ?>)">Eliminar</td>
                </tr>
                <p></p>
            <?php
            }
            ?>

        </tbody>
    </table>

</body>

</html>