<?php
session_start();
require_once "../controlador/planes.controlador.php";
require_once "../modelo/planes.modelo.php";
class PlanAjax{

    public $plan;

    public function ajaxPlanes()
    {
        $planData = $this->plan;

        $response = ControladorPlanes::EditarPlan($planData);

        echo $response;
    }

}

if (isset($_POST["plan"])) {
    $planes = new PlanAjax();
    if ($_POST["plan"] == 'p30') {
        $data = $_POST["plan"];
    }else if($_POST["plan"] == 'p90'){
        $data = $_POST["plan"];
    }else if($_POST["plan"] == 's30'){
        $data = $_POST["plan"];
    }else if($_POST["plan"] == 's90'){
        $data = $_POST["plan"];
    }else{
        $data = $_POST["plan"];
    }
    $planes->plan = $data;
    $planes->ajaxPlanes();
}