function eliminarExperiencia(e) {
  var a = {
    cod: e,
  };
  $.ajax({
    data: a,
    url: "ajax/Experiencia.ajax.php",
    type: "POST",
    success: function () {
      Swal.fire("Eliminado", "Click en OK!", "success"), location.reload();
    },
  });
}

function validaCheckbox() {
  var a = e.checked;
  a && (dt1.removeAttribute("required"), dt2.removeAttribute("required"));
}
var dateTable;
$(document).ready(function () {
  $("#tablaexp").dataTable({
    aProcessing: !0,
    aServerSide: !0,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json",
    },
    ajax: {
      url: "https://iblabora.com/ajax/Experiencia.ajax.php",
      dataSrc: "",
    },
    columns: [
      {
        data: "numero",
      },
      {
        data: "empresa",
      },
      {
        data: "cargo",
      },
      {
        data: "fecha_ini",
      },
      {
        data: "fecah_fin",
      },
      {
        data: "option",
      },
    ],
    responsive: "true",
    bDestroy: !0,
    iDisplayLength: 10,
    order: [[0, "asc"]],
  });
}),
  $("#tablaexp").DataTable();
var e = document.getElementById("ac"),
  dt1 = document.getElementById("periodo"),
  dt2 = document.getElementById("mes");
e.addEventListener("change", validaCheckbox, !1);
var formExp = document.querySelector("#formExp");
formExp.onsubmit = function (e) {
  e.preventDefault();
  var a = window.XMLHttpRequest
      ? new XMLHttpRequest()
      : new ActiveXObject("Microsoft.XMLHTTP"),
    t = "ajax/Experiencia.ajax.php",
    r = new FormData(formExp);
  a.open("POST", t, !0),
    a.send(r),
    (a.onreadystatechange = function () {
      if (4 == a.readyState && 200 == a.status) {
        var e = JSON.parse(a.responseText);
        e.status
          ? (Swal.fire(e.msg, "Click en OK!", "success"), location.reload())
          : Swal.fire({
              icon: "error",
              title: "Error al actualizar",
              text: e.msg,
            });
      }
    });
};
