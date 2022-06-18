<?php 
require_once 'conexion.php';


class ModeloEducacion{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    
    public function anadirEducacion(int $idusuario, string $centro_educacion,string $area_estudio,string $nivel,string $estado,string $fecha_ini, $fecha_fin){
        
        $sql = "INSERT INTO educacion(idusuario, centro_educacion, area_estudio, nivel, estado, fecha_ini, fecha_fin) VALUES (?,?,?,?,?,?,?)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1,$idusuario, PDO::PARAM_INT);
        $stmt->bindParam(2,$centro_educacion, PDO::PARAM_STR);
        $stmt->bindParam(3,$area_estudio, PDO::PARAM_STR);
        $stmt->bindParam(4,$nivel, PDO::PARAM_STR);
        $stmt->bindParam(5,$estado, PDO::PARAM_STR);
        $stmt->bindParam(6,$fecha_ini, PDO::PARAM_STR);
        $stmt->bindParam(7,$fecha_fin, PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt;
        $stmt->close();
        $stmt =null;
    }

    public function selectEducacion($valor){
        if ($valor != null) {
            
            $stmt = Conexion::conectar()->prepare("SELECT edu.ideducacion, edu.centro_educacion, edu.estado, edu.nivel, area.tipo_area_estudio as area_estudio, edu.fecha_ini, edu.fecha_fin FROM educacion as edu INNER JOIN area_estudio as area ON area.idarea_estudio = edu.area_estudio WHERE idusuario = ?");
            $stmt->bindParam(1, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }else{
            return "no hay datos en la condicion";
        }
        
    }

    public function eliminarEducacion($valor){

        $stmt = Conexion::conectar()->prepare("DELETE FROM educacion WHERE ideducacion =". $valor);
        $stmt->execute();
        if($stmt){
            return "ok";
        }else{
            return "error";
        }
        $stmt->close();
        $stmt =null;
    }
    
    public function selectArea(){
            
        $stmt = Conexion::conectar()->prepare("SELECT * FROM area_estudio");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

    public function existeEdu(string $centro_educacion, int $valor){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM educacion WHERE centro_educacion = ? AND idusuario = ?");
        $stmt->bindParam(1, $centro_educacion, PDO::PARAM_STR);
        $stmt->bindParam(2, $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
}

?>