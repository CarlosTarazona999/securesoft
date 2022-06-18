<?php 
require_once 'conexion.php';

class DatosPersonalesModel{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    
    public function actualizarDPostulante(string $nombre,string $apellido,string $email,string $genero,$telefono,$celular,string $tipodoc,$dni,string $fecha, string $estado_civil, string $discapacidad, string $sobre_mi, string $foto_perfil, string $cv, string $linkendin, string $departamento, string $provincia, string $distrito, string $direccion, int $item){
        
        $sql = "UPDATE usuario 
                                INNER JOIN postulante ON usuario.idusuario = postulante.idusuario 
                                SET usuario.nombre = ?, usuario.apellido = ?, usuario.correo = ?, usuario.genero = ?, usuario.telefono = ?, usuario.celular = ?, usuario.tipo_carneti = ?, usuario.num_carnet = ?, usuario.fecha_nac = ?, postulante.estado_civil = ?, postulante.discapacidad = ?, postulante.sobre_mi = ?, postulante.foto_perfil = ?, postulante.cv = ?, postulante.linkendin = ?, postulante.departamento = ?, postulante.provincia = ?, postulante.distrito = ?, postulante.direccion = ? WHERE usuario.idusuario = ?";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1,$nombre, PDO::PARAM_STR);
        $stmt->bindParam(2,$apellido, PDO::PARAM_STR);
        $stmt->bindParam(3,$email, PDO::PARAM_STR);
        $stmt->bindParam(4,$genero, PDO::PARAM_INT);
        $stmt->bindParam(5,$telefono, PDO::PARAM_INT);
        $stmt->bindParam(6,$celular, PDO::PARAM_INT);
        $stmt->bindParam(7,$tipodoc, PDO::PARAM_INT);
        $stmt->bindParam(8,$dni, PDO::PARAM_INT);
        // $stmt->bindParam(':nacionalidad',$nacionalidad, PDO::PARAM_STR);
        $stmt->bindParam(9,$fecha, PDO::PARAM_STR);
        // $stmt->bindParam(':contrasena',$contrasena, PDO::PARAM_STR);
        $stmt->bindParam(10,$estado_civil, PDO::PARAM_INT);
        $stmt->bindParam(11,$discapacidad, PDO::PARAM_STR);
        $stmt->bindParam(12,$sobre_mi, PDO::PARAM_STR);
        $stmt->bindParam(13,$foto_perfil, PDO::PARAM_STR);
        $stmt->bindParam(14,$cv, PDO::PARAM_STR);
        $stmt->bindParam(15,$linkendin, PDO::PARAM_STR);
        $stmt->bindParam(16,$departamento, PDO::PARAM_STR);
        $stmt->bindParam(17,$provincia, PDO::PARAM_STR);
        $stmt->bindParam(18,$distrito, PDO::PARAM_STR);
        $stmt->bindParam(19,$direccion, PDO::PARAM_STR);
        $stmt->bindParam(20,$item, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt;
    }

    public function selectDPostulante($valor,$item){

        if ($item != null) {
            
            $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario u
            INNER JOIN genero g ON g.id_genero = u.genero
            INNER JOIN rol r ON r.id_rol = u.rol
            INNER JOIN carnet c ON c.id_carnet = u.tipo_carneti
            INNER JOIN postulante p ON p.idusuario = u.idusuario
            INNER JOIN estado_civil e ON e.id_estadocivil = p.estado_civil
			WHERE u.idusuario=:$item LIMIT 1");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }else{
            return "no hay datos en la condicion";
        }
    }
    static public function selectDEmpresa($tabla,$item,$valor){

        if ($item != null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM  $tabla as u 
            INNER JOIN empresas e ON e.idusuario = u.idusuario
			WHERE u.$item=:$item LIMIT 1");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }else{
            return "no hay datos en la condicion";
        }
    }

    static public function selectEsCivil(){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM estado_civil");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}


?>