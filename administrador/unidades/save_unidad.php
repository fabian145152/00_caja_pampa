
<?php


// include_once 'upload_image.php';

$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$dominio = $_POST['dominio'];
$año = $_POST['año'];
$movil = $_POST['movil'];


include_once '../../includes/db.php';
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");

$sql = "INSERT INTO unidades (marca, modelo, dominio, año) VALUES (?, ?, ?, ?)";

//$path_img = $directorio . $nombre_img;

$stmt = $con->prepare($sql);
$stmt->bind_param("sssi", $marca, $modelo, $dominio, $año);

if ($stmt->execute()) {
?>

    <script>
        alert("Nueva Unidad Ingresada")
        window.location = "list_unidades.php";
    </script>
<?php

}
//}
?>