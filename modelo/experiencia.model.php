<?php 
require_once 'conexion.php';

class ProductoModelo{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    
    public function anadirExperiencia(int $idusuario, string $producto,string $cargo,string $fechainicion, $fechafinal){
        
        $sql = "INSERT INTO productos(Id, Producto, Categoria, Precio, Stock, Imagen) VALUES (?,?,?,?,?,?)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->bindParam(2,$producto, PDO::PARAM_STR);
        $stmt->bindParam(3,$categoria, PDO::PARAM_STR);
        $stmt->bindParam(4,$precio, PDO::PARAM_INT);
        $stmt->bindParam(5,$stock, PDO::PARAM_INT);
        $stmt->bindParam(6,$imagen, PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt;
        $stmt->close();
        $stmt =null;
    }

    public function selectExperiencia($valor){

        if ($valor != null) {
            
            $stmt = Conexion::conectar()->prepare("SELECT * FROM productos WHERE Id = ?");
            $stmt->bindParam(1, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }else{
            return "no hay datos en la condicion";
        }
    }

    public function eliminarExperiencia($valor){

        $stmt = Conexion::conectar()->prepare("DELETE FROM productos WHERE idproductos =". $valor);
        $stmt->execute();
        if($stmt){
            return "ok";
        }else{
            return "error";
        }
        $stmt->close();
        $stmt =null;
    }

    public function existeProducto(string $producto, int $valor){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM productos WHERE Producto = ? AND Id = ?");
        $stmt->bindParam(1, $producto, PDO::PARAM_STR);
        $stmt->bindParam(2, $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
}

?>