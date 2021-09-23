CREATE TRIGGER `EmployeeDelete` AFTER DELETE ON `employees`
 FOR EACH ROW BEGIN

INSERT INTO bitacora (emp_no,activity,old_data) 
	VALUES (OLD.emp_no,"Se eliminó un empleado",CONCAT('Información Anterior: ', OLD.birth_date,' ',OLD.first_name,' ',OLD.last_name,' ',OLD.gender,' ',OLD.hire_date,' ',OLD.second_lastname,' ',OLD.birth_state,' ',OLD.emp_rfc,' ',OLD.emp_curp));

END