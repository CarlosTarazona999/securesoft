var formPostulante=document.querySelector("#formDatosPersonales");formPostulante.onsubmit=function(e){e.preventDefault();var t=window.XMLHttpRequest?new XMLHttpRequest:new ActiveXObject("Microsoft.XMLHTTP"),a="ajax/Datos_Personales.ajax.php",o=new FormData(formPostulante);t.open("POST",a,!0),t.send(o),t.onreadystatechange=function(){if(4==t.readyState&&200==t.status){var e=JSON.parse(t.responseText);e.status?(Swal.fire(e.msg,"Click en OK!","success"),location.reload()):Swal.fire({icon:"error",title:"Error al actualizar",text:e.msg})}}};