<?php
require_once "controlador/plantilla.controlador.php";

//require_once "controlador/postulantes.controlador.php";
//require_once "modelo/Postulantes.modelo.php";
require_once "controlador/usuarios.controlador.php";
require_once "controlador/publicaciones.controlador.php";
require_once "controlador/datosPersonales.controller.php";
require_once "controlador/postulaciones.controller.php";
require_once "controlador/idioma.controlador.php";
require_once "controlador/experiencia.controller.php";
require_once "controlador/conocimiento.controlador.php";
require_once "controlador/educacion.controlador.php";
require_once "controlador/dEmpresa.controlador.php";
require_once "controlador/trabajo.controlador.php";
require_once "controlador/empleos.controlador.php";
require_once "controlador/verPostulante.controlador.php";
require_once "controlador/planes.controlador.php";



require_once "modelo/empleos.modelo.php";
require_once "modelo/usuarios.modelo.php";
require_once "modelo/publicaciones.modelo.php";
require_once "modelo/datosPersonales.Model.php";
require_once "modelo/idioma.modelo.php";
require_once "modelo/experiencia.model.php";
require_once "modelo/conocimiento.modelo.php";
require_once "modelo/educacion.modelo.php";
require_once "modelo/dEmpresa.modelo.php";
require_once "modelo/trabajo.modelo.php";
require_once "modelo/postulacion.modelo.php";
require_once "modelo/verPostulante.modelo.php";
require_once "modelo/planes.modelo.php";

$plantilla = new controladorPlantilla();
$plantilla->ctrPlantilla();
