<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h4>Semana</h4>

    <?php

    include_once '../../../includes/db.php';
    include_once '../../../includes/variables.php';
    $con = openCon('../../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    if ($con->connect_error) {
        die("Error de conexión a la primera base de datos: " . $con->connect_error);
    }

    // Definir la ruta del archivo donde se almacenará la variable
    $archivo = "semana.txt";

    // Obtener el número de la semana actual
    $semana_actual = date('W');

    // Verificar si el archivo existe
    if (file_exists($archivo)) {
        // Si el archivo existe, leer el contenido para obtener la última semana registrada
        $semana_anterior = file_get_contents($archivo);

        // Verificar si la semana actual es diferente a la semana anterior
        if ($semana_actual != $semana_anterior) {
            // Si la semana ha cambiado, incrementar la variable
            $variable = 1; // Puedes cambiar este valor según tus necesidades

            $sql = "SELECT * FROM semanas WHERE 1";
            $listar = $con->query($sql);

    ?>
            <table class="table table-bordered table-sm table-hover">
                <div>

                    <tr>
                        <th>Id</th>
                        <th>Movil</th>
                        <th>paga x semana</th>
                        <th>total</th>
                        <th>fecha</th>

                    </tr>
                    </thead>
                </div>
                <thead class="thead-dark">
                    <div>
                        <thead>
                            <?php

                            while ($ver = $listar->fetch_assoc()) {
                            ?>
                                <tr>
                                    <th><?php echo $id = $ver['id'] ?></th>
                                    <th><?php echo $movil = $ver['movil'] ?></th>
                                    <th><?php echo $x_semana = $ver['x_semana'] ?></th>
                                    <th><?php echo $total = $ver['total'] ?></th>
                                    <th><?php echo $fecha = $ver['fecha'] ?></th>
                                    >

                                </tr>
                            <?php
                            }
                            ?>
                        </thead>
                    </div>
            </table>

        <?php


            // Guardar la semana actual en el archivo para futuras comparaciones
            file_put_contents($archivo, $semana_actual);

            // Mostrar un mensaje o realizar cualquier otra acción cuando cambia la semana
            echo "¡La semana ha cambiado! Variable incrementada a: " . $variable;
        } else {
            // Si la semana no ha cambiado, cargar la variable desde el archivo

            //$variable = file_get_contents("variable.txt");

            echo $variable = file_get_contents("variable.txt");

            // Mostrar el valor actual de la variable
            echo "Variable actual: " . $variable;
        }
    } else {
        // Si el archivo no existe, crearlo y guardar la semana actual
        file_put_contents($archivo, $semana_actual);

        // Inicializar la variable
        $variable = 1; // Puedes cambiar este valor según tus necesidades

        // Mostrar un mensaje o realizar cualquier otra acción para la primera semana
        echo "¡Es la primera semana! Variable inicializada a: " . $variable;
    }

    $sql_3 = "SELECT * FROM semanas WHERE 1";
    $listarla = $con->query($sql_3);
    while ($verla = $listarla->fetch_assoc()) {
        ?>
        <table>
            <tr>
                <th><?php echo "Movil: " . $movil = $verla['movil'] ?></th>
                <th><?php echo "Paga x semana: " . $x_semana = $verla['x_semana']; ?></th>
                <th><?php echo "Total: " . $total = $verla['total']; ?></th>

            </tr>
        </table>
    <?php
        echo $movil;
        echo " - ";
        echo $suma = $x_semana + $total;
        echo "<br>";

        $inc_semana = "UPDATE semanas SET total = '$suma' WHERE movil = '$movil'";


        $con->query($inc_semana);
    }

    header('Location:../../../menu.php');

    ?>

</body>

</html>