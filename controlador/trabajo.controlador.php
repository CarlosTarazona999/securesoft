<?php 
      
 class TrabajoIdeal{

        static public function ObtenerRubro(){
            $model = new ModeloTrabajo();
            $request = $model->selectRubro();
            return $request;
        }
        
    }

 

?>