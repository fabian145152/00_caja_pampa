<?php
session_start();
if ($_SESSION['logueado']) {

	echo "BIENVENIDO ,"  . $_SESSION['uname'] . '<br>';

	echo "Hora de conexión :" . $_SESSION['time'] . '<br>';
?>



	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>VOUCHER</title>
		<link rel="stylesheet" href="../../css/bootstrap.min.css">
		<script src="../../js/jquery-3.4.1.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/bootbox.min.js"></script>

		<script>
			function deleteProduct(cod_voucher) {
				window.location = "borrar_voucher.php?q=" + cod_voucher;
			}
		</script>

	</head>

	<body>
		<style>
			body {
				margin: 0px 50px;
			}
		</style>
		<h1 class="text-center" style="margin: 5px ; ">CARGA DE VOUCHER</h1>

		<?php
		date_default_timezone_set('America/Mexico_City');
		$fechaActual = date('Y-m-d');
		$fechaActual;
		$semana = date('W');
		?>
		<h5 style="text-align: center;"><?php echo $fechaActual . " " . "Semana: " . $semana ?></h5>
		<div class="row">
			<form method="post" id="addproduct" action="import_voucher.php" enctype="multipart/form-data" role="form">

				&nbsp; &nbsp;<input type="file" name="name" id="name" class="btn btn-success btn-sm" placeholder="Archivo (.xlsx)">
				&nbsp; &nbsp;<button type="submit" class="btn btn-success btn-sm">Importar Datos</button>
				&nbsp;
			</form>
			<form method="post" id="busca" action="buscador_voucher.php" enctype="multipart/form-data" role="form">
				<h5>Buscar x
					<!-- <input type="date" id="fecha" name="fecha"> -->
					<input type="text" style="width : 100px " id="movil" name="movil" placeholder="MOVIL">
					<!-- <input type="text" style="width : 100px " id="viaje" name="viaje" placeholder="VIAJE"> -->
					<button>Buscar</button>
					<input type="reset" value="Reset buscador">
				</h5>
			</form>
			&nbsp; &nbsp;&nbsp; &nbsp;
			<a href="borrar_voucher.php" class="btn btn-success btn-sm">LIMPIAR DDBB</a>
			&nbsp; &nbsp;&nbsp; &nbsp;
			<a href="../../menu.php" class="btn btn-success btn-sm">SALIR</a>
		</div>

		<?php
		include_once '../../includes/db.php';

		$con = openCon('../../config/db_admin.ini');
		$con->set_charset("utf8mb4");

		$sql = "SELECT * FROM voucher_nuevos WHERE 1 ORDER BY movil";
		$datos = $con->query($sql);

		?>
		<h5 style="text-align: center;"><?php echo $datos->num_rows; ?> Voucher importados</h5>


		<table class="table table-bordered table-sm table-hover">
			<thead class="thead-dark">

				<th>id</th>
				<th>V No.</th>
				<th>Competado</th>
				<th>Nom Pasajero</th>
				<th>Movil</th>
				<th>CC</th>
				<th>Reloj</th>
				<th>Peaje</th>
				<th>Equipaje</th>
				<th>Adicional</th>
				<th>Plus</th>
				<th>Total</th>
				<th>Borrar</th>


			</thead>

			<?php

			while ($d = $datos->fetch_assoc()) {

			?>
				<tr>
					<td><?php echo $d['id']; ?></td>
					<td><?php echo $d['viaje_no']; ?></td>
					<td><?php echo $d['completado']; ?></td>
					<td><?php echo $d['nom_pasaj']; ?></td>
					<td><?php echo $d['movil']; ?></td>
					<td><?php echo $d['cc']; ?></td>
					<td><?php echo $d['reloj']; ?></td>
					<td><?php echo $d['peaje']; ?></td>
					<td><?php echo $d['equipaje']; ?></td>
					<td><?php echo $d['adicional']; ?></td>
					<td><?php echo $d['plus']; ?></td>
					<td><?php echo $d['total'] ?></td>

					<td><a class="btn btn-danger btn-sm" href="#" onclick="deleteProduct(<?php echo $d['id'] ?>)">Borrar</a></td>
				</tr>
			<?php
			}
			?>
		</table>
	</body>

	</html>
<?php
}
?>