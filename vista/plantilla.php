<?php
session_start();

include 'modulos/header.php';
?>

<body class="app sidebar-mini">
	<?php
	if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

		//echo '<div class="wrapper">';

		/*=============================================
      CABECERA
      =============================================*/

		include "modulos/cabecera.php";
		/*=============================================
      MENU
      =============================================*/

		include "modulos/menu.php";

		/*=============================================
      CONTENIDO
      =============================================*/
		echo '<main class="app-content">';
		if (isset($_GET["ruta"])) {

			if (
				$_GET['ruta'] == "inicio" ||


				$_GET['ruta'] == "datosPostulante" ||
				$_GET['ruta'] == "educacion" ||
				$_GET['ruta'] == "conocimiento" ||
				$_GET['ruta'] == "experiencia" ||
				$_GET['ruta'] == "idioma" ||
				$_GET['ruta'] == "empleos" ||
				$_GET['ruta'] == "postulaciones" ||
				$_GET['ruta'] == "trabajoideal" ||
				$_GET['ruta'] == "detalleEmpleo" ||
				$_GET['ruta'] == "empleosFiltro" ||
				$_GET['ruta'] == "configuracion" ||
				$_GET['ruta'] == "datosempresa" ||
				$_GET['ruta'] == "publicaEmpleo" ||
				$_GET['ruta'] == "verempleo" ||
				$_GET['ruta'] == "planes" ||
				$_GET['ruta'] == "listaPostulante" ||
				$_GET['ruta'] == "detallePostulante" ||
				$_GET['ruta'] == "salir"
			) {
				include_once "modulos/" . $_GET['ruta'] . ".php";
			} else {

				include "modulos/404.php";
			}
		} else {

			include "modulos/inicio.php";
		}
		echo '</main>';
		//echo '</div>';

	} else {
		include "modulos/menuVISTA.php";
		if (isset($_GET["ruta"])) {

			if (
				$_GET['ruta'] == "principal" ||
				$_GET['ruta'] == "login" ||
				$_GET['ruta'] == "empresas" ||
				$_GET['ruta'] == "perfilEmpresa" ||
				$_GET['ruta'] == "empleos" ||
				$_GET['ruta'] == "empleosFiltro" ||
				$_GET['ruta'] == "nosotros" ||
				$_GET['ruta'] == "contacto" ||
				$_GET['ruta'] == "linkactivation" ||
				$_GET['ruta'] == "recuperarCuenta" ||
				$_GET['ruta'] == "registrarPostulante" ||
				$_GET['ruta'] == "recuperarcontrasena" ||
				$_GET['ruta'] == "registrarEmpresa"
			) {
				include_once "modulos/" . $_GET['ruta'] . ".php";
			} elseif (strpos($_GET['ruta'], "linkactivation") == true) {
				include_once "modulos/" . "linkactivation" . ".php";
			} else {

				include "modulos/404.php";
			}
		} else {

			include "modulos/principal.php";
		}
		include "modulos/footerVISTA.php";
	}
	?>
	<?php
	include 'modulos/footer.php';
	?>
	<?php

