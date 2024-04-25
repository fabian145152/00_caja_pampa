<?php
session_start();

echo $nombre = $_POST['nombre'];
echo $importe = $_POST['valor'];

include_once '../../../includes/db.php';
include_once '../../../includes/variables.php';
$con = openCon('../../../config/db_admin.ini');
$con->set_charset("utf8mb4");

$sql = "INSERT INTO importe_viajes (nombre, importe) VALUES (?,?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("si", $nombre, $importe);

$stmt->execute();
if ($stmt->execute()) {

?>
    <script>
        alert("NUEVO IMPORTE x VIAJE CREADO CON EXITO")
        window.location = "viaje.php";
    </script>
<?php

} else {
?>
    <script>
        alert("IMPORTE DUPLICADO")
        window.location = "nuevo_imp_viaje.php";
    </script>
<?php
}
