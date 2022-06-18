<?php
require_once "../modelo/dEmpresa.modelo.php";

if (isset($_POST['nombre'])) {

    if (isset($_POST['nombre']) && $_POST['nombre'] != null) {
        $nombre = $_POST['nombre'];
    } else {
        $nombre = "";
    }

    if (isset($_POST['apellidos']) && $_POST['apellidos'] != null) {
        $apellidos = $_POST['apellidos'];
    } else {
        $apellidos = "";
    }


    if (isset($_POST['correo']) && $_POST['correo'] != null) {
        $correo = $_POST['correo'];
    } else {
        $correo = "";
    }

    if (isset($_POST['CboGenero']) && $_POST['CboGenero'] != null) {
        $CboGenero = $_POST['CboGenero'];
    } else {
        $CboGenero = "";
    }

    if (isset($_POST['telefono']) && $_POST['telefono'] != null) {
        $telefono = $_POST['telefono'];
    } else {
        $telefono = "";
    }

    if (isset($_POST['celular']) && $_POST['celular'] != null) {
        $celular = $_POST['celular'];
    } else {
        $celular = "";
    }

    if ($_FILES["foto_perfil"]["name"] == "") {

        $foto_perfil = isset($_POST["dato1"]) ? $_POST["dato1"] : " ";
    } else if (isset($_FILES['foto_perfil'])) {
        $filePerfil = $_FILES['foto_perfil'];
        $filenamePerfil = $filePerfil['name'];
        $mimetypePerfil = $filePerfil['type'];

        if ($mimetypePerfil == "image/jpg" || $mimetypePerfil == 'image/jpeg' || $mimetypePerfil == 'image/png' || $mimetypePerfil == 'image/gif') {

            if (!is_dir('../vista/imagen_usuario')) {
                mkdir('../vista/imagen_usuario', 0777, true);
            }
            move_uploaded_file($filePerfil['tmp_name'], '../vista/imagen_usuario/' . $filenamePerfil);
            $foto_perfil = 'vista/imagen_usuario/' . $filenamePerfil;
        }
    }

    if (isset($_POST['CboCarnet']) && $_POST['CboCarnet'] != null) {
        $CboCarnet = $_POST['CboCarnet'];
    } else {
        $CboCarnet = "";
    }

    if (isset($_POST['numCarnet']) && $_POST['numCarnet'] != null) {
        $numCarnet = $_POST['numCarnet'];
    } else {
        $numCarnet = "";
    }

    if (isset($_POST['fechanac']) && $_POST['fechanac'] != null) {
        $fechanac = $_POST['fechanac'];
    } else {
        $fechanac = "";
    }

    if (isset($_POST['passwordPersona']) && $_POST['passwordPersona'] != null) {
        $passwordPersona = $_POST['passwordPersona'];
    } else {
        $passwordPersona = "";
    }

    //Datos de la empresa

    if (isset($_POST['nombreEmpresa']) && $_POST['nombreEmpresa'] != null) {
        $nombreEmpresa = $_POST['nombreEmpresa'];
    } else {
        $nombreEmpresa = "";
    }

    if (isset($_POST['ruc']) && $_POST['ruc'] != null) {
        $ruc = $_POST['ruc'];
    } else {
        $ruc = "";
    }

    if (isset($_POST['industria']) && $_POST['industria'] != null) {
        $industria = $_POST['industria'];
    } else {
        $industria = "";
    }

    if ($_FILES["logo"]["name"] == "") {

        $logo = isset($_POST["dato2"]) ? $_POST["dato2"] : "";
    } else if (isset($_FILES['logo'])) {
        $fileLogo = $_FILES['logo'];
        $filenameLogo = $fileLogo['name'];
        $mimetypeLogo = $fileLogo['type'];


        if ($mimetypeLogo == "image/jpg" || $mimetypeLogo == 'image/jpeg' || $mimetypeLogo == 'image/png' || $mimetypeLogo == 'image/gif') {

            if (!is_dir('../vista/logo')) {
                mkdir('../vista/logo', 0777, true);
            }
            move_uploaded_file($fileLogo['tmp_name'], '../vista/logo/' . $filenameLogo);
            $logo = 'vista/logo/' . $filenameLogo;
        }
    }


    if (isset($_POST['misionvision']) && $_POST['misionvision'] != null) {
        $misionvision = $_POST['misionvision'];
    } else {
        $misionvision = "";
    }

    if (isset($_POST['departamento']) && $_POST['departamento'] != null) {
        $departamento = $_POST['departamento'];
    } else {
        $departamento = "";
    }

    if (isset($_POST['provincia']) && $_POST['provincia'] != null) {
        $provincia = $_POST['provincia'];
    } else {
        $provincia = "";
    }

    if (isset($_POST['distrito']) && $_POST['distrito'] != null) {
        $distrito = $_POST['distrito'];
    } else {
        $distrito = "";
    }

    if (isset($_POST['direccion']) && $_POST['direccion'] != null) {
        $direccion = $_POST['direccion'];
    } else {
        $direccion = "";
    }


    if (isset($_POST['beneficios']) && $_POST['beneficios'] != null) {
        $beneficios = $_POST['beneficios'];
    } else {
        $beneficios = "";
    }

    session_start();
    $usu = $_SESSION['idusuario'];
    $sizefoto_perfil = $_FILES["foto_perfil"]["size"];
    $sizeLogo = $_FILES["logo"]["size"];

    //Condicion foto perfil
    if ($sizefoto_perfil > 500000 || $sizeLogo > 500000) {
        echo ("ImagenError");
    } else {

        $respuesta = modeloDatosEmpresa::mdlUpdateEmpresa($nombre, $apellidos, $correo, $CboGenero, $telefono, $celular, $CboCarnet, $numCarnet, $fechanac, $passwordPersona, $nombreEmpresa, $ruc, $industria, $logo, $foto_perfil, $misionvision, $departamento, $provincia, $distrito, $direccion, $beneficios, $usu);

        if ($respuesta == "ok") {
            echo ("exito");
        } else {
            echo ("error");
        }
    }
}
