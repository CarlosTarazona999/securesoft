<?php
session_start();
require_once "../modelo/conexion.php";


if (isset($_POST["idPostu"])) {

    if ($_SESSION['plan'] == "b") {
        $sql = "SELECT * FROM postulados p INNER JOIN Publicaciones b ON p.id_publicacion = b.id_publicaciones
        INNER JOIN usuario u ON u.idusuario = p.id_usuario 
        WHERE p.id_publicacion = :publica
        ORDER BY p.id_publicacion
        LIMIT 15";

    } else {

        $sql = "SELECT * FROM postulados p INNER JOIN Publicaciones b ON p.id_publicacion = b.id_publicaciones
         INNER JOIN usuario u ON u.idusuario = p.id_usuario 
         WHERE p.id_publicacion = :publica";
    }

    $stmt = Conexion::conectar()->prepare($sql);

    $stmt->bindParam(":publica", $_POST["idPostu"], PDO::PARAM_INT);

    $stmt->execute();

    $response = $stmt->fetchAll();

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
}

if (isset($_POST["codi"])) {

    $stmt = Conexion::conectar()->prepare("DELETE FROM postulados WHERE id_postulacion = :idpos");

    $stmt->bindParam(":idpos", $_POST["codi"], PDO::PARAM_INT);

    $stmt->execute();

    echo 'Eliminado';
}

