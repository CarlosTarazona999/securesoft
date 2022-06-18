<?php 
require_once "../modelo/publicaciones.modelo.php";
require_once "../controlador/publicaciones.controlador.php";
//clases y funciones para que aparezcan los datos de la publicacion en el modal y en detalle
class Publicaciones{
    
    public $idpubli;
//editar
    public function ajaxEditarPubli(){
        $item="id_publicaciones";
        $valor = $this->idpubli;
        $respuesta = ControladorPublicar::ctrMostrarPublicacionesEmpresaModal($item,$valor);
        echo json_encode($respuesta);
        
    }
}
//Editar publicacion
if(isset($_POST["idpubli"]))
{
    $editar = new Publicaciones();
    $editar->idpubli = $_POST["idpubli"];
    $editar->ajaxEditarPubli();
}




