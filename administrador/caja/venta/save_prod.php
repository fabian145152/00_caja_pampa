<?php session_start();

$nombre = $_POST['nombre'];
$descripcion = $_POST['desc'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

echo $nombre;
echo "<br>";
echo $descripcion;
echo "<br>";
echo $precio;
echo "<br>";
echo $stock;



include_once '../../../includes/db.php';
$con = openCon('../../../config/db_admin.ini');
$con->set_charset("utf8mb4");

$sql = "INSERT INTO productos (nombre, descripcion, precio, stock)  VALUES (?,?,?,?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $stock);



if ($stmt->execute()) {

    ?>
    
        <script>
            alert("NUEVO PRODUCTO CREADO CON EXITO")
            window.location = "venta_prod.php";
        </script>
    <?php
    
    } else {
    ?>
        <script>
            alert("ERROR")
            window.location = "venta_prod.php";
        </script>
    <?php
    }


