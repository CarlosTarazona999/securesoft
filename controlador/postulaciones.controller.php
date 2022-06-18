<?php 

class PostulacionesController{

    static public function ctrListarPostulaciones($idUsu, $pagina, $limite)
    {
        $tabla = 'postulados';
        $tabla1 = 'Publicaciones';
        $tabla2 = 'usuario';

        $inicio = ($pagina - 1) * $limite;

        $response = PostulacionesModelo::mdlListarPostulaciones($tabla, $tabla1, $tabla2, $idUsu, $inicio,$limite);

        return $response;
    }

    static public function ctrListarPaginacion($idUsu)
    {
        $tabla = 'postulados';
        $tabla1 = 'Publicaciones';
        $tabla2 = 'usuario';

        $response = PostulacionesModelo::mdlListarPaginacion($tabla, $tabla1, $tabla2, $idUsu);

        return $response;
    }

    static public function ctrObtenerEmpresa($idEmpresa)
    {
        $tabla = 'empresas';

        $response = PostulacionesModelo::mdlObtenerEmpresa($tabla, $idEmpresa);

        return $response;
    }

}


?>