<?php 
   session_start();
    require_once "../modelo/publicaciones.modelo.php";
    
    $valor = $_SESSION['idusuario'];
    $model = new Modelopublicar();
    $request = $model->MdlMostrarPublicacionesEmpresa($valor);
    for($i=0; $i < count($request); $i++){
        $request[$i]['optione'] = '<div class="text-center"><button class="btn btn-danger btn-sm mt-1 ml-1" title="Eliminar" onclick="eliminarPublicacion('.$request[$i]['id_publicaciones'].')"><i class="fas fa-trash-alt"></i></button></div>';
        $request[$i]['editar'] = '<div class="text-center"><button class="btn btn-primary btn-sm mt-1" title="Editar" onclick="editarPublicacion('.$request[$i]['id_publicaciones'].')" data-toggle="modal" data-target="#editmodal"><i class="fas fa-edit"></i></button></div>';
        $request[$i]['detalle'] = '<div class="text-center"><button class="btn btn-danger btn-sm mt-1 ml-1"  onclick="detallePublicacion('.$request[$i]['id_publicaciones'].')">Ver detalle</button></div>';
        $request[$i]['postulante'] = '<div class="text-center"><button class="btn btn-danger btn-sm mt-1 ml-1"  onclick="postulados('.$request[$i]['id_publicaciones'].')">Ver postulantes</button></div>';
    
    }
    echo json_encode($request, JSON_UNESCAPED_UNICODE);
    

    if(!empty($_POST["codi"])){
        $id = $_POST["codi"];
        $model = new Modelopublicar();
        $request = $model->MdleliminarPublicaciones($id);
        if($request = "ok"){
            echo '<script>
                         window.location = "verempleo";
                 </script>';
        }
    }