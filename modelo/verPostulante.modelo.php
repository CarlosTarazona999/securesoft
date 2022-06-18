<?php

require_once "conexion.php";

class VerPostulanteModelo{

    static public function mdlListarPostulante($tabla1, $tabla2, $idPostulante)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 u INNER JOIN $tabla2 p ON u.idusuario = p.idusuario WHERE u.idusuario = :idPostulante");

        $stmt->bindParam(":idPostulante", $idPostulante, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }

    static public function mdlListarHabilidades($tabla1, $tabla2, $idPostulante)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 h INNER JOIN $tabla2 c ON h.conocimiento = c.id WHERE h.idusuario = :idPostulante");

        $stmt->bindParam(":idPostulante", $idPostulante, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }

    static public function mdlListarIdiomas($tabla1, $tabla2, $tabla3, $idPostulante)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 i INNER JOIN $tabla2 nom ON i.idioma = nom.id INNER JOIN $tabla3 ni ON i.nivel = ni.id WHERE i.idusuario = :idPostulante");

        $stmt->bindParam(":idPostulante", $idPostulante, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }

    static public function mdlListarLaboral($tabla1, $tabla2, $idPostulante)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 e INNER JOIN $tabla2 c ON e.cargo = c.idcargo WHERE e.idusuario = :idPostulante");

        $stmt->bindParam(":idPostulante", $idPostulante, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }

    static public function mdlListarEducacion($tabla1, $tabla2, $idPostulante)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla1 e INNER JOIN $tabla2 a ON e.area_estudio = a.idarea_estudio WHERE e.idusuario = :idPostulante");

        $stmt->bindParam(":idPostulante", $idPostulante, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }

    static public function mdlVerificarEstadoPostulacion($table, $idPos, $id2)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE id_publicacion = :idPos AND id_usuario = :idU");

        $stmt->bindParam(":idPos", $idPos, PDO::PARAM_INT);
        $stmt->bindParam(":idU", $id2, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();

        $stmt = null;
    }

    static public function mdlActualizarEstado($table,$estado, $id)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $table SET estado_postulacion = :estado WHERE id_postulacion = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":estado", $estado, PDO::PARAM_STR);

        if ($stmt->execute()) {
            return 'ok';
        }else{
            return $stmt->errorInfo();
        }

        $stmt = null;
    }
    static public function mdlListarFotoPerfil($tabla, $idUsu)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idusuario = :id");

        $stmt->bindParam(":id", $idUsu, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
}