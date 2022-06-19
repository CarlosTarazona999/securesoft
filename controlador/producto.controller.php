<?php 
      
    class ProductoControlador{

        public function requestProducto(){
            $item = $_POST["Id"];
            $model = new ProductoModelo();
            $request = $model->selectProducto($item);
            if($request == 0){
                echo '<div class="alert alert-danger">Error</div>';
            }else{
                return $request;
            }    
        }
    }


 
    

    
        
    

?>