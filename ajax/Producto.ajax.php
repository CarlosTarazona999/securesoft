<?php
session_start();
require_once "../modelo/producto.model.php";

if ($_POST) {

    if (!empty($_POST["cod"])) {
        $id = $_POST["cod"];
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
        $respuesta = null;

        
        
        $rutaProducto = '../Productos/';

        //archivo
        $archivo = $rutaProducto . basename($_FILES["Imagen"]["name"]);

        if ($_FILES["Imagen"]["name"] == "") {
            $imagenProducto = isset($_POST["Imagen"]) ? $_POST["Imagen"] : " ";
        } else {
            $file = $_FILES['Imagen'];
            $filename = $file['name'];
            $filetype = $file['type'];
            //tipo archivo
            $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

            //Tamano de archivo
            $tamanoImagen= getimagesize($_FILES["Imagen"]["tmp_name"]);

            if ($tamanoImagen!= false) {

                $size = $_FILES["Imagen"]["size"];
                if ($size > 500000) {
                    $respuesta = 'El documento tiene que ser menor a 500kb';
                } else {
                    if ($filetype == "image/jpg" || $filetype == 'image/jpeg' || $filetype == 'image/png' || $mimetypePerfil == 'image/gif') {

                        if (!is_dir('../Productos')) {
                            mkdir('../Productos', 0777, true);
                        }
                        move_uploaded_file($file['tmp_name'], '../Productos/' . $filename);
                        $imagenProducto = 'Productos/' . $filename;
                    } else {
                        $respuesta = 'Solo se admiten archivos jpg y jpeg';
                    }
                }
            } else {
                $respuesta = 'La Imagen no es una imagen';
            }
        }
        if ($respuesta !== null) {
            $arrayresposne = array('status' => false, 'msg' => $respuesta);
        } 

        $Imagen=$imagenProducto;

        $model = new ProductoModelo();
        $request = $model->anadirProducto($Producto, $Categoria, $Precio, $Stock, $Imagen);
        if ($request) $arrayresposne = array('status' => true, 'msg' => 'Producto agregado correctamente');


        echo json_encode($arrayresposne, JSON_UNESCAPED_UNICODE);
    }
} else {

    $model = new ProductoModelo();
    $request = $model->selectProductos();
    $n = count($request) - 1;
    for ($i = 0; $i < count($request); $i++) {
        $request[$i]['numero'] = '<div name="Id">' . $n--;
        '</div>';
        $request[$i]['Imagen'] = '<div> <img src="' . $request[$i]["Imagen"] . '" alt="" class="rounded-circle imgdp"></div>';
        $request[$i]['option'] = '<div class="text-center"><button class="btn btn-danger btn-sm mt-1 ml-1" title="Eliminar" onclick="eliminarProducto(' . $request[$i]['Id'] . ')"><i class="fas fa-trash-alt"></i></button></div>';
    }
    echo json_encode($request, JSON_UNESCAPED_UNICODE);
}
