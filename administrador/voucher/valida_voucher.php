<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Valida y guarda Voucher</h1>
    <?php
    echo $id = $_POST['id'];
    echo "<br>";
    echo $movil = $_POST['movil'];
    echo "<br>";
    echo $fecha = $_POST['fecha'];
    echo "<br>";
    echo $viaje_no = $_POST['viaje_no'];
    echo "<br>";
    echo $cc = $_POST['cc'];
    echo "<br>";
    echo $reloj = $_POST['reloj'];
    echo "<br>";
    echo $peaje = $_POST['peaje'];
    echo "<br>";
    echo $equipaje = $_POST['equipaje'];
    echo "<br>";
    echo $adicional = $_POST['adicional'];
    echo "<br>";
    echo $plus = $_POST['plus'];
    echo "<br>";


    include_once '../../includes/db.php';
    $con = openCon('../../config/db_admin.ini');
    $con->set_charset("utf8mb4");

    //exit();
    if ($con->connect_error) {
        die("Conexión fallida: " . $con->connect_error);
    }

    $guarda = "INSERT INTO 
    voucher_validado (movil, fecha, viaje_no, cc, reloj, peaje, equipaje, adicional, plus) VALUES (?,?,?,?,?,?,?,?,?)";

    $stmt = $con->prepare($guarda);

    $stmt->bind_param('ssiiddddd', $movil, $fecha, $viaje_no, $cc, $reloj, $peaje, $equipaje, $adicional, $plus);
    //$stmt->execute();

    if ($stmt->Execute()) {
        echo "Exito Registro agregado";
    } else {
        echo "Error";
    }
    echo $id;
    echo "<br>";
    echo $movil;


    $sql_borra = "DELETE FROM voucher_temporales WHERE viaje_no = '$viaje_no'";
    $result = $con->query($sql_borra);

    $sql_2 = "DELETE FROM voucher_nuevos WHERE viaje_no = $viaje_no";
    $res = $con->query($sql_2);


    //header("Location:buscador_voucher?='$movil'.php");
    ?>

    <p>Falta hacer el direcionamiento en esta pagina</p>
    <p>agregarle el numero de movil</p>
    <p>ya borra los viajes en la tabla voucher_nuevos y
        voucher_temorales</p>


</body>

</html>