<?php
require_once "conexion.php";

class PagoModelo{

    static public function mdlRegistrarPago($tabla, $datos,$id_usu)
    {
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idusuario, monto, cod_transaccion) VALUES(:idUsu, :monto, :transacId)");

        $stmt->bindParam(':idUsu', $id_usu, PDO::PARAM_INT);
        $stmt->bindParam(':monto', $datos['monto'], PDO::PARAM_INT);
        $stmt->bindParam(':transacId', $datos['codTra'], PDO::PARAM_STR);

        if($stmt->execute()){
            return 'ok';
        }else{
            return $stmt->errorInfo();
        }

        $stmt = null;
    }

}