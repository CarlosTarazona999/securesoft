<?php

class controladorDatosEmpresa
{
    static public function ctrDatosEmpresa()
    {
        $tabla = "empresas";

        $respuesta = modeloDatosEmpresa::mdlDatosEmpresa($tabla);
        //var_dump($respuesta);
        return $respuesta;
    }

    static public function ctrDetalleEmpresa()
    {
        $tabla = "empresas";

        $respuesta = modeloDatosEmpresa::mdlDatosEmpresa($tabla);
        //var_dump($respuesta);
        return $respuesta;
    }
    static public function ctrselectEmpresa()
    {

        $valor = $_SESSION['idusuario'];
        $respuesta = modeloDatosEmpresa::mdlSelectEmpresa($valor);

        return $respuesta;
    }
    static public function ctrDatosEmpresaModal($valor)
    {
        $respuesta = modeloDatosEmpresa::mdlDatosEmpresaModal($valor);
        return $respuesta;
    }
    static public function buscar_Empresa($nombre)
    {
        $respuesta = modeloDatosEmpresa::buscar_Empresa($nombre);
        return $respuesta;
    }
    static public function mdlLlenarRubro()
    {
        $respuesta = modeloDatosEmpresa::mdlLlenarRubro();
        return $respuesta;
    }
}
