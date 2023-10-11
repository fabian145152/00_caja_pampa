<?php




$movil = $_POST['movil'];
//Trae solo el ID del registro
$titular = $_POST['titular'];               //Trae solo el ID del registro
$chofer = $_POST['chofer'];                 //Trae solo el ID del registro
$unidad = $_POST['modelo'];                 //Trae solo el ID del registro
$abono = $_POST['abono'];                   //Trae solo el ID del registro

$id_movil = substr($movil, 0, 4);
$id_titular = substr($titular, 0, 4);
$id_chofer = substr($chofer, 0, 4);
$id_unidad = substr($unidad, 0, 4);
$id_abono =  substr($abono, 0, 4);


echo "Movil: " . $id_movil;
echo "<br>";
echo "titular: " . $id_titular;
echo "<br>";
echo "Chofer: " . $id_chofer;
echo "<br>";
echo "Unidad: " . $id_unidad;
echo "<br>";
echo "Abono: " . $id_abono;
echo "<br>";



include_once '../../includes/db.php';
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");


$sql = "INSERT INTO unidad_armada (movil, titular, chofer, unidad, abono) VALUES (?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("iiiii", $id_movil, $id_titular, $id_chofer, $id_unidad, $id_abono);

if ($stmt->execute()) {

?>
    <script>
        alert("Titular Ingresado")
        window.location = "list_unidad.php";
    </script>
<?php

}
