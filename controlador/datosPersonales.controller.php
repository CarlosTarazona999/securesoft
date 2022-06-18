<?php 

    class DatosPersonales{

        public function selectDp(){
            $item = "idusuario";
            $valor = $_SESSION['idusuario'];
            $model = new DatosPersonalesModel();
            $request = $model->selectDPostulante($valor,$item);
            if($request == 0){
                echo '<div class="alert alert-danger">Error</div>';
            }else{
                return $request;
            }    
        }
        //Mostrar datos de la empresa
        static public function ctrMostrarEmpresa($item,$valor){
        $tabla = "usuario";

        $respuesta = DatosPersonalesModel::selectDEmpresa($tabla, $item, $valor);
        
        return $respuesta;
        }

        static public function ctrSelectEstadoCivil(){

            $model = new DatosPersonalesModel();
            $request = $model->selectEsCivil();
            return $request;
        }
    }
