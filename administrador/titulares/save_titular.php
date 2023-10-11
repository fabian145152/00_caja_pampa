<?php
//esto indica la ruta del archivo que subi, upload_image.php

//session_start();
//if ($_SESSION['logueado']) {

// include_once 'upload_image.php';


$movil = $_POST['movil'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$cp = $_POST['cp'];
$dni = $_POST['dni'];
$licencia = $_POST['licencia'];
$cel = $_POST['cel'];


echo "<br>";
echo $movil;
echo "<br>";
echo $nombre;
echo "<br>";
echo $apellido;
echo "<br>";
echo $direccion;
echo "<br>";
echo $cp;
echo "<br>";
echo $dni;
echo "<br>";
echo $licencia;
echo "<br>";
echo $cel;
echo "<br>";


include_once '../../includes/db.php';
$con = openCon('../../config/db_admin.ini');
$con->set_charset("utf8mb4");



$sql = "UPDATE `completa`
        SET `nombre_titu` = '$nombre',
            `apellido_titu` = '$apellido',
            `dni_titu` = '$dni',
            `direccion_titu` = '$direccion',
            `cp_titu` = '$cp',
            `cel_titu` = '$cel',
            `licencia_titu` = '$licencia'
        WHERE
            id = $movil";



$stmt = $con->prepare($sql);
$stmt->bind_param("sssiii", $apellido, $direccion, $dni, $licencia, $cel);



if ($stmt->execute()) {
?>

    <script>
        alert("NUEVA UNIDAD COMPLETA CREADA")
        window.location = "list_titulares.php";
    </script>
<?php

}

?>