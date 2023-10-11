<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/main.css">
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
    echo $pesos = $_POST['pesos'];
    echo $id = $_POST['movil'];
    ?>
    <h1>Caja Moviles</h1>
    <br><br>
    <div>
        <form class="form" action="ver_datos.php" method="GET" name="movil">
            <h1>Ingrese Movil</h1>
            <br><br>
            <input type="text" name="movil" class="gui-input" autofocus>
            <br>
            <h1>Presione enter</h1>
        </form>
    </div>
    <a href="../../index.php">Salir</a>
</body>

</html>