<?php 
require_once 'conexion.php';

class ProductoModelo{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    
    public function anadirProducto(string $producto,string $categoria,int $precio,int $stock, string $imagen){
        
        $sql = "INSERT INTO productos(Producto, Categoria, Precio, Stock, Imagen) VALUES (?,?,?,?,?)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1,$producto, PDO::PARAM_STR);
        $stmt->bindParam(2,$categoria, PDO::PARAM_STR);
        $stmt->bindParam(3,$precio, PDO::PARAM_INT);
        $stmt->bindParam(4,$stock, PDO::PARAM_INT);
        $stmt->bindParam(5,$imagen, PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt;
        $stmt->close();
        $stmt =null;
    }

    public function selectProducto($valor){

        if ($valor != null) {
            
            $stmt = Conexion::conectar()->prepare("SELECT * FROM productos WHERE Id = ?");
            $stmt->bindParam(1, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }else{
            return "no hay datos en la condicion";
        }
    }
    public function selectProductos(){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM productos");
        if ($stmt != null) {
            $stmt->bindParam(1, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }else{
            return "no hay datos en la condicion";
        }
    }
    // public function existeProducto(string $producto, int $valor){
    //     $stmt = Conexion::conectar()->prepare("SELECT * FROM productos WHERE Producto = ? AND Id = ?");
    //     $stmt->bindParam(1, $producto, PDO::PARAM_STR);
    //     $stmt->bindParam(2, $valor, PDO::PARAM_INT);
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    //     $stmt->close();
    //     $stmt =null;
    // }

    public function selectDPostulante($item){

        if ($item != null) {
            
            $stmt = Conexion::conectar()->prepare("SELECT * FROM Productos
            WHERE Id=:$item LIMIT 1");
            $stmt->bindParam(":".$item, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }else{
            return "no hay datos en la condicion";
        }
    }

    public function eliminarProducto($valor){

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

    
}
