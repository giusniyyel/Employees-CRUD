/*!
 * Employees CRUD v1.0 (https://github.com/giusniyyel/employees-crud)
 * Copyright 2021 José Daniel Bautista Campos
 * Licensed under MIT (https://github.com/giusniyyel/employees-crud/blob/master/LICENSE)
*/
<?php

require_once "../php/conection.php";
$conexion = conexion();

?>

<div class="row">
	<div class="col-sm-12">
		<h1>Bitácora</h1>
		<table class="table table-hover table-condensed table-bordered" id="tablaDinamicaLoad">
			<caption>
			</caption>

			<thead>
				<tr>
					<td>Número de Empleado</td>
					<td>Fecha del evento</td>
					<td>Evento</td>
					<td>Información Actual</td>
					<td>Información Anterior</td>
					<td>Eliminar</td>
				</tr>
			</thead>

			<tbody>
				<?php

				$sql = "SELECT bitacora_no,emp_no,date_modified,activity,new_data,old_data 
						from bitacora ORDER BY bitacora_no DESC LIMIT 100";
				$result = mysqli_query($conexion, $sql);

				while ($ver = mysqli_fetch_row($result)) {

					$datos = $ver[0] . "||" .
						$ver[1] . "||" .
						$ver[2] . "||" .
						$ver[3] . "||" .
						$ver[4] . "||" .
						$ver[5];
				?>

					<tr>
						<td><?php echo $ver[1] ?></td>
						<td><?php echo $ver[2] ?></td>
						<td><?php echo $ver[3] ?></td>
						<td><?php echo $ver[4] ?></td>
						<td><?php echo $ver[5] ?></td>
						<td>
							<button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNoBitacora('<?php echo $ver[0] ?>')"></button>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<br>
		<br>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tablaDinamicaLoad').DataTable({
			order: [
				[1, 'desc']
			],
			language: {
				"sProcessing": "Procesando...",
				"sLengthMenu": "Mostrar _MENU_ registros",
				"sZeroRecords": "No se encontraron resultados",
				"sEmptyTable": "Ningún dato disponible en esta tabla :c",
				"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix": "",
				"sSearch": "Buscar:",
				"sUrl": "",
				"sInfoThousands": ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst": "Primero",
					"sLast": "Último",
					"sNext": "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				},
				"buttons": {
					"copy": "Copiar",
					"colvis": "Visibilidad"
				}
			}
		});
	});
</script>