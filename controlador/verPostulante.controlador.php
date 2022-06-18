<?php

class VerPostulanteControlador{

    static public function ctrListarPostulante($idPostulante)
    {
        $tabla1 = 'usuario';
        $tabla2 = 'postulante';

        $respuesta = VerPostulanteModelo::mdlListarPostulante($tabla1, $tabla2, $idPostulante);

        return $respuesta;
    }

    static public function ctrListarHabilidades($idPostulante)
    {
        $tabla1 = 'conocimiento';
        $tabla2 = 'nombre_conocimiento';

        $respuesta = VerPostulanteModelo::mdlListarHabilidades($tabla1, $tabla2, $idPostulante);

        return $respuesta;
    }

    static public function ctrListarIdiomas($idPostulante)
    {
        $tabla1 = 'idioma';
        $tabla2 = 'nombre_idioma';
        $tabla3 = 'nivel_idioma';

        $respuesta = VerPostulanteModelo::mdlListarIdiomas($tabla1, $tabla2, $tabla3, $idPostulante);

        return $respuesta;
    }

    static public function ctrListarLaboral($idPostulante)
    {
        $tabla1 = 'expe_laboral';
        $tabla2 = 'cargo';

        $respuesta = VerPostulanteModelo::mdlListarLaboral($tabla1, $tabla2, $idPostulante);

        return $respuesta;
    }

    static public function ctrListarEducacion($idPostulante)
    {
        $tabla1 = 'educacion';
        $tabla2 = 'area_estudio';

        $respuesta = VerPostulanteModelo::mdlListarEducacion($tabla1, $tabla2, $idPostulante);

        return $respuesta;
    }

    static public function ctrVerificarEstadoPostulacion($idPos,$id2)
    {
        $table = 'postulados';

        $respuesta = VerPostulanteModelo::mdlVerificarEstadoPostulacion($table, $idPos,$id2);

        return $respuesta;
    }

    static public function ctrActualizarEstado($id,$estado)
    {
        $table = 'postulados';

        $respuesta = VerPostulanteModelo::mdlActualizarEstado($table,$estado, $id);

        return $respuesta;
    }
    static public function ctrListarFotoPerfil($tabla, $idUsu)
    {
        $respuesta = VerPostulanteModelo::mdlListarFotoPerfil($tabla, $idUsu);

        return $respuesta;
    }
}