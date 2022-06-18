<?php 
    session_start();
    require_once "../modelo/postulaciones.Model.php";

    if(isset($_GET['code'])){

        $id_publicaciones = $_GET['code'];
        $id_usuario = $_SESSION['idusuario'];

        $model = new PostulacionesModel();
        $request = $model->ComprobarPostulacion($id_publicaciones, $id_usuario);
        
        if($request){
            echo '<script>
                    alert("Ya postulaste");
                    window.location = "../postulaciones";
                </script>';
        }else{
            $request = $model->InsertPostulaciones($id_publicaciones, $id_usuario);

            if($request){
                header('location: ../postulaciones');
            }else{
                echo "error";
            }
        }
       
        
    }elseif(isset($_GET['id'])){
        $item = "idpublicaciones";
        $valor = $_GET['id'];
        $model = new PostulacionesModel();
        $request = $model->SelectPostulacionesEmpresa($item, $valor);

        for ($i=0; $i < count($request); $i++) { 
            $request[$i]['option'] = '<div class="text-center"><button class="btn btn-success btn-sm mt-1 ml-1" id="'.$request[$i]["idusuario"].'">Ver Perfil</button></div>';
        }
        echo json_encode($request, JSON_UNESCAPED_UNICODE);
    }


    
 
    


