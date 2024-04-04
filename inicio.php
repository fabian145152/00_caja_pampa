<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRACION DE TAXIS</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">MENU ADMINISTRADOR</h3>
            </div>

            <div class="btn-group-vertical">
                <br>
                <a class="btn btn-primary btn-sm" href="Backup_DDBB/backup_caja.php">Backup DDBB</a>

                <br>




                <br>

                <a href="includes/modifica_variables.php" class="btn btn-primary">Importes y abonos
                    <p>falta terminar</p>
                </a>
                <br>
                <a href="administrador/abonos/list_abonos.php" class="btn btn-primary">ABONOS
                    <p>Muestra los abonos, todavia no esta terminado</p>
                </a>
                <br>
                <a href="administrador/new_user/inicio.php" class="btn btn-primary">CREAR USUARIOS
                    <p>Modulo para crear usuarios del sistema</p>
                </a>
                <br>
                <br>
                <a href="ayuda/ayuda.html" target=" _blank" class="btn btn-primary">AYUDA</a>
                <br>
                <a href="../00_pampa/index.php" class="btn btn-danger">SALIR</a>
                <br>
            </div>

        </div>

        <h2 class="text-center">Falta crear todas las sesiones del navegador</h2>
        <h2 class="text-center">Usar sha-2 para encriptar las contraseñas en el formulario de inicio</h2>
        <h2 class="text-center">CREAR UNA TABLA QUE GUARDE LOS NUMEROS DE VOUCHER YA ELABORADOS PARA QUE NO SE REPITAN</h2>
        <h2 class="text-center">EMPEZAR A TRABAJAR CON LO PERMISOS EN CREAR USUARIOS</h2>

        <OL>
            <li>editar choferes o unidades y valores a cobrar semanalmente sin poder eliminar el resto de los datos</li>
            <li>Permiso para crear usuarios nuevos</li>
            <li>modificar importe de la semana a cobrar</li>
            <li>modificar los valores de caja</li>
            <li>permiso solo para cobrar FT</li>
        </OL>
    </div>
    <script src="..js/jquery-3.4.1.min.js"> </script>
    <script src="../js/bootstrap.min.js"> </script>
</body>

</html>