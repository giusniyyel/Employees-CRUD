/*!
 * Employees CRUD v1.0 (https://github.com/giusniyyel/employees-crud)
 * Copyright 2021 José Daniel Bautista Campos
 * Licensed under MIT (https://github.com/giusniyyel/employees-crud/blob/master/LICENSE)
*/
<?php 

	require_once "conection.php";
	$conexion=conexion();

	$id = $_POST['id'];
	$birthdate = $_POST['birthdate'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$second_lastname = $_POST['second_lastname'];
	$gender = $_POST['gender'];
	$hiredate = $_POST['hiredate'];
	$state = $_POST['state'];
	$emp_rfc = $_POST['emp_rfc'];
	$emp_curp = $_POST['emp_curp'];

	$sql="UPDATE employees set birth_date='$birthdate',
								first_name='$first_name',
								last_name='$last_name',
								second_lastname='$second_lastname',
								gender='$gender',
								hire_date='$hiredate',
								birth_state='$state',
								emp_rfc='$emp_rfc',
								emp_curp='$emp_curp' 
								where emp_no='$id'";

	echo $result=mysqli_query($conexion,$sql);

?>