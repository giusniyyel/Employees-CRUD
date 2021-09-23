/*!
 * Employees CRUD v1.0 (https://github.com/giusniyyel/employees-crud)
 * Copyright 2021 José Daniel Bautista Campos
 * Licensed under MIT (https://github.com/giusniyyel/employees-crud/blob/master/LICENSE)
*/

function agregardatos(
  birthdate,
  first_name,
  last_name,
  second_lastname,
  gender,
  hiredate,
  state,
  emp_rfc,
  emp_curp
) {
  cadena =
    "birthdate=" +
    birthdate +
    "&first_name=" +
    first_name +
    "&last_name=" +
    last_name +
    "&second_lastname=" +
    second_lastname +
    "&gender=" +
    gender +
    "&hiredate=" +
    hiredate +
    "&state=" +
    state;

  $.ajax({
    type: "POST",
    url: "php/agregarDatos.php",
    data: cadena,
    success: function (r) {
      if (r == 1) {
        $("#table").load("components/table.php");
        alertify.success("Empleado agregado con exito!");
      } else {
        alertify.error("Fallo el servidor!");
      }
    },
  });
}

function agregaform(datos) {
  d = datos.split("||");

  $("#idpersona").val(d[0]);
  $("#birthdateu").val(d[1]);
  $("#first_nameu").val(d[2]);
  $("#last_nameu").val(d[3]);
  $("#second_lastnameu").val(d[4]);
  $("#genderu").val(d[5]);
  $("#hiredateu").val(d[6]);
  $("#stateu").val(d[7]);
  $("#emp_rfcu").val(d[8]);
  $("#emp_curpu").val(d[9]);
}

function actualizaDatos() {
  id = $("#idpersona").val();
  birthdate = $("#birthdateu").val();
  first_name = $("#first_nameu").val();
  last_name = $("#last_nameu").val();
  second_lastname = $("#second_lastnameu").val();
  gender = $("#genderu").val();
  hiredate = $("#hiredateu").val();
  state = $("#stateu").val();
  emp_rfc = $("#emp_rfcu").val();
  emp_curp = $("#emp_curpu").val();

  cadena =
    "id=" +
    id +
    "&birthdate=" +
    birthdate +
    "&first_name=" +
    first_name +
    "&last_name=" +
    last_name +
    "&second_lastname=" +
    second_lastname +
    "&gender=" +
    gender +
    "&hiredate=" +
    hiredate +
    "&state=" +
    state +
    "&emp_rfc=" +
    emp_rfc +
    "&emp_curp=" +
    emp_curp;

  $.ajax({
    type: "POST",
    url: "php/actualizaDatos.php",
    data: cadena,
    success: function (r) {
      if (r == 1) {
        $("#table").load("components/table.php");
        alertify.success("Empleado actualizado con exito!");
      } else {
        alertify.error("Fallo el servidor!");
      }
    },
  });
}

function preguntarSiNo(id) {
  alertify.confirm(
    "Eliminar Datos",
    "¿Esta seguro de eliminar este registro?",
    function () {
      eliminarDatos(id);
    },
    function () {
      alertify.error("Se cancelo");
    }
  );
}

function eliminarDatos(id) {
  cadena = "id=" + id;

  $.ajax({
    type: "POST",
    url: "php/eliminarDatos.php",
    data: cadena,
    success: function (r) {
      if (r == 1) {
        $("#table").load("components/table.php");
        alertify.success("Empleado eliminado con exito!");
      } else {
        alertify.error("Fallo el servidor :(");
      }
    },
  });
}

function preguntarSiNoBitacora(id) {
  alertify.confirm(
    "Eliminar Datos",
    "¿Esta seguro de eliminar este registro?",
    function () {
      eliminarBitacora(id);
    },
    function () {
      alertify.error("Se cancelo");
    }
  );
}

function eliminarBitacora(id) {
  cadena = "id=" + id;

  $.ajax({
    type: "POST",
    url: "php/eliminarBitacora.php",
    data: cadena,
    success: function (r) {
      if (r == 1) {
        $("#table").load("components/table_bitacora.php");
        alertify.success("Registro eliminado con exito!");
      } else {
        alertify.error("Fallo el servidor :(");
      }
    },
  });
}
