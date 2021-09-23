CREATE TRIGGER `EmployeeInsert` AFTER INSERT ON `employees`
 FOR EACH ROW BEGIN

INSERT INTO bitacora (emp_no,activity,new_data) 
	VALUES (NEW.emp_no,"Se insertó un nuevo empleado",CONCAT('Información Actual: ', NEW.birth_date,' ',NEW.first_name,' ',NEW.last_name,' ',NEW.gender,' ',NEW.hire_date,' ',NEW.second_lastname,' ',NEW.birth_state,' ',NEW.emp_rfc,' ',NEW.emp_curp));

END