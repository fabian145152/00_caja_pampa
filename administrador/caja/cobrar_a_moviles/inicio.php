<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <script src="../../../js/jquery-3.4.1.min.js"></script>
    <script src="../../../js/bootstrap.min.js"></script>
    <script src="../../../js/bootbox.min.js"></script>
    <style>
        .form {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .form input {
            text-align: center;
            width: 90%;
            height: 30px;
            margin: 0.5rem;
        }

        h1 {
            text-align: center;
        }
    </style>

</head>

<body>


    <br><br>

    <?php
    //echo $pesos = $_POST['pesos'];

    ?>
    <h1>Caja Moviles</h1>
    <br><br>
    <h1>Dia: <?php

                date_default_timezone_set('America/Mexico_City');
                $fechaActual = date('d-m-Y');
                echo $fechaActual;
                echo "<br>";
                $semana = date('W');
                echo "Semana: " . $semana;
                ?>

        <div>
            <form class="form" action="ver_datos.php" method="POST" name="movil">
                <h1>Ingrese Movil</h1>
                <br><br>
                <input type="text" name="movil" class="gui-input" autofocus>
                <br>
                <h1>Presione enter</h1>
            </form>
        </div>
        <a href="../../../index.php">Salir</a>
</body>

</html>