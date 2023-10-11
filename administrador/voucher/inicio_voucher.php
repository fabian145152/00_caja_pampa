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
			/*  Si no le pongo nada entre los parentesis() me borra todo o sea que 
			la funcion se ejecuta siempore igual. 
			Tengo que cambiarle los parametros de entrada para que la ejecute como yo quiero. 
			Si no tiene ningun paramtero generaliza, si lo tiene se ejecuta de forma particular*/
			bootbox.confirm("Desea Eliminar?" + cod_voucher, function(result) {
				/*  si la funcion no tiene nombre es una funcion anonima function() o function = nombre()  */
				if (result) {
					window.location = "delete_voucher.php?q=" + cod_voucher;
				}
				/*  La ?q es como si fuera el metodo $_GET */
			});
		}

		/* ahora viene la funcion update*/
		function updateProduct(cod_voucher) {
			window.location = "edit_voucher.php?q=" + cod_voucher;
		}
	</script>
</head>

<body>

	<?php
	include "database.php";
	$datos = $con->query("select * from voucher_nuevos");
	?>	
	<h1 class="text-center" style="margin: 5px ; ">LISTADO DE VOUCHER</h1>
	
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


	<?php if ($datos->num_rows > 0) : ?>

		<p>Resultados <?php echo $datos->num_rows; ?></p>
		<table class="table table-bordered table-sm table-hover">
			<thead class="thead-dark">

				<th>id</th>
				<th>V No.</th>
				<th>Inicio</th>
				<th>Estado</th>
				<th>Nom Pasajero</th>
				<th>Cel pasajero</th>
				<th>Movil</th>
				<th>Nom Chofer</th>
				<th>DNI pas</th>
				<th>Marca</th>
				<th>Patente</th>
				<th>C Costo</th>
				<th>CC</th>
				<th>Traslado</th>
				<th>Siniestro</th>
				<th>Solicitado</th>
				<th>Completado</th>
				<th>Destino</th>
				<th>Reloj</th>
				<th>Peaje</th>
				<th>Equipaje</th>
				<th>Adicional</th>
				<th>Plus</th>
				<th>Total</th>
				<th>Operador</th>
				<th>Autorizante</th>
				<th>Obs Pasajero</th>
				<th>Obs Operador</th>

			</thead>
			<?php while ($d = $datos->fetch_object()) : ?>
				<tr>
					<td><?php echo $d->id; ?></td>
					<td><?php echo $d->viaje_no; ?></td>
					<td><?php echo $d->origen; ?></td>
					<td><?php echo $d->estado;  ?></td>
					<td><?php echo $d->nom_pasaj; ?>sd</td>
					<td><?php echo $d->tel_pasaj; ?></td>
					<td><?php echo $d->movil; ?></td>
					<td><?php echo $d->chof; ?></td>
					<td><?php echo $d->dni; ?></td>
					<td><?php echo $d->marca; ?></td>
					<td><?php echo $d->patente; ?></td>
					<td><?php echo $d->c_costo; ?></td>
					<td><?php echo $d->cc; ?></td>
					<td><?php echo $d->traslado; ?></td>
					<td><?php echo $d->siniestro; ?></td>
					<td><?php echo $d->solicitado; ?></td>
					<td><?php echo $d->completado; ?></td>
					<td><?php echo $d->destino; ?></td>
					<td><?php echo $d->reloj; ?></td>
					<td><?php echo $d->peaje; ?></td>
					<td><?php echo $d->equipaje; ?></td>
					<td><?php echo $d->adicional; ?></td>
					<td><?php echo $d->plus; ?></td>
					<td><?php echo $d->total ?></td>
					<td><?php echo $d->operador ?></td>
					<td><?php echo $d->autorizante ?></td>
					<td><?php echo $d->obs_chof ?></td>
					<td><?php echo $d->obs_pas ?></td>

				</tr>

			<?php endwhile; ?>
		</table>
	<?php else : ?>
		<h3>No hay Datos</h3>
	<?php endif; ?>

</body>

</html>