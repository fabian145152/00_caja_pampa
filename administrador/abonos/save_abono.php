<?php
//esto indica la ruta del archivo que subi, upload_image.php

//session_start();
//if ($_SESSION['logueado']) {

// include_once 'upload_image.php';

$abono = $_POST['abono'];
$importe = $_POST['importe'];




include_once '../../includes/db.php';
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");

$sql = "INSERT INTO abonos (abono, importe) VALUES (?, ?)";

//$path_img = $directorio . $nombre_img;

$stmt = $con->prepare($sql);
$stmt->bind_param("si", $abono, $importe);

if ($stmt->execute()) {
?>

    <script>
        alert("Titular Ingresado")
        window.location = "list_abonos.php";
    </script>
<?php

}
//}
?>