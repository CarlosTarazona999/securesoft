<?php

class Conexion{
    public static function conectar()
        {
            $host = '51.161.34.107';
            $db = 'jun21cod_IBLabora';
            $user = 'jun21cod_labora';
            $pass = '123abc,.-iblabora';
            

            $cadena = 'mysql:host='.$host.';dbname='.$db.';charset=utf8';  
            try{
                $conect = new PDO($cadena,$user,$pass);
                $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conect;
            }catch(PDOException $e){
                $conect = 'Error de Conexion';
                echo "Error ". $e->getMessage();
            }
        }
}