<?php
require_once "conexion.php";

class ModeloConocimiento
{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }
    public function mdlIngresarConocimiento(int $idusuario,string $conocimiento)
    {

        $sql = 'INSERT INTO conocimiento(idusuario, conocimiento) VALUES (?,?)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $idusuario, PDO::PARAM_INT);
        $stmt->bindParam(2, $conocimiento, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt;
        $stmt->close();
        $stmt = null;
    }
    public function existeConocimiento(string $conocimiento, int $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM conocimiento WHERE conocimiento = ? AND idusuario = ?");
        $stmt->bindParam(1, $conocimiento, PDO::PARAM_STR);
        $stmt->bindParam(2, $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt = null;
    }
    //MostrarConocimientoEnSelect
    public function MdlMostrar($tabla)
    {

        //usamos esta consulta para listar todos los Conocimientos
        $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //MostrarTablaConocimiento
    public function MdlMostrarTablaConocimiento($valor)
    {
        if ($valor != null) {
            //usamos esta consulta para listar todos los Conocimientos
            $stmt = Conexion::conectar()->prepare("SELECT *  FROM conocimiento c 
        INNER JOIN nombre_conocimiento n ON n.id=c.Conocimiento
        WHERE c.idusuario=?
        ORDER BY idconocimiento asc
            ");
            $stmt->bindParam(1, $valor, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        } else {
            return "no hay datos en la condicion";
        }
    }

    public function MdlEliminaDatos($id)
    {

        $sql = "DELETE from conocimiento WHERE idconocimiento =" . $id;
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
