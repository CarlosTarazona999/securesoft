<?php

require_once "../controlador/verPostulante.controlador.php";
require_once "../modelo/verPostulante.modelo.php";

class VerPostulanteAjax{

    public $idPostulante;
    public $estado;

    public function ajaxListarPostulante()
    {
        $id = $this->idPostulante;

        $response = VerPostulanteControlador::ctrListarPostulante($id);

        echo json_encode($response);
    }

    public function ajaxListarHabilidad()
    {
        $id = $this->idPostulante;

        $response = VerPostulanteControlador::ctrListarHabilidades($id);

        echo json_encode($response);
    }

    public function ajaxListarIdioma()
    {
        $id = $this->idPostulante;

        $response = VerPostulanteControlador::ctrListarIdiomas($id);

        echo json_encode($response);
    }

    public function ajaxListarExperiencia()
    {
        $id = $this->idPostulante;

        $response = VerPostulanteControlador::ctrListarLaboral($id);

        echo json_encode($response);
    }

    public function ajaxListarEducacion()
    {
        $id = $this->idPostulante;

        $response = VerPostulanteControlador::ctrListarEducacion($id);

        echo json_encode($response);
    }

    public function ajaxVerificarPostulacion()
    {
        $id = $this->idPostulante;
        $id2 = $this->estado;

        $response = VerPostulanteControlador::ctrVerificarEstadoPostulacion($id,$id2);

        echo json_encode($response);
    }

    public function ajaxActualizarEstado()
    {
        $id = $this->idPostulante;
        $estado = $this->estado;

        $response = VerPostulanteControlador::ctrActualizarEstado($id,$estado);

        echo $response;
    }

}

if (isset($_POST["idPostulante1"])) {
    $postulante = new VerPostulanteAjax();
    $postulante->idPostulante = $_POST["idPostulante1"];
    $postulante->ajaxListarPostulante();
}

if (isset($_POST["idPostulante2"])) {
    $postulante = new VerPostulanteAjax();
    $postulante->idPostulante = $_POST["idPostulante2"];
    $postulante->ajaxListarHabilidad();
}

if (isset($_POST["idPostulante3"])) {
    $postulante = new VerPostulanteAjax();
    $postulante->idPostulante = $_POST["idPostulante3"];
    $postulante->ajaxListarIdioma();
}

if (isset($_POST["idPostulante4"])) {
    $postulante = new VerPostulanteAjax();
    $postulante->idPostulante = $_POST["idPostulante4"];
    $postulante->ajaxListarExperiencia();
}

if (isset($_POST["idPostulante5"])) {
    $postulante = new VerPostulanteAjax();
    $postulante->idPostulante = $_POST["idPostulante5"];
    $postulante->ajaxListarEducacion();
}

if (isset($_POST["idPostulante6"]) && isset($_POST["id"])) {
    $postulante = new VerPostulanteAjax();
    $postulante->idPostulante = $_POST["idPostulante6"];
    $postulante->estado = $_POST["id"];
    $postulante->ajaxVerificarPostulacion();
}

if (isset($_POST["estado"]) && isset($_POST["id"])) {
    $postulante = new VerPostulanteAjax();
    $postulante->idPostulante = $_POST["id"];
    $postulante->estado = $_POST["estado"];
    $postulante->ajaxActualizarEstado();
}