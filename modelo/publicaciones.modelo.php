<?php
require_once "conexion.php";

class Modelopublicar
{
    //Modelo para mostrar los planes del usuario
    static public function Planes($usuario, $plan)
    {
        $sql = " SELECT * FROM usuario INNER JOIN Publicaciones
        ON usuario.idusuario = Publicaciones.id_usuario
        WHERE Publicaciones.id_usuario = $usuario AND usuario.plan = '$plan'";

        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->execute();
        $response = $stmt->fetchAll();
        return $response;
    }
    //modelo para ingresar publicaci��n
    static public function mdlIngresarpublicacion($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario, puesto, departamento, provincia, distrito, direccion, contrato, especialidad, experiencia, salario, trb_remoto, descripcion, fecha, hora) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $respuesta = $stmt->execute([$datos['id_usuario'], $datos['puesto'], $datos['departamento'], $datos['provincia'], $datos['distrito'], $datos['direccion'], $datos['contrato'], $datos['especialidad'], $datos['experiencia'], $datos['salario'], $datos['trb_remoto'], $datos['descripcion'], $datos['fecha'], $datos['hora']]);


        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }

    //mostrar publicaciones para empresa en el modal
    /*static public function MdlMostrarPublicacionesEmpresaModal($tabla,$tabla2,$item,$valor){
        
        //usamos esta consulta para listar todas las publicaciones
            $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla p INNER JOIN $tabla2 a ON p.especialidad = a.idarea_estudio WHERE p.id_publicaciones=:$item
            ");
            //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
            $stmt -> bindParam(":".$item,$valor , PDO::PARAM_INT); 
            $stmt -> execute();
            //print_r($stmt->errorInfo());
            return $stmt->fetch();
    }*/

    //mostrar las publicaciones de las empresas en la tabla de empleo publicados
    public function MdlMostrarPublicacionesEmpresa($valor)
    {

        if ($valor != null) {

            $stmt = Conexion::conectar()->prepare("SELECT *  FROM Publicaciones WHERE id_usuario=?
            ORDER BY Publicaciones.fecha desc, Publicaciones.hora desc
            ");
            $stmt->bindParam(1, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return "no hay datos en la condicion";
        }
    }


    //mostrar publicaciones para postulantes(todas las publicaciones)
    static public function MdlMostrarPublicacionesPostulante($inicio, $limite)
    {

        //usamos esta consulta para listar todas las publicaciones
        $stmt = Conexion::conectar()->prepare("SELECT *  FROM Publicaciones p INNER JOIN area_estudio a ON p.especialidad = a.idarea_estudio
            ORDER BY p.fecha DESC, p.hora DESC LIMIT $inicio, $limite");

        $stmt->execute();

        return $stmt->fetchAll();
    }
    static public function MdlMostrarPublicacionesPostulantePaginacion()
    {

        //usamos esta consulta para listar todas las publicaciones
        $stmt = Conexion::conectar()->prepare("SELECT *  FROM Publicaciones p INNER JOIN area_estudio a ON p.especialidad = a.idarea_estudio
            ORDER BY p.fecha DESC, p.hora DESC");

        $stmt->execute();

        return count($stmt->fetchAll());
    }

    static public function obtenerFotoEmpresa($tabla, $id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla Where idusuario = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }



    //mostrar las publicaciones de las empresas en la tabla de empleo publicados
    static public function MdlMostrarPublicacionesEmpresaModal($tabla, $tabla2, $item, $valor)
    {

        //usamos esta consulta para listar todas las publicaciones
        $stmt = Conexion::conectar()->prepare("SELECT *  FROM $tabla p INNER JOIN $tabla2 a ON p.especialidad = a.idarea_estudio WHERE p.id_publicaciones=:$item
            ");
        //$stmt -> bindParam(":".$item,$valor , PDO::PARAM_STR);
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);
        $stmt->execute();
        //print_r($stmt->errorInfo());
        return $stmt->fetch();
    }
    //modelo para eliminar publicacion
    public function MdleliminarPublicaciones($valor)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM Publicaciones WHERE id_publicaciones =" . $valor);
        $stmt->execute();
        if ($stmt) {
            return "ok";
        } else {
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }
    //modelo para editar publicacion
    static public function mdlEditarPublicacion($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET puesto=?, departamento=?, provincia=?, distrito=?, direccion=?, contrato=?, especialidad=?, experiencia=?, salario=?, trb_remoto=?, descripcion=? WHERE id_publicaciones=?");
        $respuesta = $stmt->execute([$datos['puesto'], $datos['departamento'], $datos['provincia'], $datos['distrito'], $datos['direccion'], $datos['contrato'], $datos['especialidad'], $datos['experiencia'], $datos['salario'], $datos['trb_remoto'], $datos['descripcion'], $datos['id_publi']]);
        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }

    static public function mdlVerificarPostulante($tabla, $idusu, $idPostu)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_publicacion =  $idPostu AND id_usuario = $idusu");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }

    //Postular a  un trabajo
    static public function mdlPostular($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_publicacion, id_usuario,estado_postulacion) VALUES (?,?,'P')");
        $respuesta = $stmt->execute([$datos['id_publicacion'], $datos['id_usuario']]);
        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }

    /*
//mostrar los postulados de un trabajo
    public function MdlMostrarPostulados($valor){

        if ($valor != null) {
            
            $stmt = Conexion::conectar()->prepare("SELECT *  FROM postulados 
            INNER JOIN usuario ON postulados.id_usuario= usuario.idusuario
            INNER JOIN postulante ON postulante.idusuario=usuario.idusuario
            WHERE id_publicacion=?
            ");
            $stmt->bindParam(1, $valor, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }else{
            return "no hay datos en la condicion";
        }
    }
   */
    static public function mdlListarAreaEstudio($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
}
