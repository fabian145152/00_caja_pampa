<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUMERO DE MOVIL</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootbox.min.js"></script>
    <script>
        function deleteProduct(cod_titular) {
            /*  Si no le pongo nada entre los parentesis() me borra todo o sea que 
            la funcion se ejecuta siempore igual. 
            Tengo que cambiarle los parametros de entrada para que la ejecute como yo quiero. 
            Si no tiene ningun paramtero generaliza, si lo tiene se ejecuta de forma particular*/
            bootbox.confirm("Desea Eliminar?" + cod_titular, function(result) {
                /*  si la funcion no tiene nombre es una funcion anonima function() o function = nombre()  */
                if (result) {
                    window.location = "delete_no_movil.php?q=" + cod_titular;
                }
                /*  La ?q es como si fuera el metodo $_GET */
            });
        }

        /* ahora viene la funcion update*/
        function updateProduct(cod_titular) {
            window.location = "edit_no_movil.php?q=" + cod_titular;
        }
    </script>
</head>

<body>


    <h1 class="text-center" style="margin: 5px ; ">LISTAR NUMEROS DE MOVIL</h1>

    <div class="row">
        <div class="btn-group d-flex w-50" role="group">
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a href="insert_no_movil.php" class="btn btn-primary btn-sm">NUEVO NUMERO DE MOVIL</a>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a href="../../index.php" class="btn btn-primary btn-sm">SALIR</a>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a href="ListaContacto.php" class="btn btn-primary btn-sm">LISTAR MOVILES</a>
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            <a href="../../ayuda/ayuda.html" target=" _blank" class="btn btn-primary btn-sm">AYUDA</a>
        </div>

    </div>

    <table class="table table-bordered table-sm table-hover">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Movil</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php

            include_once '../../includes/db.php';
            $con = openCon('../../config/db_admin.ini');
            $con->set_charset("utf8mb4");
            ?>
            <?php
            $sql = "SELECT * FROM completa WHERE 1 ORDER BY movil ASC";
            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php $numero_de_movil = $row['movil'];
                        if ($numero_de_movil > 0 && $numero_de_movil <= 9) {
                            echo $numero_de_movil = "000" . $numero_de_movil;
                        }
                        if ($numero_de_movil >= 10 && $numero_de_movil < 100) {
                            echo $numero_de_movil = "00" . $numero_de_movil;
                        }
                        if ($numero_de_movil >= 100 && $numero_de_movil < 1000) {
                            echo $numero_de_movil = "0" . $numero_de_movil;
                        }
                        if ($numero_de_movil >= 1000) {
                            echo $numero_de_movil;
                        }
                        ?>
                    </td>

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