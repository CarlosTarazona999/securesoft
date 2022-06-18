<?php

class EmpleosControlador
{
    static public function ListarFiltros($atributo, $condicion, $x)
    {
        $listado = EmpleosModelo::ListarFiltros($atributo, $condicion, $x);

        return $listado;
    }

    static public function FiltrarPublicaciones($especialidad, $contrato, $trabajo_remoto, $salario, $departamento, $años_experiencia, $name_trabajo, $distrito)
    {
        $listado = EmpleosModelo::FiltrarPublicaciones($especialidad, $contrato, $trabajo_remoto, $salario, $departamento, $años_experiencia, $name_trabajo, $distrito);

        return $listado;
    }
    static public function FiltrarPublicacionesXid($cod)
    {

        $listado = EmpleosModelo::FiltrarPublicacionesXid($cod);
        return $listado;
    }

    static public function ListaAreaEstudio()
    {

        $listado = EmpleosModelo::ListaAreaEstudio();
        return $listado;
    }
}
