<?php

session_start();
if ($_SESSION['logueado']) {

    $uname = $_SESSION['uname'] . '<br>';

    echo  "BIENVENIDO ,"  . $_SESSION['uname'] . '<br>';
    echo "Hora de conexión :" . $_SESSION['time'] . '<br>';

    echo "<br";
    echo "<br";

    include_once '../includes/db.php';
    $con = openCon('../config/db_admin.ini');
    $con->set_charset("utf8mb4");


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php

        $nombre = $_POST["username"];
        $pass_1 = md5($_POST['pass_1']);
        $pass_2 = md5($_POST['pass_2']);
        $email = $_POST['email'];
        $permiso = $_POST['permiso'];
        echo "<br>";
        echo "<br>";
        echo $nombre;
        echo "<br>";
        echo $pass_1;
        echo "<br>";
        echo $pass_2;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $permiso;

        if ($permiso == "elija") {
            echo "<br>";
            echo "<br>";
            echo "Seleccione permiso";
        ?>
            <script>
                alert("Seleccione Permiso")
                window.location = "nuevo_usuario.php";
            </script>
            <?php
        }

        if ($pass_1 === $pass_2) {
            echo "<br>";
            echo "<br>";
            echo "usuario correcto";

            $sql = "INSERT INTO users (username, PASSWORD, email, permiso, uname) VALUES (?, ?, ?, ?,?)";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("sssss", $nombre, $pass_1, $email, $permiso, $uname);

            if ($stmt->execute()) {
            ?>

                <script>
                    alert("NUEVO USUARIO CREADO CON EXITO")
                    window.location = "inicio_usuarios.php";
                </script>
            <?php

            } else {
                echo "error de ejecucion.";
            }
        } else {
            ?>
            <script>
                alert("Password incorrecto")
                window.location = "nuevo_usuario.php";
            </script>
        <?php
        }
        ?>
    </body>

    </html>
<?php
}
?>