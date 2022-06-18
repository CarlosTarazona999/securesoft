<?php

require_once "conexion.php";

class EmpleosModelo
{
    static public function ListaAreaEstudio(){
        $sql = "SELECT tipo_area_estudio  FROM 
        area_estudio";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetchAll();

        return $resultado;
    }
    static public function ListarFiltros($atributo, $condicion, $x)
    {
        if ($x == true) {
            $sql = "SELECT $atributo, COUNT(id_publicaciones) as contador 
            FROM Publicaciones INNER JOIN area_estudio 
            ON idarea_estudio = especialidad
             GROUP BY $atributo";
        } else {

            $sql = "SELECT SUM(contador) AS sumacontador
            FROM 
            (SELECT COUNT(id_publicaciones) AS contador FROM Publicaciones
            GROUP BY $atributo";

            if ($condicion == "<") {
                $sql .=  " HAVING $atributo < 900) AS a";
            }
            if ($condicion == ">") {
                $sql .=  " HAVING $atributo > 900) AS a";
            }
            if ($condicion == "1año") {
                $sql .=  " HAVING $atributo = 1) AS a";
            }
            if ($condicion == "2años") {
                $sql .=  " HAVING $atributo = 2) AS a";
            }
            if ($condicion == "3-4años") {
                $sql .=  " HAVING $atributo BETWEEN 3 AND 4) AS a";
            }
            if ($condicion == "5-10años") {
                $sql .=  " HAVING $atributo BETWEEN 5 AND 10) AS a";
            }
        };

        $stmt =  Conexion::Conectar()->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetchAll();

        return $resultado;
    }

    static public function FiltrarPublicaciones($especialidad, $contrato, $trabajo_remoto, $salario, $departamento, $años_experiencia, $name_trabajo, $distrito)
    {

        $sql = "SELECT * FROM Publicaciones 
        INNER JOIN area_estudio 
        ON idarea_estudio = especialidad
        WHERE id_publicaciones >= 1";

        if ($especialidad != null) {
            $sql .= " AND tipo_area_estudio = '$especialidad'";
        }
        if ($contrato != null) {
            $sql .= " AND contrato = '$contrato'";
        }
        if ($trabajo_remoto != null) {
            $sql .= " AND trb_remoto = '$trabajo_remoto'";
        }
        if ($salario != null && $salario == "Menos900") {
            $sql .= " AND salario < 900";
        }
        if ($salario != null && $salario == "Mas900") {
            $sql .= " AND salario > 900";
        }
        if ($departamento != null) {
            $sql .= " AND departamento = '$departamento'";
        }
        if ($años_experiencia != null && $años_experiencia == "1año") {
            $sql .= " AND experiencia = 1";
        }
        if ($años_experiencia != null && $años_experiencia == "2años") {
            $sql .= " AND experiencia = 2";
        }
        if ($años_experiencia != null && $años_experiencia == "3-4años") {
            $sql .= " AND experiencia BETWEEN 3 AND 4";
        }
        if ($años_experiencia != null && $años_experiencia == "5-10años") {
            $sql .= " AND experiencia BETWEEN 5 AND 10";
        }
        if ($name_trabajo != null) {
            $sql .= " AND puesto LIKE '$name_trabajo%'";
        }

        if ($distrito != null) {
            $sql .= " AND distrito = '$distrito'";
        }

        $stmt =  Conexion::Conectar()->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        return  $resultado;
    }

    static public function FiltrarPublicacionesXid($cod)
    {

        $sql = "SELECT * FROM Publicaciones
        WHERE id_publicaciones = $cod";

        $stmt =  Conexion::Conectar()->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        return  $resultado;
    }
}
