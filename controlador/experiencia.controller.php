<?php 
      
    class ExperienciaLaboral{

        static public function ObtenerCargos(){
            $model = new ExperienciaLaboralModel();
            $request = $model->selectCargo();
            return $request;
        }
        
    }

 
    

    
        
    

?>