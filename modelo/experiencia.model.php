<?php 
require_once 'conexion.php';

class ExperienciaLaboralModel{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    
    public function anadirExperiencia(int $idusuario, string $empresa,string $cargo,string $fechainicion, $fechafinal){
        
        $sql = "INSERT INTO expe_laboral(idusuario, empresa, cargo, fecha_ini, fecah_fin) VALUES (?,?,?,?,?)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1,$idusuario, PDO::PARAM_INT);
        $stmt->bindParam(2,$empresa, PDO::PARAM_STR);
        $stmt->bindParam(3,$cargo, PDO::PARAM_STR);
        $stmt->bindParam(4,$fechainicion, PDO::PARAM_STR);
        $stmt->bindParam(5,$fechafinal, PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt;
        $stmt->close();
        $stmt =null;
    }

    public function selectExperiencia($valor){

        if ($valor != null) {
            
            $stmt = Conexion::conectar()->prepare("SELECT expe.idexpe_laboral, expe.empresa, car.tipo_cargo as cargo, expe.fecha_ini, expe.fecah_fin FROM expe_laboral as expe INNER JOIN cargo as car ON car.idcargo = expe.cargo WHERE idusuario = ?");
            $stmt->bindParam(1, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }else{
            return "no hay datos en la condicion";
        }
    }

    public function eliminarExperiencia($valor){

        $stmt = Conexion::conectar()->prepare("DELETE FROM expe_laboral WHERE idexpe_laboral =". $valor);
        $stmt->execute();
        if($stmt){
            return "ok";
        }else{
            return "error";
        }
        $stmt->close();
        $stmt =null;
    }

    public function selectCargo(){
            
        $stmt = Conexion::conectar()->prepare("SELECT * FROM cargo");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function existeExp(string $empresa, int $valor){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM expe_laboral WHERE empresa = ? AND idusuario = ?");
        $stmt->bindParam(1, $empresa, PDO::PARAM_STR);
        $stmt->bindParam(2, $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
}

?>