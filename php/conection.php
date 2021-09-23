/*!
 * Employees CRUD v1.0 (https://github.com/giusniyyel/employees-crud)
 * Copyright 2021 José Daniel Bautista Campos
 * Licensed under MIT (https://github.com/giusniyyel/employees-crud/blob/master/LICENSE)
*/
<?php 
	function conexion(){
		$host="localhost";
		$user="root";
		$pass="";
		$db="employees";

		$conexion=mysqli_connect($host,$user,$pass,$db);

		return $conexion;
	}
?>