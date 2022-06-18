<?php 
      
    class Educacion{

        static public function ObtenerArea(){
            $model = new ModeloEducacion();
            $request = $model->selectArea();
            return $request;
        }
        
    }

 
    

    
        
    

?>