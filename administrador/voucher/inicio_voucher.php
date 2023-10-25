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
			bootbox.confirm("Desea Guardar?" + cod_voucher, function(result) {
				if (result) {
					window.location = "guardar_voucher.php?q=" + cod_voucher;
				}

			});
		}

		function detalleProduct(cod_voucher) {
			window.location = "detalle_voucher.php?q=" + cod_voucher;
		}

		/* ahora viene la funcion update*/
		function updateProduct(cod_voucher) {
			window.location = "edit_voucher.php?q=" + cod_voucher;
		}
	</script>
</head>

<body>


	<h1 class="text-center" style="margin: 5px ; ">CONTROL DE VOUCHER</h1>

	<h2 class="text-center" style="margin: 5px ; ">Agregar filtro por fecha y por móvil.</h2>
	<h2 class="text-center" style="margin: 5px ; ">una vez que este creado agregar numero de semana</h2>
	<h2 class="text-center" style="margin: 5px ; ">Diferenciar si el viaje es en ft o de cuenta.</h2>

	<div class="row">

		<form method="post" id="addproduct" action="import_voucher.php" enctype="multipart/form-data" role="form">

			&nbsp; &nbsp;<input type="file" name="name" id="name" class="btn btn-success btn-sm" placeholder="Archivo (.xlsx)">
			&nbsp; &nbsp;<button type="submit" class="btn btn-success btn-sm">Importar Datos</button>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			<a href="exportar_tabla.php" class="btn btn-success btn-sm">Exportar</a>
			&nbsp; &nbsp;&nbsp; &nbsp;
			<a href="borrar_voucher.php" class="btn btn-success btn-sm">LIMPIAR DDBB</a>
			&nbsp; &nbsp;&nbsp; &nbsp;
			<a href="../../index.php" class="btn btn-success btn-sm">SALIR</a>
		</form>
	</div>


	<?php

	include_once '../../includes/db.php';

	$con = openCon('../../config/db_admin.ini');
	$con->set_charset("utf8mb4");

	$sql = "SELECT * FROM voucher_nuevos WHERE 1 ORDER BY movil";
	$datos = $con->query($sql);

	?>
	<p>Resultados: <?php echo $datos->num_rows;
					?></p>


	<table class="table table-bordered table-sm table-hover">
		<thead class="thead-dark">

			<th>id</th>
			<th>V No.</th>
			<th>Nom Pasajero</th>
			<th>Movil</th>
			<th>CC</th>
			<th>Reloj</th>
			<th>Peaje</th>
			<th>Equipaje</th>
			<th>Adicional</th>
			<th>Plus</th>
			<th>Total</th>
			<th>Operador</th>
			<th>Detalles</th>
			<th>Actualizar</th>
			<th>Guardar</th>


		</thead>

		<?php



		while ($d = $datos->fetch_assoc()) {

		?>
			<tr>
				<td><?php echo $d['id']; ?></td>
				<td><?php echo $d['viaje_no']; ?></td>
				<td><?php echo $d['nom_pasaj']; ?></td>
				<td><?php echo $d['movil']; ?></td>
				<td><?php echo $d['cc']; ?></td>
				<td><?php echo $d['reloj']; ?></td>
				<td><?php echo $d['peaje']; ?></td>
				<td><?php echo $d['equipaje']; ?></td>
				<td><?php echo $d['adicional']; ?></td>
				<td><?php echo $d['plus']; ?></td>
				<td><?php echo $d['total'] ?></td>
				<td><?php echo $d['operador'] ?></td>

				<td> <a class="btn btn-primary btn-sm" href="#" onclick="detalleProduct(<?php echo $d['id']; ?>)">Detalles</td>
				<td> <a class="btn btn-primary btn-sm" href="#" onclick="updateProduct(<?php echo $d['id']; ?>)">Actualizar</td>
				<td> <a class="btn btn-danger btn-sm" href="#" onclick="deleteProduct(<?php echo $d['id']; ?>)">Guardar</td>
			</tr>

		<?php
		}
		?>
	</table>




</body>

</html>