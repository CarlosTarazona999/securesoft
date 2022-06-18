<?php
require_once "../controlador/usuarios.controlador.php";
class ConsultaRuc
{
    public $ruc;

    public function ConsultarRucAjax()
    {
        $rucaconsultar = $this->ruc;
        $response = ControladorLogin::ctrConsultarRuc($rucaconsultar);
        if ($response == 'error') {
            //Mostramos los errores si los hay
            echo 'error';
        } else {
            //Mostramos la respuesta
            echo 'existe';
        }
    }
}

if (isset($_POST['ruc'])) {
    $rucConsultar = new ConsultaRuc();
    $rucConsultar->ruc = $_POST['ruc'];
    $rucConsultar->ConsultarRucAjax();
}