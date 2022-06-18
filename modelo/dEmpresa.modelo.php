<?php
require_once 'conexion.php';
class modeloDatosEmpresa
{
    static public function mdlDatosEmpresa($tabla)
    {

        //usamos esta consulta para listar todas las publicaciones
        $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla ORDER BY rand() LIMIT 9");
        //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_INT); 
        $stmt->execute();
        //print_r($stmt->errorInfo());
        return $stmt->fetchAll();
    }

    static public function mdlDatosEmpresaModal($valor)
    {

        //usamos esta consulta para listar todas las publicaciones
        $stmt = Conexion::conectar()->prepare("SELECT *  FROM empresas e INNER JOIN rubro r ON e.rubro = r.idrubro WHERE e.idempresa=$valor");
        $stmt->execute();
        return $stmt->fetch();
    }

    static public function mdlLlenarRubro()
    {
        $stmt = Conexion::conectar()->prepare(" SELECT * FROM rubro ");
       
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlSelectEmpresa($id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM empresas em
        INNER JOIN usuario u ON em.idusuario = u.idusuario 
        INNER JOIN genero g ON g.id_genero = u.genero
        INNER JOIN rol r ON r.id_rol = u.rol
        INNER JOIN carnet c ON c.id_carnet = u.tipo_carneti
        WHERE em.idusuario = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    static public function mdlUpdateEmpresa(string $nombre, string $apellidos, string $correo, int $CboGenero, int $telefono, int $celular, int $CboCarnet, int $numCarnet, string $fechanac, string $password, string $nombreE, int $ruc, string $industria, string $logo, string $foto_perfil, string $mision_vision, string $departamento, string $provincia, string $distrito, string $direccion, string $beneficios, int $id)
    {
        $sql = "UPDATE empresas em INNER JOIN usuario u ON em.idusuario = u.idusuario 
        SET em.nom_empresa = '$nombreE', 
        em.ruc = '$ruc',
        em.industria = '$industria',
        em.logo = '$logo', 
        em.foto_perfil = '$foto_perfil',
        em.mision_vision = '$mision_vision',
        em.beneficios = '$beneficios',
        em.departamento = '$departamento',
        em.provincia = '$provincia',
        em.distrito = '$distrito',
        em.direccion = '$direccion',
        u.nombre = '$nombre',
        u.apellido = '$apellidos',
        u.correo = '$correo',
        u.genero = '$CboGenero',
        u.telefono = '$telefono',
        u.celular = '$celular',
        u.tipo_carneti = '$CboCarnet',
        u.num_carnet = '$numCarnet',
        u.fecha_nac = '$fechanac',
        u.contrasena = '$password'
        WHERE em.idusuario = '$id'";

        $stmt = Conexion::conectar()->prepare($sql);
        $respuesta =  $stmt->execute();

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }
    static public function buscar_Empresa($nombre)
    {
        $sql = "SELECT * FROM empresas WHERE nom_empresa like '$nombre%'";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
