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

                <h4>agregar: </h4>
                <h4>fecha ingreso </h4>
                <h4>fecha de facturacion</h$>


            </div>

            <div class="btn-group-vertical">
                <a href="administrador/crear_no_de_movil/list_no_movil.php" class="btn btn-primary">CREAR NUMEROS DE MOVIL</a>
                <br>

                <a href="administrador/titulares/list_titulares.php" class="btn btn-primary">CREAR TITULARES</a>
                <br>

                <a href="administrador/choferes/list_chofer.php" class="btn btn-primary">CREAR CHOFERES</a>
                <br>

                <a href="administrador/unidades/list_unidades.php" class="btn btn-primary">CREAR VEHICULOS</a>
                <br>


                <a href="administrador/arma_unidad/list_unidad.php" class="btn btn-primary">LISTAR UNIDADAES</a>
                <br>



                <a href="administrador/abonos/list_abonos.php" class="btn btn-primary">ABONOS
                    <P>Modulo para actualizar o crear importes a cobrar.</P>
                </a>
                <br>

                <a href="administrador/new_user/inicio.php" class="btn btn-primary">CREAR USUARIOS
                    <p>Modulo para crear usuarios del sistema</p>
                </a>
                <br>

                <a href="administrador/voucher/inicio_voucher.php" class="btn btn-primary">VOUCHER
                    <p>todos los campos del reporte de la app MK</p>
                </a>
                <br>

                <a href="administrador/caja/inicio.php" class="btn btn-primary">CAJA
                    <p>armando la tabla en la DDBB</p>
                </a>

                <br>
                <a href="" class="btn btn-primary">Empezar a hacer baclhup de la DDBB<p></p></a>
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
</body>

</html>