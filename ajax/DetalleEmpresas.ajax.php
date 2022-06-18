<?php 
require_once "../modelo/dEmpresa.modelo.php";
require_once "../controlador/dEmpresa.controlador.php";
//clases y funciones para que aparezcan los datos de la publicacion en el modal y en detalle
class DetalleEmpresa{
    
    public $idempresa;
//editar
    public function ajaxEditarDetalleEmpresa(){
      
        $valor = $this->idempresa;
        $respuesta = controladorDatosEmpresa::ctrDatosEmpresaModal($valor);
        echo json_encode($respuesta);
        
    }
}
//Editar publicacion
if(isset($_POST["idempresa"]))
{
    $editar = new DetalleEmpresa();
    $editar->idempresa = $_POST["idempresa"];
    $editar->ajaxEditarDetalleEmpresa();
}


