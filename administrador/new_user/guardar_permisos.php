<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>valores</h1>
    <?php


    if (isset($_POST["crear_todo"])) {
        echo "Puede Crear y editar titulares, unidades, choferes y abonos.";
        echo "<br>";
        $crear_todo = $_POST['crear_todo'];
        //echo $crear_todo;
        echo "<br>";
    } else {
        echo "No puede crear ni ediatr titulares, unidades,choferes ni moviles. ";
        echo "<br>";
    }

    if (isset($_POST["edit_chof_unid"])) {
        echo "Puede editar choferes y unidades.";
        echo "<br>";
        $edit_chof_unid = $_POST['edit_chof_unid'];
        //echo $edit_chof_unid;
        echo "<br>";
    } else {
        echo "No puede editar ni choferes ni unidades. ";
        echo "<br>";
    }

    if (isset($_POST["modif_caja"])) {
        echo "Puede Modificar la Caja.";
        echo "<br>";
        $modif_caja = $_POST['modif_caja'];
        //echo $edit_chof_unid;
        echo "<br>";
    } else {
        echo "No puede modificar la caja. ";
        echo "<br>";
    }

    if (isset($_POST["modif_abono"])) {
        echo "Puede Modificar Abonos.";
        echo "<br>";
        $modif_abono = $_POST['modif_abono'];
        //echo $edit_chof_unid;
        echo "<br>";
    } else {
        echo "No puede modificar Abonos. ";
        echo "<br>";
    }

    if (isset($_POST["solo_cobra"])) {
        echo "Puede cobrar en Efectivo.";
        echo "<br>";
        $solo_cobra = $_POST['solo_cobra'];
        //echo $edit_chof_unid;
        echo "<br>";
    } else {
        echo "No puede cobrar en efectivo. ";
        echo "<br>";
    }

    if (isset($_POST["solo_voucher"])) {
        echo "Puede trabajar con Voucher.";
        echo "<br>";
        $solo_voucher = $_POST['solo_voucher'];
        //echo $edit_chof_unid;
        echo "<br>";
    } else {
        echo "No puede trabajar con voucher. ";
        echo "<br>";
    }



    ?>



</body>

</html>