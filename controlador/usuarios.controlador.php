<?php
class ControladorLogin
{
    static public function recaptcha()
    {
        $keySecreta = "6Lcx2cAaAAAAAOJjOXcnTXBgM8DA178ejQh4cl3L";
        $ip = $_SERVER["REMOTE_ADDR"];
        $respuesta = $_POST["g-recaptcha-response"];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$keySecreta&response=$respuesta&remoteip=$ip";
        $fire = file_get_contents($url);
        return json_decode($fire);
    }
    static public function ctrConsultarRuc($ruc)
    {
        $ruta = "https://ruc.com.pe/api/v1/consultas";
        $token = "aec7b1d1-11a4-4e14-b347-411bd35b0cdf-033ddb21-14cf-4a05-9f44-302072a39f97";
        $rucaconsultar = $ruc;
        $data = array(
            "token"    => $token,
            "ruc"   => $rucaconsultar
        );

        $data_json = json_encode($data);

        // Invocamos el servicio a ruc.com.pe
        // Ejemplo para JSON
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $ruta);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
            )
        );
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $respuesta  = curl_exec($ch);
        curl_close($ch);
        $leer_respuesta = json_decode($respuesta, true);
        if (isset($leer_respuesta['error'])) {
            //Mostramos los errores si los hay
            return 'error';
        } else {
            //Mostramos la respuesta
            return 'existe';
        }
    }
    static public function ctrLogin()
    {
        if (isset($_POST['ingcorreo'])) {
            if (
                preg_match('/[a-zA-Z0-9]+$/', $_POST["ingcorreo"]) &&
                preg_match('/[a-zA-Z0-9]+$/', $_POST["ingcontraseña"])
            ) {
                $tabla = "usuario";

                $item = "correo";
                $valor = $_POST['ingcorreo'];
                $respuesta = ModeloLogin::mdlMostrarLogin($tabla, $item, $valor);

                if ($respuesta == 0) {
                    echo '<div class="alert alert-danger">Error al ingresar, vuelva a intentarlo</div>';
                } else {
                    if ($respuesta["correo"] == $_POST["ingcorreo"] && $respuesta["contrasena"] == $_POST["ingcontraseña"]) {
                        if ($respuesta["status"] == 2) {


                            $_SESSION['iniciarSesion'] = 'ok';
                            $_SESSION['idusuario'] = $respuesta['idusuario'];
                            $_SESSION['nombre'] = $respuesta['nombre'];
                            $_SESSION['apellido'] = $respuesta['apellido'];
                            $_SESSION['correo'] = $respuesta['correo'];
                            $_SESSION['genero'] = $respuesta['genero'];
                            $_SESSION['telefono'] = $respuesta['telefono'];
                            $_SESSION['celular'] = $respuesta['celular'];
                            $_SESSION['rol'] = $respuesta['rol'];
                            $_SESSION['tipo_carneti'] = $respuesta['tipo_carneti'];
                            $_SESSION['num_carnet'] = $respuesta['num_carnet'];
                            $_SESSION['fecha_nac'] = $respuesta['fecha_nac'];
                            $_SESSION['contraseña'] = $respuesta['contrasena'];
                            $_SESSION['plan'] = $respuesta['Plan'];
                            $_SESSION['fecha_compra'] = $respuesta['Fecha_compra_plan'];

                            echo '<script>window.location="inicio";</script>';
                        } else {
                            echo '<div class="text-danger mt-2">*Esta ha sido eliminada</div>';
                        }
                    } else {

                        echo '<div class="text-danger mt-2">*Usuario o contraseña incorrecta</div>';
                    }
                }
            }
        }
    }
     static public function EnviarCorreoRecuperarCuenta()
    {
        if (isset($_POST["correo"])) {
            $destino = $_POST["correo"];
            $respuesta = ModeloLogin::ListarCorreo($destino);

            $mensaje = "http://localhost:8080/IBlabora2/linkactivation?link=" . $respuesta['codigo'];

            $contenido = "Correo: " . $destino . "\nMensaje: " . $mensaje;
            $resp = mail($destino, "", $contenido);
            if ($resp) {
                echo '<script>
                    document.addEventListener("DOMContentLoaded",() => {
                    Swal.fire({
                        icon: "success",
                        text: "Se le envio un codigo de activacion a su correo"
                    })
                    })

                    </script>';
            } else {
                echo '<script>
                document.addEventListener("DOMContentLoaded",() => {
                    Swal.fire({
                        icon: "error",
                        text: "Error no se pudo enviar el codigo de recuperacion"
                    })
                    })
                </script>';
            }
        }
    }
    //Crear Usuario Postulante
    static public function ctrCrearUsuario()
    {

        if (isset($_POST['email'])) {
            $recaptcha = ControladorLogin::recaptcha();
            if ($recaptcha->success == true) {

                if (
                    preg_match('/[a-zA-Z0-9\sñÑáéíóúÁÉÍÓÚ]+$/', $_POST['nombre']) &&
                    preg_match('/[a-zA-Z0-9]+$/', $_POST['email']) &&
                    preg_match('/[a-zA-Z0-9]+$/', $_POST['password'])
                ) {

                    $tabla = "usuario";
                    $string = "";
                    $posible = "1234567890abcdefghijklmnopqrstuvwxyz_";
                    $i = 0;
                    while ($i < 20) {
                        $char = substr($posible, mt_rand(0, strlen($posible) - 1), 1);
                        $string .= $char;
                        $i++;
                    }
                    $status = "1";
                    $carnet = '';
                    if ($_POST["valor"] == 2) {
                        $resp = ControladorLogin::ctrConsultarRuc($_POST["DNI"]);
                        if ($resp == 'error') {
                            echo '<script>
                            document.addEventListener("DOMContentLoaded",() => {
                            Swal.fire({
                                icon: "error",
                                text: "El Ruc es Incorrecto o esta Incompleto"
                            })
                            })
                            </script>';
                            return;
                        } else {
                            $carnet = $_POST["DNI"];
                        }
                    } else {
                        $carnet = $_POST["DNI"];
                    }
                    $datos = array(
                        "nombre" => $_POST['nombre'],
                        "apellidos" => $_POST['apellido'],
                        "correo" => $_POST['email'],
                        "genero" => $_POST['CboGenero'],
                        "telefono" => $_POST['telefono'],
                        "celular" => $_POST['celular'],
                        "rol" => $_POST['rol'],
                        "tipo_carnet" => $_POST['CboID'],
                        "num_carneti" => $carnet,
                        "fecha_nac" => $_POST['fechanac'],
                        "contrasena" => $_POST['password'],
                        "codigo" => $string,
                        "status" => $status
                    );

                    $para = $_POST['email'];

                    $asunto1 = "Link de activación de Usuario en el Sistema.";
                    $asunto = utf8_decode($asunto1);

                    $mensaje = "Gracias por crear sus usuario en Nuestro Sistema, para poder acceder, debe activar su "
                        . "usuario haciendo clic en el siguiente enlace:" . "\n"
                        . "https://iblabora.com/linkactivation?link=$string" . "\n"
                        // . "http://localhost/pruebas/online/link_activation.php?link=$string"."\n"
                        . "usted se ha registrado con : " . " " . $para;
                    $sub1 = "CORPORACIÓN IBGROUP";
                    $sub = utf8_decode($sub1);
                    $cabeceras = '';
                    // Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
                    // Cabeceras adicionales
                    $cabeceras .= 'From: ' . $sub . ' <velmitex.corporacion@gmail.com>' . "\r\n" .
                        'Reply-To: velmitex.corporacion@gmail.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();




                    $respuesta = ModeloLogin::mdlIngresarUsuarios($tabla, $datos);



                    if ($respuesta == "ok") {

                        //Se hace el env铆o
                        mail($para, $asunto, $mensaje, $cabeceras);
                        echo '<script>
                    document.addEventListener("DOMContentLoaded",() => {
                    Swal.fire({
                        icon: "success",
                        text: "Formulario enviado exitosamente, verifique su correo para acceder."
                      })
                    })
                    </script>';
                    } else {
                        if ($respuesta == "repet") {
                            echo '<script>
                            document.addEventListener("DOMContentLoaded",() => {
                            Swal.fire({
                                icon: "error",
                                text: "El correo ingresado ya está en uso"
                              })
                            })
                            </script>';
                        } else {
                            echo '<script>
                            document.addEventListener("DOMContentLoaded",() => {
                            
                            Swal.fire({
                                icon: "error",
                                text: "El usuario no se registró"
                              })

                            })
                            </script>';
                        }
                    }
                } else {

                    echo '<script>
                    document.addEventListener("DOMContentLoaded",() => {
                    Swal.fire({
                        icon: "error",
                        text: "El usuario no puede ir vacío o llevar caracteres especiales"
                      })
                    })
                    </script>';
                }
            } else {
                echo '<script>
                        document.addEventListener("DOMContentLoaded",() => {
                            Swal.fire({
                                icon: "error",
                                text: "Debe marcar el recaptcha"
                            })
                        })
                    </script>';
            }
        }
    }
    //Crear codigo de activacion
    static public function ctrActivacion()
    {
        $status = "2";
        $url = $_SERVER['REQUEST_URI'];
        $components = parse_url($url);
        parse_str($components['query'], $results);
        $code = $results['link'];
        $respuesta = ModeloLogin::mdlLinkActivacion($status, $code);
        if ($respuesta == "ok") {
            echo '<script>
            document.addEventListener("DOMContentLoaded",() => {
            Swal.fire({
                icon: "success",
                text: "Su cuenta ha sido activada"
            })
            window.location="login";
            })

            </script>';
        } else {

            echo '<script>
                document.addEventListener("DOMContentLoaded",() => {
                    Swal.fire({
                        icon: "error",
                        text: "Error, su usuario no se activo"
                    })
                    })
                </script>';
        }
    }

    //Crear Usuario Postulante

    static public function ctrDesactivacion()
    {
        if (isset($_POST["usuario"])) {

            $code = "";
            $posible = "1234567890abcdefghijklmnopqrstuvwxyz_";
            $i = 0;
            while ($i < 20) {
                $char = substr($posible, mt_rand(0, strlen($posible) - 1), 1);
                $code .= $char;
                $i++;
            }

            $status = "1";
            $user = $_POST["usuario"];
            $respuesta = ModeloLogin::mdlDesactivacion($status, $code, $user);

            if ($respuesta == "ok") {

                echo '<script>
                document.addEventListener("DOMContentLoaded",() => {
                Swal.fire({
                    icon: "success",
                    text: "Su usuario ha sido eliminado"
                })
                window.location="login";
                })

                </script>';
                session_destroy();
            } else {

                echo '<script>
                    document.addEventListener("DOMContentLoaded",() => {
                        Swal.fire({
                            icon: "error",
                            text: "Error, el usuario no se elimino"
                        })
                        })
                    </script>';
            }
        }
    }

    static public function ctrCrearEmpresa()
    {

        if (isset($_POST['email'])) {
            $recaptcha = ControladorLogin::recaptcha();
            if ($recaptcha->success == true) {

                if (
                    preg_match('/[a-zA-Z0-9\sñÑáéíóúÁÉÍÓÚ]+$/', $_POST['nombre']) &&
                    preg_match('/[a-zA-Z0-9]+$/', $_POST['email']) &&
                    preg_match('/[a-zA-Z0-9]+$/', $_POST['password'])
                ) {
                    $tabla = "usuario";
                    $string = "";
                    $posible = "1234567890abcdefghijklmnopqrstuvwxyz_";
                    $i = 0;
                    while ($i < 20) {
                        $char = substr($posible, mt_rand(0, strlen($posible) - 1), 1);
                        $string .= $char;
                        $i++;
                    }
                    $status = "1";
                    $carnet = '';
                    $ruc = '';
                    if ($_POST["valor"] == 2) {
                        $resp = ControladorLogin::ctrConsultarRuc($_POST["DNI"]);
                        if ($resp == 'error') {
                            echo '<script>
                            document.addEventListener("DOMContentLoaded",() => {
                            Swal.fire({
                                icon: "error",
                                text: "El Ruc es Incorrecto o esta Incompleto"
                            })
                            })
                            </script>';
                            return;
                        } else {
                            $carnet = $_POST["DNI"];
                        }
                    } else {
                        $carnet = $_POST["DNI"];
                    }
                    if (!empty($_POST["ruc"])) {
                        $resp = ControladorLogin::ctrConsultarRuc($_POST["ruc"]);
                        if ($resp == 'error') {
                            echo '<script>
                            document.addEventListener("DOMContentLoaded",() => {
                            Swal.fire({
                                icon: "error",
                                text: "El Ruc es Incorrecto o esta Incompleto"
                            })
                            })
                            </script>';
                            return;
                        } else {
                            $ruc = $_POST["ruc"];
                        }
                    }
                    $datos = array(
                        "nombre" => $_POST['nombre'],
                        "apellidos" => $_POST['apellido'],
                        "correo" => $_POST['email'],
                        "genero" => $_POST['CboGenero'],
                        "telefono" => $_POST['telefono'],
                        "celular" => $_POST['celular'],
                        "rol" => $_POST['rol'],
                        "tipo_carnet" => $_POST['CboID'],
                        "num_carneti" => $carnet,
                        "fecha_nac" => $_POST['fechanac'],
                        "contrasena" => $_POST['password'],
                        "empresa" => $_POST['empresa'],
                        "ruc" => $ruc,
                        "rubro" => $_POST['rubro'],
                        "codigo" => $string,
                        "status" => $status
                    );

                    $para = $_POST['email'];

                    $asunto1 = "Link de activación de Usuario en el Sistema.";
                    $asunto = utf8_decode($asunto1);

                    $mensaje = "Gracias por crear sus usuario en Nuestro Sistema, para poder acceder, debe activar su "
                        . "usuario haciendo clic en el siguiente enlace:" . "\n"
                        . "https://iblabora.com/linkactivation?link=$string" . "\n"
                        // . "http://localhost/pruebas/online/link_activation.php?link=$string"."\n"
                        . "usted se ha registrado con : " . " " . $para;
                    $sub1 = "CORPORACIÓN IBGROUP";
                    $sub = utf8_decode($sub1);

                    // Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
                    // Cabeceras adicionales
                    $cabeceras = '';
                    $cabeceras .= 'From: ' . $sub . ' <velmitex.corporacion@gmail.com>' . "\r\n" .
                        'Reply-To: velmitex.corporacion@gmail.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
                    $respuesta = ModeloLogin::mdlIngresarEmpresa($tabla, $datos);


                    if ($respuesta == "ok") {
                        //Se hace el env铆o
                        mail($para, $asunto, $mensaje, $cabeceras);
                        echo '<script>
                        document.addEventListener("DOMContentLoaded",() => {
                        Swal.fire({
                            icon: "success",
                            text: "Formulario enviado exitosamente, verifique su correo para acceder."
                        })
                        })
                        </script>';
                    } else {
                        if ($respuesta == "repet") {
                            echo '<script>
                            document.addEventListener("DOMContentLoaded",() => {
                                Swal.fire({
                                    icon: "error",
                                    text: "El alumno ya existe"
                                })
                                })
            
                            </script>';
                        } else {
                            echo '<script>
                            document.addEventListener("DOMContentLoaded",() => {
                                Swal.fire({
                                    icon: "error",
                                    text: "El usuario no se registró"
                                })
                                })
                            </script>';
                        }
                    }
                } else {

                    echo '<script>
                    document.addEventListener("DOMContentLoaded",() => {
                        Swal.fire({
                            icon: "error",
                            text: "El usuario no puede ir vacío o llevar caracteres especiales"
                        })
                        })
                    </script>';
                }
            } else {
                echo '<script>
                        document.addEventListener("DOMContentLoaded",() => {
                            Swal.fire({
                                icon: "error",
                                text: "Debe marcar el recaptcha"
                            })
                        })
                    </script>';
            }
            var_dump("Datos: ", $datos, "Respuestas: ", $respuesta);
        }
    }
    
       static public function ctrRecuperarContraseña()
    {
        if (isset($_POST["forgot"])) {
            $correo = $_POST["forgot"];
            $verificar = ModeloLogin::mdlVerificarCorreo($correo);

            if ($verificar != "no-existe") {
                $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
                $password = "";
                //Reconstruimos la contraseña segun la longitud que se quiera
                for($i=0;$i<10;$i++) {
                   //obtenemos un caracter aleatorio escogido de la cadena de caracteres
                   $password .= substr($str,rand(0,62),1);
                }

                $para = $correo;
                $asunto1 = "Nueva Contraseña para su Cuenta";
                $asunto = utf8_decode($asunto1);

                $mensaje = "Nueva Contraseña : ".$password;
                $sub1="CORPORACIÓN IBGROUP";
                $sub=utf8_decode($sub1);
                $cabeceras = '';
                // Para enviar un correo HTML mail, la cabecera Content-type debe fijarse
                // Cabeceras adicionales
                $cabeceras .= 'From: '.$sub.' <velmitex.corporacion@gmail.com>' . "\r\n".
                'Reply-To: velmitex.corporacion@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                  
                $id = $verificar["idusuario"];

                $update = ModeloLogin::mdlUpdateContraseña($password, $id);

                if ($update == 'actualizado') {
                    mail($para, $asunto, $mensaje, $cabeceras);
                    echo '<script>
                    document.addEventListener("DOMContentLoaded",() => {
                    Swal.fire({
                        icon: "success",
                        text: "Hemos enviado su nueva contraseña a su bandeja de entrada del correo '.$para.'."
                      })
                    })
                    </script>';
                }else{
                    echo '<script>
                    document.addEventListener("DOMContentLoaded",() => {
                    Swal.fire({
                        icon: "error",
                        text: "Ah ocurrido un error inesperado."
                      })
                    })
                    </script>';
                }

            }else{
                echo '<script>
                document.addEventListener("DOMContentLoaded",() => {
                Swal.fire({
                    icon: "error",
                    text: "Este Correo no existe."
                  })
                })
                </script>';
            }
        }
    }

}
