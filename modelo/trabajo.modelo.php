<?php 
require_once 'conexion.php';

class ModeloTrabajo{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    
    public function anadirTrabajo(int $idusuario, string $nom_empleo,string $rubro,string $ubicacion, $salario){
        
        $sql = "INSERT INTO trabajo_ideal(idusuario, nom_empleo, rubro, ubicacion, salario) VALUES (?,?,?,?,?)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1,$idusuario, PDO::PARAM_INT);
        $stmt->bindParam(2,$nom_empleo, PDO::PARAM_STR);
        $stmt->bindParam(3,$rubro, PDO::PARAM_STR);
        $stmt->bindParam(4,$ubicacion, PDO::PARAM_STR);
        $stmt->bindParam(5,$salario, PDO::PARAM_STR);
        
        $stmt->execute();
        return $stmt;
        $stmt->close();
        $stmt =null;
    }

    public function selectTrabajo($valor){

        if ($valor != null) {
            
            $stmt = Conexion::conectar()->prepare("SELECT trabajo.idtrabajo_ideal, trabajo.nom_empleo, rub.tipo_rubro as rubro, trabajo.ubicacion, trabajo.salario FROM trabajo_ideal as trabajo INNER JOIN rubro as rub ON rub.idrubro = trabajo.rubro WHERE idusuario = ?");
            $stmt->bindParam(1, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }else{
            return "no hay datos en la condicion";
        }
    }

    public function eliminarTrabajo($valor){

        $stmt = Conexion::conectar()->prepare("DELETE FROM trabajo_ideal WHERE idtrabajo_ideal =". $valor);
        $stmt->execute();
        if($stmt){
            return "ok";
        }else{
            return "error";
        }
        $stmt->close();
        $stmt =null;
    }

    public function selectRubro(){
            
        $stmt = Conexion::conectar()->prepare("SELECT * FROM rubro");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  

    public function existeTrabajo(string $nom_empleo, int $valor){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM trabajo_ideal WHERE nom_empleo = ? AND idusuario = ?");
        $stmt->bindParam(1, $nom_empleo, PDO::PARAM_STR);
        $stmt->bindParam(2, $valor, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
}

?>