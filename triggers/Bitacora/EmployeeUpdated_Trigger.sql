CREATE TRIGGER `EmployeeUpdated` AFTER UPDATE ON `employees`
 FOR EACH ROW BEGIN

INSERT INTO bitacora (emp_no,activity,old_data,new_data) 
	VALUES (OLD.emp_no,"Se actualizó un empleado",CONCAT('Información Anterior: ', OLD.birth_date,' ',OLD.first_name,' ',OLD.last_name,' ',OLD.gender,' ',OLD.hire_date,' ',OLD.second_lastname,' ',OLD.birth_state,' ',OLD.emp_rfc,' ',OLD.emp_curp),CONCAT('Información Actual: ', NEW.birth_date,' ',NEW.first_name,' ',NEW.last_name,' ',NEW.gender,' ',NEW.hire_date,' ',NEW.second_lastname,' ',NEW.birth_state,' ',NEW.emp_rfc,' ',NEW.emp_curp));

END