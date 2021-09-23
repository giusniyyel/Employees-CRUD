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
				<li class="nav-item">
					<a class="nav-link" href="index.php">Empleados</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="#">Bitacora</a>
				</li>
			</ul>
		</nav>
	</header>
	<!-- /header -->

	<br>

	<div class="container">
		<div id="table"></div>
	</div>

	<!-- Footer -->
	<footer class="page-footer font-small bg-primary fixed-bottom">

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
		$('#table').load('components/table_bitacora.php');
	});
</script>