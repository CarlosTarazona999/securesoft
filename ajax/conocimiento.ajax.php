<?php
session_start();
require_once "../modelo/conocimiento.modelo.php";



if ($_POST) {
    if (!empty($_POST["idconocimiento"])) {
        $id = $_POST["idconocimiento"];
        $model = new ModeloConocimiento();
        $request = $model->MdlEliminaDatos($id);
        if ($request = "ok") {
            // "http://ibtrabajaprueba.corpibgroup.com/conocimiento";
            echo '<script>
                         window.location = "conocimiento";
                 </script>';
        }
    } else {

        date_default_timezone_set("America/New_York");
        $conocimiento = $_POST['CboConocimiento'];
        
        $valor = $_SESSION['idusuario'];
        $model = new ModeloConocimiento();
        $request = $model->existeConocimiento($conocimiento, $valor);
        if ($request) {
            $arrayresposne = array('status' => false, 'msg' => 'ya existe');
        } else {

            $model = new ModeloConocimiento();
            $request = $model->mdlIngresarConocimiento($valor, $conocimiento);
            if ($request) {
                $arrayresposne = array('status' => true, 'msg' => 'Actualizado correctamente');
            }
        }

        echo json_encode($arrayresposne, JSON_UNESCAPED_UNICODE);
    }
} else {
    $valor = $_SESSION['idusuario'];
    $model = new ModeloConocimiento();
    $request = $model->MdlMostrarTablaConocimiento($valor);
    $n = 0;
    for ($i = 0; $i < count($request); $i++) {
        $request[$i]['numero'] = '<div>' . $n++;
        '</div>';
        $request[$i]['eliminar'] = '<div><button name="eliminar" class="btn btn-danger btn-sm mt-1 ml-1" title="Eliminar" onclick="eliminarconocimiento(' . $request[$i]['idconocimiento'] . ')"><i class="fas fa-trash-alt"></i></button></div>';
    }
    echo json_encode($request, JSON_UNESCAPED_UNICODE);
}
