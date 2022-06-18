<?php
require_once "../controlador/postulaciones.controller.php";
require_once "../modelo/postulacion.modelo.php";
session_start();

class PostulacionesAjax{

    public $pagina;

    public function PostulacionListaAjax()
    {
        $limite = 4;
        $html = '';
        if ($this->pagina == "undefined") {
            $pagina = 1;
        }else{
            $pagina = $this->pagina;
        }

        $respuesta = PostulacionesController::ctrListarPostulaciones($_SESSION['idusuario'],$pagina, $limite);

        if (count($respuesta) > 0) {
            foreach ($respuesta as $key => $value) {
                $date = new DateTime($value["fecha"]);
                $fecha = $date->format("d/m/Y");
                $respuesta2 = PostulacionesController::ctrObtenerEmpresa($value["id_usuario"]); 
                if (empty($respuesta2)) {
                    $empresa = "Confidencial";
                }else{
                    $empresa = $respuesta2['nom_empresa'];
                }
                $html .= '<div class="card mb-2">
                <div class="body__postulacion ml-2">
                    <a class="card-title text-muted" href="#">'.$value["puesto"].'</a>
                    <p class="card-text">'.$empresa.'</p>';

                     if ($value['estado_postulacion'] == 'P') { 
                        $html .= '<div class="form-check form-check-inline radio__postulantes">
                            <input class="form-check-input" type="radio" name="exampleRadios'.$value["id_postulacion"].'" id="post'.$value["id_postulacion"].'-1" value="option1" checked disabled>
                            <label class="form-check-label" for="post'.$value["id_postulacion"].'-1">
                                Postulada
                            </label>
                        </div>';
                     }else{ 
                        $html .= '<div class="form-check form-check-inline radio__postulantes">
                            <input class="form-check-input" type="radio" name="exampleRadios'.$value["id_postulacion"].'" id="post'.$value["id_postulacion"].'-1" value="option1" disabled>
                            <label class="form-check-label" for="post'.$value["id_postulacion"].'-1">
                                Postulada
                            </label>
                        </div>';
                    }

                    if ($value['estado_postulacion'] == 'V') {
                        $html .= '<div class="form-check form-check-inline radio__postulantes">
                            <input class="form-check-input" type="radio" name="exampleRadios'.$value["id_postulacion"].'" id="post'.$value["id_postulacion"].'-2" value="option2" checked disabled>
                            <label class="form-check-label " for="post'.$value["id_postulacion"].'-2">
                                CV Visto
                            </label>
                        </div>';
                    }else{ 
                        $html .= '<div class="form-check form-check-inline radio__postulantes">
                            <input class="form-check-input" type="radio" name="exampleRadios'.$value["id_postulacion"].'" id="post'.$value["id_postulacion"].'-2" value="option2" disabled>
                            <label class="form-check-label " for="post'.$value["id_postulacion"].'-2">
                                CV Visto
                            </label>
                        </div>';
                    }

                    if ($value['estado_postulacion'] == 'G') { 
                        $html .= '<div class="form-check form-check-inline radio__postulantes">
                        <input class="form-check-input" type="radio" name="exampleRadios<'.$value["id_postulacion"].'" id="post'.$value["id_postulacion"].'-3" value="option3" checked disabled>
                        <label class="form-check-label" for="post'.$value["id_postulacion"].'-3">
                            En Gestión
                        </label>
                    </div>';
                    }else{ 
                        $html .= '<div class="form-check form-check-inline radio__postulantes">
                            <input class="form-check-input" type="radio" name="exampleRadios'.$value["id_postulacion"].'" id="post'.$value["id_postulacion"].'-3" value="option3" disabled>
                            <label class="form-check-label" for="post'.$value["id_postulacion"].'-3">
                                En Gestión
                            </label>
                        </div>';
                    } 

                    if ($value['estado_postulacion'] == 'F') { 
                        $html .= '<div class="form-check form-check-inline radio__postulantes">
                        <input class="form-check-input" type="radio" name="exampleRadios'.$value["id_postulacion"].'" id="post'.$value["id_postulacion"].'-4" value="option4" checked disabled>
                        <label class="form-check-label" for="post'.$value["id_postulacion"].'-4">
                            Finalista
                        </label>
                    </div>';
                    }else{ 
                        $html .= '<div class="form-check form-check-inline radio__postulantes">
                            <input class="form-check-input" type="radio" name="exampleRadios'.$value["id_postulacion"].'" id="post'.$value["id_postulacion"].'-4" value="option4" disabled>
                            <label class="form-check-label" for="post'.$value["id_postulacion"].'-4">
                                Finalista
                            </label>
                        </div>';
                    }
                $html .= '</div>
                <hr>
                <div class="icon__footerPostulantes  w-100 shadow bg-white rounded">
                    <div class="group__bPos " id="group__bPos">
                        <i class="fas fa-home" id="i5">'.$value["departamento"].'-'.$value["provincia"].'-'.$value["distrito"].'</i>
                        <i class="fas fa-dollar-sign" id="i6">'.$value["salario"].'</i>
                        <i class="fas fa-vr-cardboard" id="i7">Postulación virtual</i>
                        <i class="far fa-calendar-alt" id="i8">Fecha de postulación '.$fecha .'</i></i>
                    </div>
                </div>
            </div>';
            }
        }

        $response = PostulacionesController::ctrListarPaginacion($_SESSION['idusuario']);

        $total_paginas = ceil($response/$limite);

        $html .= '<div class="text-center m-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">';

        if ($pagina > 1) {
        $html .= '<li class="page-item"><a class="page-link" page="'.($pagina-1).'" href="#" style="font-size:19px;"><i class="fas fa-caret-left"></i></a></li>';
        }

        for ($i=1; $i <= $total_paginas; $i++) { 
        $clase_activa = "";
        if ($i == $pagina) {
            $clase_activa = "active";
        }

        $html .= '<li class="page-item '.$clase_activa.'"><a class="page-link" page="'.$i.'" href="#">'.$i.'</a></li>';
        }

        if ($pagina < $total_paginas) {
        $pagina++;
        $html .= '<li class="page-item"><a class="page-link" page="'.$pagina.'" href="#" style="font-size:19px;"><i class="fas fa-caret-right"></i></a></li>';
        }

        $html .= '</ul>
        </nav>
        </div>';

        echo $html;
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postulacion = new PostulacionesAjax();
    if (isset($_POST["pagina"])) {
        $postulacion->pagina = $_POST["pagina"];
    }
    $postulacion->PostulacionListaAjax();
}