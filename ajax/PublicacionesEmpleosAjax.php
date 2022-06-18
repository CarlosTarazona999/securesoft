<?php
require_once "../controlador/publicaciones.controlador.php";
require_once "../modelo/publicaciones.modelo.php";
session_start();

class PublicacionesEmpleosAjax
{
    public $pagina;

    public function PublicacionesListaAjax()
    {

        $limite = 6;
        $html = '';
        if ($this->pagina == "undefined") {
            $pagina = 1;
        } else {
            $pagina = $this->pagina;
        }
    $html .= '<div class="row" >';
        $respuesta = ControladorPublicar::ctrMostrarPublicacionesPostulante($pagina, $limite);
    
        if (count($respuesta) > 0) {
            foreach ($respuesta as $key => $value) {
                
                $html .= '<div class="col-lg-6 col-md-4">
                       <div class="caja-trabajo">
                           <div class="caja-top">
                               <div class="caja-imagen">';

                $foto = ControladorPublicar::ctrobtenerFoto($value["id_usuario"]);

                if (empty($foto['foto_perfil'])) {

                    $html .= '<img src="vista/images/pruebaEmpleo.jpg" class="img-responsive">';
                } else {
                    $html .= '<img src="' . $foto['foto_perfil'] . '" class="img-responsive">';
                }

                $html .= '</div>
                               <div class="caja-dato">
                                   <span title="Publicado">
                                       <i class="fas fa-calendar-alt"></i>';
                if ($value['fecha'] != null) :
                    $html .= $value["fecha"] .
                        '/';
                else :
                    $html .= '';
                endif;
                if ($value['hora'] != null) :
                    $html .= $value["hora"];
                else :
                    $html .= '';
                endif;
                $html .= '</span>
                            <span title="Ubicacion">
                            <i class="fas fa-map-marker-alt"></i>';
                if ($value['departamento'] != null) :
                    $value["departamento"];
                endif;
                if ($value['provincia'] != null) :
                    $value["provincia"];
                endif;

                if ($value['distrito'] != null) :
                    $value["distrito"];
                endif;
                $html .= '</span>
                </div>
                    </div>
                        <div class="caja-detalles">
                        <h3><a href="detalleEmpleo">' . $value["puesto"] . '</a>
                            </br>
                            <span>';

                if (empty($foto["nom_empresa"])) {
                    $html .= 'Confidencial';
                } else {
                    $html .= $foto["nom_empresa"].'</span>';}
                               $html .= '</h3>
                               <p class="precio"><strong>$(' . $value['salario'] . ') </strong>
                               </p>
                               <p>Especialidad:' . $value['tipo_area_estudio'] . '</strong>
                               </p>
                           </div>

                           <div class="caja-info">
                               <button onclick="detalleEmpleo(' . $value['id_publicaciones'] . ')" class="seccion-btn btn btn-primary btn-block">Ver Detalles</button>
                           </div>
                        </div>
                   </div>';
                
            }
        }
        $html .= '</div>';
        $response = ControladorPublicar::ctrMostrarPublicacionesPostulantePaginacion();

        $total_paginas = ceil($response / $limite);


        $html .= '<div class="row">
        <div class="col-lg-12 text-center m-4">
             <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center ul__empleos">';

        if ($pagina > 1) {
            $html .= '<li class="page-item-empleos">
            <a class="page-link-empleos " page="' . ($pagina - 1) . '" href="#">
                <i class="fas fa-caret-left">
                </i>
            </a>
        </li>';
        }

        for ($i = 1; $i <= $total_paginas; $i++) {
            $clase_activa = "";
            if ($i == $pagina) {
                $clase_activa = "active";
            }

            $html .= '<li class="page-item-empleos' . $clase_activa . '">
        <a class="page-link-empleos" page="' . $i . '" href="#">' . $i . '</a>
        </li>';
        }

        if ($pagina < $total_paginas) {
            $pagina++;
            $html .= '<li class="page-item-empleos"><a class="page-link-empleos " page="' . $pagina . '" href="#"><i class="fas fa-caret-right"></i></a></li>';
        }

        $html .= '</ul>
                </nav>
            </div>
          </div>
       </div>';

        echo $html;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $publicaciones = new PublicacionesEmpleosAjax();
    if (isset($_POST["pagina"])) {
        $publicaciones->pagina = $_POST["pagina"];
    }
    $publicaciones->PublicacionesListaAjax();
}
