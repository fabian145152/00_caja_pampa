<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>






    <div>
        <form class="form" action="genera.php" method="POST" name="movil">
            <h1>Ingrese Movil</h1>
            <br><br>
            <input type="text" name="movil" class="gui-input" autofocus>
            <br><br>
            <input type="submit" value="BUSCAR" class=" btn btn-primary">
        </form>
    </div>
</body>

</html>