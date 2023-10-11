<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permisos</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <script src="../../js/jquery-3.4.1.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/bootbox.min.js"></script>

    <script>
        function deleteProduct(cod_voucher) {
            /*  Si no le pongo nada entre los parentesis() me borra todo o sea que 
            la funcion se ejecuta siempore igual. 
            Tengo que cambiarle los parametros de entrada para que la ejecute como yo quiero. 
            Si no tiene ningun paramtero generaliza, si lo tiene se ejecuta de forma particular*/
            bootbox.confirm("Desea Eliminar?" + cod_voucher, function(result) {
                /*  si la funcion no tiene nombre es una funcion anonima function() o function = nombre()  */
                if (result) {
                    window.location = "delete_voucher.php?q=" + cod_voucher;
                }
                /*  La ?q es como si fuera el metodo $_GET */
            });
        }

        /* ahora viene la funcion update*/
        function updateProduct(cod_voucher) {
            window.location = "edit_voucher.php?q=" + cod_voucher;
        }
    </script>
</head>

<body>


    <h1 class="text-center">En esta pagina crear usuarios nuevos</h1>
    <br>
    <h2 class="text-center">Asignacion de permisos a los usuarios</h2>
    <br>

    <form action="guardar_permisos.php" method="post">

        <label for="crear_todo">
            <input id="crear_todo" type="checkbox" name="crear_todo" />
            Creacion de Titulares Unidades Choferes y abono semanal
        </label>
        <br><br>
        <label for="edit_chof_unid">
            <input id="edit_chof_unid" type="checkbox" name="edit_chof_unid" />
            Edicion de Unidades y Choferes
        </label>
        <br><br>

        <label for="modif_caja">
            <input id="modif_caja" type="checkbox" name="modif_caja" />
            Modificar Valores de caja
        </label>
        <br><br>

        <label for="modif_abono">
            <input id="modif_abono" type="checkbox" name="modif_abono" />
            Modificar Abonos
        </label>
        <br><br>


        <label for="solo_cobra">
            <input id="solo_cobra" type="checkbox" name="solo_cobra" />
            Solo puede cobrar el efectivo
        </label>
        <br><br>



        <label for="solo_voucher">
            <input id="solo_voucher" type="checkbox" name="solo_voucher" />
            Puede trabajar solo con voucher
        </label>
        <br><br>


        <input type="submit" />
    </form>





    <br><br>

    <a href="../../index.php" class="btn btn-primary">SALIR</a>
</body>

</html>