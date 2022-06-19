<?php
session_start();
require_once "../modelo/producto.model.php";

if ($_POST) {

    if (!empty($_POST["Id"])) {
        $id = $_POST["Id"];
        $model = new ProductoModelo();
        $request = $model->eliminarProducto($id);
        if ($request = "ok") {
            echo '<script>
                             window.location = "producto";
                     </script>';
        }
    } else {

        date_default_timezone_set("America/New_York");

        $Producto = $_POST['Producto'];
        $Categoria = $_POST['Categoria'];
        $Precio = $_POST['Precio'];
        $Stock = $_POST['Stock'];
        $Imagen = $_POST['Imagen'];

            $model = new ProductoModelo();
            $request = $model->anadirProducto($Id, $Producto, $Categoria, $Precio, $Stock, $Imagen);
            if ($request) $arrayresposne = array('status' => true, 'msg' => 'Actualizado correctamente');


        echo json_encode($arrayresposne, JSON_UNESCAPED_UNICODE);
    }
} else {

    $model = new ProductoModelo();
    $request = $model->selectProductos();
    $n = count($request) - 1;
    for ($i = 0; $i < count($request); $i++) {
        $request[$i]['numero'] = '<div>' . $n--;'</div>';
        $request[$i]['Imagen'] = '<div> <img src="' . $request[$i]["Imagen"] . '" alt="" class="rounded-circle imgdp"></div>';
        $request[$i]['option'] = '<div class="text-center"><button class="btn btn-danger btn-sm mt-1 ml-1" title="Eliminar" onclick="eliminarProducto(' . $request[$i]['Id'] . ')"><i class="fas fa-trash-alt"></i></button></div>';
    }
    echo json_encode($request, JSON_UNESCAPED_UNICODE);
}
