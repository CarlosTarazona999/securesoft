<?php 
    session_start();
    require_once "../modelo/educacion.modelo.php";
    
   

    if($_POST){

        if(!empty($_POST["cod"])){
            $id = $_POST["cod"];
            $model = new ModeloEducacion();
            $request = $model->eliminarEducacion($id);
            if($request = "ok"){
                // "http://ibtrabajaprueba.corpibgroup.com/IBtrabajaPrueba/experiencia";
                echo '<script>
                             window.location = "educacion";
                     </script>';
            }
            
        }else{
            
            date_default_timezone_set("America/New_York");

            $centro_educacion = $_POST['centro_educacion'];
            $area_estudio = $_POST['area_estudio'];
            $nivel = $_POST['nivel'];
            $estado = $_POST['estado'];
            if(!empty($_POST['actual'])){
                $fechainicio = date('Y-m-d H:i:s');
                $fechafin = null;
            }else{
                $fechainicio = date('Y-m-d H:i:s', strtotime($_POST['fechainicio']));
                $fechafin = date('Y-m-d H:i:s', strtotime($_POST['fechafin']));
            }
            
            $valor = $_SESSION['idusuario'];
            $model = new ModeloEducacion();
            $request = $model->existeEdu($centro_educacion,$valor);
            if($request){
                $arrayresposne = array('status' => false, 'msg'=> 'ya existe');
            }else{

                $model = new ModeloEducacion();
                $request = $model->anadirEducacion($valor, $centro_educacion, $area_estudio, $nivel, $estado, $fechainicio, $fechafin);
                if($request){
                    $arrayresposne = array('status' => true, 'msg'=> 'Actualizado correctamente');
                }
            }

            echo json_encode($arrayresposne, JSON_UNESCAPED_UNICODE);
        }
        
    }else{

        $valor = $_SESSION['idusuario'];
        $model = new ModeloEducacion();
        $request = $model->selectEducacion($valor);
        $n=count($request)-1;
        for($i=0; $i < count($request); $i++){
            $request[$i]['numero'] = '<div>'.$n--;'</div>';
            $request[$i]['option'] = '<div class="text-center"><button class="btn btn-danger btn-sm mt-1 ml-1" title="Eliminar" onclick="eliminarEducacion('.$request[$i]['ideducacion'].')"><i class="fas fa-trash-alt"></i></button></div>';
        }
        echo json_encode($request, JSON_UNESCAPED_UNICODE);

    }