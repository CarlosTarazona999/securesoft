<?php 
    session_start();
    require_once "../modelo/trabajo.modelo.php";
    
   

    if($_POST){

        if(!empty($_POST["cod"])){
            $id = $_POST["cod"];
            $model = new ModeloTrabajo();
            $request = $model->eliminarTrabajo($id);
            if($request = "ok"){
                // "http://ibtrabajaprueba.corpibgroup.com/IBtrabajaPrueba/experiencia";
                echo '<script>
                             window.location = "trabajoideal";
                     </script>';
            }
            
        }else{
            
            date_default_timezone_set("America/New_York");

            $nom_empleo = $_POST['empleo'];
            $rubro = $_POST['rubro'];
            $ubicacion = $_POST['ubicacion'];
            $salario = $_POST['salario'];
            
            
            
            $valor = $_SESSION['idusuario'];
            $model = new ModeloTrabajo();
            $request = $model->existeTrabajo($nom_empleo,$valor);
            if($request){
                $arrayresposne = array('status' => false, 'msg'=> 'ya existe');
            }else{
                
                $model = new ModeloTrabajo();
                $request = $model->anadirTrabajo($valor, $nom_empleo, $rubro, $ubicacion, $salario);
                if($request){
                    $arrayresposne = array('status' => true, 'msg'=> 'Actualizado correctamente');
                }
            }

            echo json_encode($arrayresposne, JSON_UNESCAPED_UNICODE);
        }
        
    }else{

        $valor = $_SESSION['idusuario'];
        $model = new ModeloTrabajo();
        $request = $model->selectTrabajo($valor);
        for($i=0; $i < count($request); $i++){
            $request[$i]['option'] = '<div class="text-center"><button class="btn btn-danger btn-sm mt-1 ml-1" title="Eliminar" onclick="eliminarTrabajo('.$request[$i]['idtrabajo_ideal'].')"><i class="fas fa-trash-alt"></i></button></div>';
        }
        echo json_encode($request, JSON_UNESCAPED_UNICODE);

    }