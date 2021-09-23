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
		<h1>Empleados</h1>
		<table class="table table-hover table-condensed table-bordered" id="tablaDinamicaLoad">
			<caption>
				<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">Agregar Empleado
					<span class="glyphicon glyphicon-plus"></span>
				</button>
			</caption>

			<thead>
				<tr>
					<td>Empleado</td>
					<td>Fecha de nacimiento</td>
					<td>Nombre</td>
					<td>Apellido Paterno</td>
					<td>Apellido Materno</td>
					<td>Género</td>
					<td>Fecha de contratación</td>
					<td>Entidad Federativa</td>
					<td>RFC</td>
					<td>CURP</td>
					<td>Editar</td>
					<td>Eliminar</td>
				</tr>
			</thead>

			<tbody>
				<?php

				$sql = "SELECT emp_no,birth_date,first_name,last_name,second_lastname,gender,hire_date,birth_state,emp_RFC,emp_CURP 
						from employees ORDER BY emp_no DESC LIMIT 100";
				$result = mysqli_query($conexion, $sql);

				while ($ver = mysqli_fetch_row($result)) {

					$datos = $ver[0] . "||" .
						$ver[1] . "||" .
						$ver[2] . "||" .
						$ver[3] . "||" .
						$ver[4] . "||" .
						$ver[5] . "||" .
						$ver[6] . "||" .
						$ver[7] . "||" .
						$ver[8] . "||" .
						$ver[9];

				?>

					<tr>
						<td><?php echo $ver[0] ?></td>
						<td><?php echo $ver[1] ?></td>
						<td><?php echo $ver[2] ?></td>
						<td><?php echo $ver[3] ?></td>
						<td><?php echo $ver[4] ?></td>
						<td><?php echo $ver[5] ?></td>
						<td><?php echo $ver[6] ?></td>
						<td><?php echo $ver[7] ?></td>
						<td><?php echo $ver[8] ?></td>
						<td><?php echo $ver[9] ?></td>
						<td>
							<button class="btn btn-warning" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
								<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							</button>
						</td>
						<td>
							<button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $ver[0] ?>')"></button>
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#tablaDinamicaLoad').DataTable({
			order: [
				[0, 'desc']
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