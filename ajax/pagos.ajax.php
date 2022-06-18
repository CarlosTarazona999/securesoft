<?php
session_start();
require_once "../controlador/pago.controlador.php";
require_once "../modelo/pago.modelo.php";

class AjaxPago{

    public $pago;

    public function ajaxRegistroPago()
    {
        $data = $this->pago;

        $id_usu = $_SESSION["idusuario"];

        $response = PagoController::ctrRegistrarPago($data,$id_usu);

        if ($response == 'ok') {
            echo $response;
        }else{
            echo 'mala';
        }
    }

}

if (isset($_POST["paga"])) {
    $pagos = new AjaxPago();
    $pagos->pago =  json_decode($_POST["paga"],true);
    $pagos->ajaxRegistroPago();
}