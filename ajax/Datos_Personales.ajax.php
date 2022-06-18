<?php  
    require_once "../modelo/datosPersonales.Model.php";

    $nombre = isset($_POST['nombre'])? trim($_POST['nombre']): " ";
    $apellido = isset($_POST['apellido'])? trim($_POST['apellido']): " ";
    $email = isset($_POST['Correo'])? trim($_POST['Correo']): " ";
    $genero = isset($_POST['CboGenero'])? trim($_POST['CboGenero']): " ";
    $telefono = isset($_POST['telefono'])? trim($_POST['telefono']): NULL;
    $celular = isset($_POST['celular'])? trim($_POST['celular']): NULL;
    $tipodoc = isset($_POST['CboID'])? trim($_POST['CboID']): " ";
    $num = isset($_POST['ID'])? trim($_POST['ID']): NULL;
    $fecha = isset($_POST['fechanac'])? trim($_POST['fechanac']): " ";

    $estado_civil = isset($_POST['CboCivil'])? trim($_POST['CboCivil']): " ";
    $discapacidad = isset($_POST['optradio'])? trim($_POST['optradio']): " ";
    $sobre_mi = isset($_POST['about'])? trim($_POST['about']): " ";

    $linkendin = isset($_POST['linkedin'])? trim($_POST['linkedin']): " ";
    $departamento = isset($_POST['departamento'])? trim($_POST['departamento']): " ";
    $provincia = isset($_POST['provincia'])? trim($_POST['provincia']): " ";
    $distrito = isset($_POST['distrito'])? trim($_POST['distrito']): " ";
    $direccion = isset($_POST['direccion'])? trim($_POST['direccion']): " ";


    //*****************FOTO PERFIL**********************
    $dnipostulante = $_POST["dnipostulante"];

    $respuesta = null;

    //Carpeta de foto user
    $rutaUser = '../vista/imagen_usuario/';

    //archivo
    $archivo = $rutaUser. basename($_FILES["file"]["name"]);

    

        if ($_FILES["file"]["name"] == ""){

            $foto_perfil = isset($_POST["dato1"])? $_POST["dato1"]: " ";

        }else{

            //tipo archivo

            $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

            //Tama«Ðo de archivo
            $imagen = getimagesize($_FILES["file"]["tmp_name"]);
            
            if($imagen != false){

                $size = $_FILES["file"]["size"];
                if($size > 500000){
                    $respuesta = 'El documento tiene que ser menor a 500kb';
                
                }else{
                    unlink('../'.$_POST["dato1"]);
                    if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png"){
                        if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){                       
                            if($tipoArchivo == "jpg"){
                                //nueva ruta
                                $newRuta = $rutaUser . $dnipostulante .'.jpg';
                                rename ($archivo , $newRuta);
                                $foto_perfil = "vista/imagen_usuario/". $dnipostulante .".jpg";
                            }elseif($tipoArchivo == "jpeg"){
                                $newRuta = $rutaUser . $dnipostulante .'.jpeg';
                                rename ($archivo , $newRuta);
                                $foto_perfil = "vista/imagen_usuario/". $dnipostulante .".jpeg";
                            }elseif($tipoArchivo == "png"){
                                $newRuta = $rutaUser . $dnipostulante .'.png';
                                rename ($archivo , $newRuta);
                                $foto_perfil = "vista/imagen_usuario/". $dnipostulante .".png";
                            }
                           
                        }else{
                            $respuesta = 'Error al subir Imagen';
                        }

                    }else{
                        $respuesta = 'Solo se admiten archivos jpg y jpeg';
                        
                    }
                }

            }else{
                $respuesta = 'La Imagen no es una imagen';
            }
        }


        



    //*****************FIN FOTO PERFIL**********************


    //*****************CV**********************
    $res2 = null;

    //Carpeta cv
    $rutaCV = '../vista/cv/';

    //archivo
    $archivocv = $rutaCV . basename($_FILES["cv"]["name"]);
    $nameArchivo = $_FILES["cv"]["name"];

        //tipo archivo
        if ($_FILES["cv"]["name"] == ""){

            $cv = isset($_POST["dato2"])? $_POST["dato2"]: " ";

        }else{

            //tipo archivo cv
            $tipoArchivocv = strtolower(pathinfo($archivocv, PATHINFO_EXTENSION));

            //Tama«Ðo de archivo
            $cvfile = is_file($_FILES["cv"]["tmp_name"]);

            if($cvfile){

                $sizecv = $_FILES["cv"]["size"];

                if($sizecv > 500000){

                    $res2 = "el documento tiene que ser menor a 500kb";
                    $cv = isset($_POST["dato2"])? $_POST["dato2"]: " ";
                }else{
                    if($tipoArchivocv == "pdf"){

                        move_uploaded_file($_FILES["cv"]["tmp_name"], $archivocv);
                        $cv = "vista/cv/". $nameArchivo;

                    }else{
                        $res2 = "solo se admiten archivos PDF";
                    }
                }
            }else{
                $res2 = "El CV subido no es un archivo";
            }

            
        }

        
        if($respuesta !== null){
            $arrayresposne = array('status' => false, 'msg'=> $respuesta);
            
        }
        elseif($res2 !== null){
            $arrayresposne = array('status' => false, 'msg'=> $res2);

        }else{
            session_start();
            $item = $_SESSION['idusuario'];
            $model = new DatosPersonalesModel();
            $request = $model->actualizarDPostulante($nombre, $apellido, $email, $genero, $telefono, $celular, $tipodoc, $num, $fecha, $estado_civil, $discapacidad, $sobre_mi, $foto_perfil, $cv, $linkendin, $departamento, $provincia, $distrito, $direccion,$item);
        
            if($request){
                $arrayresposne = array('status' => true, 'msg'=> 'Datos actualizados correctamente');
            }else{
                $arrayresposne = array('status' => false, 'msg'=> 'error');
            }
        
        }
        
        echo json_encode($arrayresposne, JSON_UNESCAPED_UNICODE);





    // *****************FIN CV**********************




    // $nacionalidad = trim($_POST['nacion']);
    // $password = trim($param['password']);
    // $confirmpassword = trim($param['confirmpassword']);

   
?>