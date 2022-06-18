<?php
require_once "conexion.php";

class ModeloLogin
{
    static public function mdlMostrarLogin($tabla, $item, $valor)
    {
        $sql = "SELECT * FROM $tabla WHERE  $item  =:$item";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
    }

    //registrar usuario Postulante
    static public function mdlIngresarUsuarios($tabla, $datos)
    {
        $db = Conexion::conectar();
        //validamos usuario
        $consultaID = Conexion::conectar()->prepare('SELECT * FROM usuario WHERE correo = ?');
        $consultaID->execute([$datos['correo']]);
        $result = $consultaID->fetch(PDO::FETCH_OBJ);
        if (!empty($result)) {
            return 'repet';
        }

        $stmt = $db->prepare("INSERT INTO $tabla(nombre, apellido, correo, genero, telefono, celular, rol, tipo_carneti, num_carnet, fecha_nac, contrasena, status, codigo, Plan, Fecha_compra_plan) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,'b',SYSDATE())");

        $respuesta = $stmt->execute([$datos['nombre'], $datos['apellidos'], $datos['correo'], $datos['genero'], $datos['telefono'], $datos['celular'], $datos['rol'], $datos['tipo_carnet'], $datos['num_carneti'], $datos['fecha_nac'], $datos['contrasena'], $datos['status'], $datos['codigo']]);

        //lo a���adido
        $id = $db->lastInsertId();

        if ($id) {
            $stmt = $db->prepare("INSERT INTO postulante(idusuario) values(?)");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->execute();
        }
        //fin de lo a���adido

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }

    static public function ListarCorreo($correo)
    {
        $sql = "SELECT * from usuario where correo = '$correo'";
        $stmt = Conexion::conectar()->prepare($sql);
        $stmt->execute();
        $respuesta = $stmt->fetch();
        return $respuesta;
    }
    //activar cuenta
    static public function mdlLinkActivacion($status, $code)
    {
        $sql = "UPDATE usuario SET status = ? WHERE codigo = ?";
        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(1, $status);
        $stmt->bindParam(2, $code);
        $respuesta = $stmt->execute();

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
    }
    //desactivar cuenta
    static public function mdlDesactivacion($status, $code, $usuario)
    {
        $sql = "UPDATE usuario SET status = ?, codigo = ? WHERE idusuario = ?";
        $stmt = Conexion::conectar()->prepare($sql);

        $stmt->bindParam(1, $status);
        $stmt->bindParam(2, $code);
        $stmt->bindParam(3, $usuario);
        $respuesta = $stmt->execute();
        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
    }
    //registrar usuario empresa

    static public function mdlIngresarEmpresa($tabla, $datos)
    {
        $db = Conexion::conectar();
        //validamos usuario
        $consultaID = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correo = ?");
        $consultaID->execute([$datos['correo']]);
        $result = $consultaID->fetch(PDO::FETCH_OBJ);
        if (!empty($result)) {
            return 'repet';
        }

        $stmt = $db->prepare("INSERT INTO $tabla(nombre, apellido, correo, genero, telefono, celular, rol, tipo_carneti, num_carnet, fecha_nac, contrasena, status, codigo, Plan, Fecha_compra_plan) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,'b',SYSDATE())");
        $respuesta = $stmt->execute([$datos['nombre'], $datos['apellidos'], $datos['correo'], $datos['genero'], $datos['telefono'], $datos['celular'], $datos['rol'], $datos['tipo_carnet'], $datos['num_carneti'], $datos['fecha_nac'], $datos['contrasena'], $datos['status'], $datos['codigo']]);

        //lo a���adido
        $id = $db->lastInsertId();

        if ($id) {
            $stmt = $db->prepare("INSERT INTO empresas(idusuario,nom_empresa,ruc,rubro) values(?,?,?,?)");
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->bindParam(2, $datos['empresa'], PDO::PARAM_STR);
            $stmt->bindParam(3, $datos['ruc'], PDO::PARAM_STR);
            $stmt->bindParam(4, $datos['rubro'], PDO::PARAM_STR);
            $stmt->execute();
        }
        //fin de lo a���adido

        if ($respuesta == true) {
            return "ok";
        } else {
            return "error";
        }
        $respuesta->close();
        $respuesta = null;
    }
    
        static public function mdlVerificarCorreo($correo)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM usuario WHERE correo = :correo");

        $stmt->bindParam(":correo",$correo,PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt = null;
    }

    static public function mdlUpdateContraseña($password,$id)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE usuario SET contrasena = :pass WHERE idusuario = :id");

        $stmt->bindParam(":pass", $password, PDO::PARAM_STR);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "actualizado";
        }else{
            return $stmt->errorInfo();
        }

        $stmt = null;
    }
}
