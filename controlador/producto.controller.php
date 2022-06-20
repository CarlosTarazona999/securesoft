<?php 
      
    class ProductoControlador{

        public function requestProducto(){
            
            $model = new ProductoModelo();
            $request = $model->selectProductos();
            if($request == 0){
                echo '<div class="alert alert-danger">Error</div>';
            }else{
                return $request;
            }    
        }
    }


 
    

    
        
    

?>