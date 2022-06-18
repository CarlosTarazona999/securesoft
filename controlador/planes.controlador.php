<?php
class ControladorPlanes
{
    static public function EditarPlan($data)
    {
        if (isset($_SESSION['idusuario'])) {

            //Validar datos Premium
            if ($data == 'p30') {
                $planPremium30 = $data;
            } else {
                $planPremium30 = null;
            }
            if ($data == 'p90') {
                $planPremium90 = $data;
            } else {
                $planPremium90 = null;
            }

            //Validar datos Strandard
            if ($data == 's30') {
                $planStandard30 = $data;
            } else {
                $planStandard30 = null;
            }
            if ($data == 's90') {
                $planStandard90 = $data;
            } else {
                $planStandard90 = null;
            }

            //Validar datos Basico
            if ($data == 'b') {
                $planBasico = $data;
            } else {
                $planBasico = null;
            }
            date_default_timezone_set("America/Lima");
            $fechaActual = date('Y-m-d H:i:s');

        
            //Update Plan Premium 90
            if ($planPremium90 != null) {

                $respuesta = ModeloPlan::UpdatePlanes($planPremium90, $_SESSION['idusuario'], $fechaActual);

                if ($respuesta == "ok") {
                    return 'premiun90';
                    $_SESSION['plan'] = $planPremium90;
                    $_SESSION['fecha_compra'] = $fechaActual;
                } else {

                    return 'error90';
                }
            } 


            //Update Plan Premium 30
            if ($planPremium30 != null) {

                $respuesta = ModeloPlan::UpdatePlanes($planPremium30, $_SESSION['idusuario'], $fechaActual);

                if ($respuesta == "ok") {
                    return 'premiun30';
                    $_SESSION['plan'] = $planPremium30;
                    $_SESSION['fecha_compra'] = $fechaActual;
                } else {

                    return 'error30';
                }
            }

            //Update Plan Standard 30 dias
            if ($planStandard30 != null) {

                $respuesta = ModeloPlan::UpdatePlanes($planStandard30, $_SESSION['idusuario'], $fechaActual);

                if ($respuesta == "ok") {
                    return 'standar30';
                    $_SESSION['plan'] = $planStandard30;
                    $_SESSION['fecha_compra'] = $fechaActual;
                } else {

                    return 'error30';
                }
            }

            //Update Plan Standard 90 dias
            if ($planStandard90 != null) {

                $respuesta = ModeloPlan::UpdatePlanes($planStandard90, $_SESSION['idusuario'], $fechaActual);



                if ($respuesta == "ok") {
                    return 'standar90';
                    $_SESSION['plan'] = $planStandard90;
                    $_SESSION['fecha_compra'] = $fechaActual;
                } else {

                    return 'error90';
                }
            }

            //Update Plan Basico
            if ($planBasico != null) {

                $respuesta = ModeloPlan::UpdatePlanes($planBasico, $_SESSION['idusuario'], $fechaActual);

                if ($respuesta == "ok") {
                    return 'basico';
                    $_SESSION['plan'] = $planBasico;
                    $_SESSION['fecha_compra'] = $fechaActual;
                } else {

                    return 'error';
                }
            }
        }
    }
}
