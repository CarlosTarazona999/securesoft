<?php
require_once "conexion.php";

class ModeloPlan
{
    static public function UpdatePlanes($plan,$usuario,$fecha)
    {
        $sql = "UPDATE usuario SET Plan = '$plan', Fecha_compra_plan = '$fecha' where idusuario = $usuario";

        $stmt = Conexion::conectar()->prepare($sql);
        $respuesta = $stmt->execute();
        if($respuesta == true)
        {
            return "ok";
        }
        else{
            return "error";
        }
        $respuesta->close();
        $respuesta =null;
    }

}
