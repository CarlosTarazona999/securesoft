<?php
session_start();
require_once "../modelo/experiencia.model.php";



if ($_POST) {

    if (!empty($_POST["cod"])) {
        $id = $_POST["cod"];
        $model = new ProductoModelo();
        $request = $model->eliminarExperiencia($id);
        if ($request = "ok") {
            // "http://ibtrabajaprueba.corpibgroup.com/IBtrabajaPrueba/experiencia";
            echo '<script>
                             window.location = "experiencia";
                     </script>';
        }
    } else {

        date_default_timezone_set("America/New_York");

        $producto = $_POST['empresa'];
        $cargo = $_POST['cargo'];
        if (!empty($_POST['actual'])) {
            $fechaI = date('Y-m-d H:i:s');
            $fechaF = null;
        } else {
            $fechaI = date('Y-m-d H:i:s', strtotime($_POST['fechaI']));
            $fechaF = date('Y-m-d H:i:s', strtotime($_POST['fechaF']));
        }

        $valor = $_SESSION['idusuario'];
        $model = new ProductoModelo();
        $request = $model->existeProducto($producto, $valor);
        if ($request) {
            $arrayresposne = array('status' => false, 'msg' => 'ya existe');
        } else {

            $model = new ProductoModelo();
            $request = $model->anadirExperiencia($id, $producto, $cargo, $fechaI, $fechaF);
            if ($request) {
                $arrayresposne = array('status' => true, 'msg' => 'Actualizado correctamente');
            }
        }

        echo json_encode($arrayresposne, JSON_UNESCAPED_UNICODE);
    }
} else {

    $valor = $_SESSION['idusuario'];
    $model = new ProductoModelo();
    $request = $model->selectExperiencia($valor);
    $n = count($request) - 1;
    for ($i = 0; $i < count($request); $i++) {
        $request[$i]['numero'] = '<div>' . $n--;
        '</div>';
        $request[$i]['option'] = '<div class="text-center"><button class="btn btn-danger btn-sm mt-1 ml-1" title="Eliminar" onclick="eliminarExperiencia(' . $request[$i]['idproductos'] . ')"><i class="fas fa-trash-alt"></i></button></div>';
    }
    echo json_encode($request, JSON_UNESCAPED_UNICODE);
}
