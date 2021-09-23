/*!
 * Employees CRUD v1.0 (https://github.com/giusniyyel/employees-crud)
 * Copyright 2021 José Daniel Bautista Campos
 * Licensed under MIT (https://github.com/giusniyyel/employees-crud/blob/master/LICENSE)
*/
<?php
	require_once "conection.php";
	$conexion=conexion();

	$birthdate = $_POST['birthdate'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$second_lastname = $_POST['second_lastname'];
	$gender = $_POST['gender'];
	$hiredate = $_POST['hiredate'];
	$state = $_POST['state'];

	$sql="INSERT into employees (birth_date,first_name,last_name,second_lastname,gender,hire_date,birth_state)
				values('$birthdate','$first_name','$last_name','$second_lastname','$gender','$hiredate','$state')";

	echo $result=mysqli_query($conexion,$sql);
?>