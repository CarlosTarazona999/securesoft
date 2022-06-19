<?php
require_once "controlador/plantilla.controlador.php";

//require_once "controlador/postulantes.controlador.php";
//require_once "modelo/Postulantes.modelo.php";

require_once "controlador/producto.controller.php";

require_once "modelo/producto.model.php";


$plantilla = new controladorPlantilla();
$plantilla->ctrPlantilla();
