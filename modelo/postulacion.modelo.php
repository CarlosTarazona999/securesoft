<?php 

require_once "conexion.php";

class PostulacionesModelo{

    static public function mdlListarPostulaciones($tabla, $tabla1, $tabla2, $idUsu, $inicio,$limite)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla p INNER JOIN $tabla1 t ON p.id_publicacion = t.id_publicaciones INNER JOIN $tabla2 u ON p.id_usuario = u.idusuario WHERE p.id_usuario = $idUsu ORDER BY p.id_postulacion DESC LIMIT $inicio, $limite");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }

    static public function mdlListarPaginacion($tabla, $tabla1, $tabla2, $idUsu)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla p INNER JOIN $tabla1 t ON p.id_publicacion = t.id_publicaciones INNER JOIN $tabla2 u ON p.id_usuario = u.idusuario WHERE p.id_usuario = $idUsu ORDER BY p.id_postulacion DESC");

        $stmt->execute();

        return count($stmt->fetchAll());

        $stmt = null;
    }
    
    static public function mdlObtenerEmpresa($tabla, $idEmpresa)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idusuario = $idEmpresa");

        $stmt->execute();

        return $stmt->fetch();

        $stmt = null;
    }

}

?>