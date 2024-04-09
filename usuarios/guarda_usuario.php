<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    /*
session_start();
if ($_SESSION['logueado']) {
    
    echo "BIENVENIDO ,"  . $_SESSION['uname'] . '<br>';
    
    echo "Hora de conexión :" . $_SESSION['time'] . '<br>';
    echo "<br";
    echo "<br";
    echo "<br";
    echo "<br";
    */

    $nombre = $_POST["username"];
    $pass_1 = md5($_POST['pass_1']);
    $pass_2 = md5($_POST['pass_2']);
    $email = $_POST['email'];
    echo "<br>";
    echo "<br>";
    echo $nombre;
    echo "<br>";
    echo $pass_1;
    echo "<br>";
    echo $pass_2;
    echo "<br>";
    echo $email;


    ?>


</body>

</html>