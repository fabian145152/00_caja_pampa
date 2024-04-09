<?php
session_start();
if ($_SESSION['logueado']) {

    echo "BIENVENIDO ,"  . $_SESSION['uname'] . '<br>';

    echo "Hora de conexión :" . $_SESSION['time'] . '<br>';
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UNIDADES</title>
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/columnas.css">
        <script src="../../js/jquery-3.4.1.min.js"></script>
        <script src="../../js/bootstrap.min.js"></script>
        <script src="../../js/bootbox.min.js"></script>
        <script>
            function deleteProduct(cod_unidad) {
                /*  Si no le pongo nada entre los parentesis() me borra todo o sea que 
                la funcion se ejecuta siempore igual. 
                Tengo que cambiarle los parametros de entrada para que la ejecute como yo quiero. 
                Si no tiene ningun paramtero generaliza, si lo tiene se ejecuta de forma particular*/
                bootbox.confirm("Desea Eliminar?" + cod_unidad, function(result) {
                    /*  si la funcion no tiene nombre es una funcion anonima function() o function = nombre()  */
                    if (result) {
                        window.location = "delete_unidad.php?q=" + cod_unidad;
                    }
                    /*  La ?q es como si fuera el metodo $_GET */
                });
            }

            /* ahora viene la funcion update*/
            function updateProduct(cod_unidad) {
                window.location = "edit_unidad.php?q=" + cod_unidad;
            }
        </script>
    </head>

    <body>


        <h1 class="text-center" style="margin: 5px ; ">LISTAR UNIDADES</h1>

        <div class="row">
            <div class="btn-group d-flex w-50" role="group">
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <!-- <a href="insert_unidad.php" class="btn btn-primary btn-sm">NUEVO UNIDAD</a>  -->
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <a href="../../menu.php" class="btn btn-primary btn-sm">SALIR</a>
            </div>

        </div>

        <table class="table table-bordered table-sm table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Movil</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Domnio</th>
                    <th>Año</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>

                </tr>
            </thead>

            <tbody>


                <?php
                include_once '../../includes/db.php';
                $con = openCon('../../config/db_admin.ini');
                $con->set_charset("utf8mb4");
                ?>
                <?php
                $sql = "SELECT * FROM completa WHERE 1 ORDER BY movil";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['movil'] ?></td>
                        <td><?php echo $row['marca'] ?></td>
                        <td><?php echo $row['modelo'] ?></td>
                        <td><?php echo $row['dominio'] ?></td>
                        <td><?php echo $row['año'] ?></td>

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
<?php
}
?>