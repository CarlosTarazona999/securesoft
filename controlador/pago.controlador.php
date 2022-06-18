<?php

class PagoController{

    static public function ctrRegistrarPago($datos,$id_usu)
    {
        $tabla = 'pagos';

        $response = PagoModelo::mdlRegistrarPago($tabla, $datos,$id_usu);

        return $response;
    }

}