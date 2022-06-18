<?php 
    session_start();
    require_once "../modelo/idioma.modelo.php";
 
if ($_POST) {
    if(!empty($_POST["ididioma"])){
        $id = $_POST["ididioma"];
        $model = new ModeloIdioma();
        $request = $model->MdlEliminaDatos($id);
        if($request = "ok"){
            echo '<script>
                         window.location = "idioma";
                 </script>';
        }
    } else {

        date_default_timezone_set("America/New_York");
        $idioma = $_POST['CboIdioma'];
        $nivel = $_POST['CboNivel'];
        $valor = $_SESSION['idusuario'];
        $model = new ModeloIdioma();
        $request = $model->existeIdioma($idioma, $valor);
        if ($request) {
            $arrayresposne = array('status' => false, 'msg' => 'ya existe');
        } else {

            $model = new ModeloIdioma();
            $request = $model->mdlIngresarIdioma($valor, $idioma, $nivel);
            if ($request) {
                $arrayresposne = array('status' => true, 'msg' => 'Actualizado correctamente');
            }
        }

        echo json_encode($arrayresposne, JSON_UNESCAPED_UNICODE);
    }
} else {
    $item = "idusuario";
    $valor = $_SESSION['idusuario'];
    $model = new ModeloIdioma();
    $request = $model->MdlMostrarTablaIdioma($item,$valor);
    $n=0;
    for($i=0; $i < count($request); $i++){
        $request[$i]['numero'] = '<div>'.$n++;'</div>';
        $request[$i]['eliminar'] = '<div><button name="eliminar" class="btn btn-danger btn-sm mt-1 ml-1" title="Eliminar" onclick="eliminaridioma('.$request[$i]['ididioma'].')"><i class="fas fa-trash-alt"></i></button></div>';
    }
    echo json_encode($request, JSON_UNESCAPED_UNICODE);
}
