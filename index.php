/*!
 * Employees CRUD v1.0 (https://github.com/giusniyyel/employees-crud)
 * Copyright 2021 José Daniel Bautista Campos
 * Licensed under MIT (https://github.com/giusniyyel/employees-crud/blob/master/LICENSE)
*/
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Empleados</title>
	<link rel="stylesheet" type="text/css" href="libraries/boostrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="libraries/boostrap/css/glyphicon.css">
	<link rel="stylesheet" type="text/css" href="libraries/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="libraries/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="libraries/datatable/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="libraries/datatable/dataTables.bootstrap4.min.css">

	<script src="libraries/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script src="js/funtions.js" type="text/javascript"></script>
	<script src="libraries/boostrap/js/bootstrap.js" type="text/javascript"></script>
	<script src="libraries/alertifyjs/alertify.js"></script>
	<script src="libraries/datatable/jquery.dataTables.min.js"></script>
	<script src="libraries/datatable/dataTables.bootstrap4.min.js"></script>
</head>

<body>

	<header id="header" class="header">
		<nav class="navbar navbar-expand-sm bg-primary navbar-dark fixed-top">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Empleados</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="bitacora.php">Bitacora</a>
				</li>
			</ul>
		</nav>
	</header><!-- /header -->

	<br>

	<div class="container">
		<div id="table"></div>
	</div>

	<!-- Modal Registro Nuevo -->
	<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar Empleado</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<label>Fecha de nacimiento</label>
					<input type="date" name="" id="birthdate" class="form-control input-sm">

					<label>Nombre</label>
					<input type="text" name="" id="first_name" class="form-control input-sm">

					<label>Apellido Paterno</label>
					<input type="text" name="" id="last_name" class="form-control input-sm">

					<label>Apellido Materno</label>
					<input type="text" name="" id="second_lastname" class="form-control input-sm">

					<label>Género</label>
					<select class="form-control input-sm" name="" id="gender">
						<option disabled selected>Seleccione su género</option>
						<option value="M">Hombre</option>
						<option value="F">Mujer</option>
					</select>

					<label>Fecha de contratación</label>
					<input type="date" name="" id="hiredate" class="form-control input-sm">

					<label>Entidad Federativa</label>
					<select class="form-control input-sm" name="" id="state">
						<option disabled selected>Seleccione una Entidad Federativa</option>
						<option value="Aguascalientes">Aguascalientes</option>
						<option value="Baja California">Baja California</option>
						<option value="Baja California Sur">Baja California Sur</option>
						<option value="Distrito Federal">Ciudad de México</option>
						<option value="Chiapas">Chiapas</option>
						<option value="Campeche">Campeche</option>
						<option value="Chihuahua">Chihuahua</option>
						<option value="Coahuila">Coahuila</option>
						<option value="Colima">Colima</option>
						<option value="Durango">Durango</option>
						<option value="Guanajuato">Guanajuato</option>
						<option value="Guerrero">Guerrero</option>
						<option value="Hidalgo">Hidalgo</option>
						<option value="Jalisco">Jalisco</option>
						<option value="Mèxico">Estado de México</option>
						<option value="Michoacàn">Michoacan</option>
						<option value="Morelos">Morelos</option>
						<option value="Nayarit">Nayarit</option>
						<option value="Nuevo Leòn">Nuevo León</option>
						<option value="Oaxaca">Oaxaca</option>
						<option value="Puebla">Puebla</option>
						<option value="Querètaro">Querétaro</option>
						<option value="Quintana Roo">Quintana Roo</option>
						<option value="San Luis Potosí">San Luis Potosí</option>
						<option value="Sinaloa">Sinaloa</option>
						<option value="Sonora">Sonora</option>
						<option value="Tabasco">Tabasco</option>
						<option value="Tamaulipas">Tamaulipas</option>
						<option value="Tlaxcala">Tlaxcala</option>
						<option value="Veracruz">Veracruz</option>
						<option value="Yucatan">Yucatan</option>
						<option value="Zacatecas">Zacatecas</option>
					</select>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">Agregar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal para edición de datos -->
	<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modificar Empleado</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<input type="text" hidden="" id="idpersona" name="">

					<label>Fecha de nacimiento</label>
					<input type="date" name="" id="birthdateu" class="form-control input-sm">

					<label>Nombre</label>
					<input type="text" name="" id="first_nameu" class="form-control input-sm">

					<label>Apellido Paterno</label>
					<input type="text" name="" id="last_nameu" class="form-control input-sm">

					<label>Apellido Materno</label>
					<input type="text" name="" id="second_lastnameu" class="form-control input-sm">

					<label>Género</label>
					<select class="form-control input-sm" name="" id="genderu">
						<option disabled selected>Seleccione su género</option>
						<option value="M">Hombre</option>
						<option value="F">Mujer</option>
					</select>

					<label>Fecha de contratación</label>
					<input type="date" name="" id="hiredateu" class="form-control input-sm">

					<label>Entidad Federativa</label>
					<select class="form-control input-sm" name="" id="stateu">
						<option disabled selected>Seleccione una Entidad Federativa</option>
						<option value="Aguascalientes">Aguascalientes</option>
						<option value="Baja California">Baja California</option>
						<option value="Baja California Sur">Baja California Sur</option>
						<option value="Ciudad de México">Ciudad de México</option>
						<option value="Chiapas">Chiapas</option>
						<option value="Campeche">Campeche</option>
						<option value="Chihuahua">Chihuahua</option>
						<option value="Coahuila">Coahuila</option>
						<option value="Colima">Colima</option>
						<option value="Durango">Durango</option>
						<option value="Guanajuato">Guanajuato</option>
						<option value="Guerrero">Guerrero</option>
						<option value="Hidalgo">Hidalgo</option>
						<option value="Jalisco">Jalisco</option>
						<option value="Estado de México">Estado de México</option>
						<option value="Michoacan">Michoacan</option>
						<option value="Morelos">Morelos</option>
						<option value="Nayarit">Nayarit</option>
						<option value="Nuevo León">Nuevo León</option>
						<option value="Oaxaca">Oaxaca</option>
						<option value="Puebla">Puebla</option>
						<option value="Querétaro">Querétaro</option>
						<option value="Quintana Roo">Quintana Roo</option>
						<option value="San Luis Potosí">San Luis Potosí</option>
						<option value="Sinaloa">Sinaloa</option>
						<option value="Sonora">Sonora</option>
						<option value="Tabasco">Tabasco</option>
						<option value="Tamaulipas">Tamaulipas</option>
						<option value="Tlaxcala">Tlaxcala</option>
						<option value="Veracruz">Veracruz</option>
						<option value="Yucatan">Yucatan</option>
						<option value="Zacatecas">Zacatecas</option>
					</select>

					<label>RFC</label>
					<input type="text" name="" id="emp_rfcu" class="form-control input-sm">

					<label>CURP</label>
					<input type="text" name="" id="emp_curpu" class="form-control input-sm">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-warning" data-dismiss="modal" id="actualizaDatos">Actualizar</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<footer class="page-footer font-small bg-primary">

		<!-- Copyright -->
		<div class="text-white text-center py-3">José Daniel Bautista Campos © 2020 Copyright:
			<a class="text-dark" href="https://giusniyyel.com/"> giusniyyel.com</a>
		</div>
		<!-- Copyright -->

	</footer>
	<!-- Footer -->

</body>

</html>

<script type="text/javascript">
	$(document).ready(function() {
		$('#table').load('components/table.php');
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#guardarnuevo').click(function() {
			birthdate = $('#birthdate').val();
			first_name = $('#first_name').val();
			last_name = $('#last_name').val();
			second_lastname = $('#second_lastname').val();
			gender = $('#gender').val();
			hiredate = $('#hiredate').val();
			state = $('#state').val();
			agregardatos(birthdate, first_name, last_name, second_lastname, gender, hiredate, state);
		});

		$('#actualizaDatos').click(function() {
			actualizaDatos();
		});

	});
</script>