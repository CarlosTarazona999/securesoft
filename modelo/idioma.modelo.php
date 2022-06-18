<?php
require_once "conexion.php";

class ModeloIdioma
{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    public function mdlIngresarIdioma($idusuario, $idioma, $nivel)
    {
        $sql = "INSERT INTO idioma(idioma, nivel, idusuario) VALUES (?,?,?)";
        $stmt = $this->db->prepare($sql);
        
        $stmt->bindParam(1, $idioma, PDO::PARAM_STR);
        $stmt->bindParam(2, $nivel, PDO::PARAM_STR);
        $stmt->bindParam(3, $idusuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt;
        $stmt->close();
        $stmt = null;
    }
    public function existeIdioma(string $idioma, int $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM idioma WHERE idioma = ? AND idusuario = ?");
        $stmt->bindParam(1, $idioma, PDO::PARAM_STR);
        $stmt->bindParam(2, $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    //MostrarIdiomaEnSelect
    public function MdlMostrar($tabla)
    {

        //usamos esta consulta para listar todos los idiomas
        $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //MostrarTablaIdioma
    public function MdlMostrarTablaIdioma($item, $valor)
    {

        //usamos esta consulta para listar todos los idiomas
        $stmt = Conexion::conectar()->prepare("SELECT *  FROM idioma i 
        INNER JOIN nombre_idioma n ON n.id=i.idioma
        INNER JOIN nivel_idioma ni ON ni.id=i.nivel
        WHERE i.idusuario=:$item
        ORDER BY ididioma asc
            ");
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function MdlEliminaDatos($id)
    {

        $sql = "DELETE from idioma WHERE ididioma =" . $id;
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->execute();
        if ($stmt) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
}
