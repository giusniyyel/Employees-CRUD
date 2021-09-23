/*!
 * Employees CRUD v1.0 (https://github.com/giusniyyel/employees-crud)
 * Copyright 2021 José Daniel Bautista Campos
 * Licensed under MIT (https://github.com/giusniyyel/employees-crud/blob/master/LICENSE)
*/
<?php 
	require_once "conection.php";
	$conexion=conexion();
	$id=$_POST['id'];

	$sql="DELETE from employees where emp_no='$id'";
	echo $result=mysqli_query($conexion,$sql);
?>