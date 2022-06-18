<?php
class ControladorPublicar
{

    //Crear publicacion de trabajo
    static public function ctrCrearPulbicaciones()
    {

        if (isset($_POST['puesto'])) {


            $tabla = "Publicaciones";
            $fecha = date("Y-m-d");
            $hora = date("H:i:s");
            $usuario = $_SESSION['idusuario'];
            $plan = $_SESSION['plan'];

            $response = Modelopublicar::Planes($usuario, $plan);

            if ($plan == "b") {
                if (count($response) < 10) {

                    $datos = array(
                        "id_usuario" => $_SESSION['idusuario'], //usamos la sesion de id para identificar que usuario est�1�71�1�77�1�71�1�77 publicando el trabajo
                        "puesto" => $_POST['puesto'],
                        "departamento" => $_POST['selectDepartamento'],
                        "provincia" => $_POST['selectProvincia'],
                        "distrito" => $_POST['selectDistrito'],
                        "direccion" => $_POST['direccion'],
                        "contrato" => $_POST['contrato'],
                        "especialidad" => $_POST['especialidad'],
                        "experiencia" => $_POST['experiencia'],
                        "salario" => $_POST['salario'],
                        "trb_remoto" => $_POST['optradio'],
                        "descripcion" => $_POST['descripcion'],
                        "fecha" => $fecha,
                        "hora" => $hora
                    );

                    $respuesta = Modelopublicar::mdlIngresarpublicacion($tabla, $datos);

                    if ($respuesta == "ok") {
                        echo '<script>
                   document.addEventListener("DOMContentLoaded",() => {
                       Swal.fire({
                           icon: "success",
                           text: "Empleo publicado correctamente"
                       })
                   })
               </script>';
                    } else {

                        echo '<script>
                   document.addEventListener("DOMContentLoaded",() => {
                       Swal.fire({
                           icon: "error",
                           text: "La empresa no se registro correctamente"
                       })
                   })
               </script>';
                    }
                } else {
                    echo '<script>
                   document.addEventListener("DOMContentLoaded",() => {
                       Swal.fire({
                           icon: "error",
                           text: "No puede publicar mas empleos 10 empleos es el limite de su plan basico"
                       })
                   })
               </script>';
                }
            }



            if ($plan == "s30") {
                if (count($response) < 50) {

                    $datos = array(
                        "id_usuario" => $_SESSION['idusuario'], //usamos la sesion de id para identificar que usuario est�1�71�1�77�1�71�1�77 publicando el trabajo
                        "puesto" => $_POST['puesto'],
                        "departamento" => $_POST['selectDepartamento'],
                        "provincia" => $_POST['selectProvincia'],
                        "distrito" => $_POST['selectDistrito'],
                        "direccion" => $_POST['direccion'],
                        "contrato" => $_POST['contrato'],
                        "especialidad" => $_POST['especialidad'],
                        "experiencia" => $_POST['experiencia'],
                        "salario" => $_POST['salario'],
                        "trb_remoto" => $_POST['optradio'],
                        "descripcion" => $_POST['descripcion'],
                        "fecha" => $fecha,
                        "hora" => $hora
                    );

                    $respuesta = Modelopublicar::mdlIngresarpublicacion($tabla, $datos);

                    if ($respuesta == "ok") {
                        echo '<script>
                   document.addEventListener("DOMContentLoaded",() => {
                       Swal.fire({
                           icon: "success",
                           text: "Empleo publicado correctamente"
                       })
                   })
               </script>';
                    } else {

                        echo '<script>
                   document.addEventListener("DOMContentLoaded",() => {
                       Swal.fire({
                           icon: "error",
                           text: "La empresa no se registro correctamente"
                       })
                   })
               </script>';
                    }
                } else {
                    echo '<script>
                   document.addEventListener("DOMContentLoaded",() => {
                       Swal.fire({
                           icon: "error",
                           text: "No puede publicar mas empleos 50 empleos es el limite de su plan standard 30 dias"
                       })
                   })
               </script>';
                }
            }



            if ($plan == "s90") {
                if (count($response) < 100) {

                    $datos = array(
                        "id_usuario" => $_SESSION['idusuario'], //usamos la sesion de id para identificar que usuario est�1�71�1�77�1�71�1�77 publicando el trabajo
                        "puesto" => $_POST['puesto'],
                        "departamento" => $_POST['selectDepartamento'],
                        "provincia" => $_POST['selectProvincia'],
                        "distrito" => $_POST['selectDistrito'],
                        "direccion" => $_POST['direccion'],
                        "contrato" => $_POST['contrato'],
                        "especialidad" => $_POST['especialidad'],
                        "experiencia" => $_POST['experiencia'],
                        "salario" => $_POST['salario'],
                        "trb_remoto" => $_POST['optradio'],
                        "descripcion" => $_POST['descripcion'],
                        "fecha" => $fecha,
                        "hora" => $hora
                    );

                    $respuesta = Modelopublicar::mdlIngresarpublicacion($tabla, $datos);

                    if ($respuesta == "ok") {
                        echo '<script>
                   document.addEventListener("DOMContentLoaded",() => {
                       Swal.fire({
                           icon: "success",
                           text: "Empleo publicado correctamente"
                       })
                   })
               </script>';
                    } else {

                        echo '<script>
                   document.addEventListener("DOMContentLoaded",() => {
                       Swal.fire({
                           icon: "error",
                           text: "La empresa no se registro correctamente"
                       })
                   })
               </script>';
                    }
                } else {
                    echo '<script>
                   document.addEventListener("DOMContentLoaded",() => {
                       Swal.fire({
                           icon: "error",
                           text: "No puede publicar mas empleos 50 empleos es el limite de su plan standard 90 dias"
                       })
                   })
               </script>';
                }
            }




            if ($plan == "p30") {

                if (count($response) < 100) {


                    $datos = array(
                        "id_usuario" => $_SESSION['idusuario'], //usamosz la sesion de id para identificar que usuario est�1�71�1�77�1�71�1�77 publicando el trabajo
                        "puesto" => $_POST['puesto'],
                        "departamento" => $_POST['selectDepartamento'],
                        "provincia" => $_POST['selectProvincia'],
                        "distrito" => $_POST['selectDistrito'],
                        "direccion" => $_POST['direccion'],
                        "contrato" => $_POST['contrato'],
                        "especialidad" => $_POST['especialidad'],
                        "experiencia" => $_POST['experiencia'],
                        "salario" => $_POST['salario'],
                        "trb_remoto" => $_POST['optradio'],
                        "descripcion" => $_POST['descripcion'],
                        "fecha" => $fecha,
                        "hora" => $hora
                    );

                    $respuesta = Modelopublicar::mdlIngresarpublicacion($tabla, $datos);

                    if ($respuesta == "ok") {
                        echo '<script>
                    document.addEventListener("DOMContentLoaded",() => {
                        Swal.fire({
                            icon: "success",
                            text: "Empleo publicado correctamente"
                        })
                    })
                </script>';
                    } else {

                        echo '<script>
                    document.addEventListener("DOMContentLoaded",() => {
                        Swal.fire({
                            icon: "error",
                            text: "La empresa no se registro correctamente"
                        })
                    })
                </script>';
                    }
                } else {
                    echo '<script>
                   document.addEventListener("DOMContentLoaded",() => {
                       Swal.fire({
                           icon: "error",
                           text: "No puede publicar mas empleos 100 empleos es el limite de su plan premium 30 dias"
                       })
                   })
               </script>';
                }
            }


            if ($plan == "p90") {

                if (count($response) < 200) {


                    $datos = array(
                        "id_usuario" => $_SESSION['idusuario'], //usamosz la sesion de id para identificar que usuario est�1�71�1�77�1�71�1�77 publicando el trabajo
                        "puesto" => $_POST['puesto'],
                        "departamento" => $_POST['selectDepartamento'],
                        "provincia" => $_POST['selectProvincia'],
                        "distrito" => $_POST['selectDistrito'],
                        "direccion" => $_POST['direccion'],
                        "contrato" => $_POST['contrato'],
                        "especialidad" => $_POST['especialidad'],
                        "experiencia" => $_POST['experiencia'],
                        "salario" => $_POST['salario'],
                        "trb_remoto" => $_POST['optradio'],
                        "descripcion" => $_POST['descripcion'],
                        "fecha" => $fecha,
                        "hora" => $hora
                    );

                    $respuesta = Modelopublicar::mdlIngresarpublicacion($tabla, $datos);

                    if ($respuesta == "ok") {
                        echo '<script>
                    document.addEventListener("DOMContentLoaded",() => {
                        Swal.fire({
                            icon: "success",
                            text: "Empleo publicado correctamente"
                        })
                    })
                </script>';
                    } else {

                        echo '<script>
                    document.addEventListener("DOMContentLoaded",() => {
                        Swal.fire({
                            icon: "error",
                            text: "La empresa no se registro correctamente"
                        })
                    })
                </script>';
                    }
                } else {
                    echo '<script>
                   document.addEventListener("DOMContentLoaded",() => {
                       Swal.fire({
                           icon: "error",
                           text: "No puede publicar mas empleos 100 empleos es el limite de su plan premium 90 dias"
                       })
                   })
               </script>';
                }
            }
        }
    }


    //mostrar publicaciones para empresa para el modal de editar
    static public function ctrMostrarPublicacionesEmpresaModal($item, $valor)
    {
        $tabla = "Publicaciones";
        $tabla2 = 'area_estudio';

        $respuesta = Modelopublicar::MdlMostrarPublicacionesEmpresaModal($tabla, $tabla2, $item, $valor);
        //var_dump($respuesta);
        return $respuesta;
    }

    /*
 //mostrar postulados
 static public function ctrMostrarPostulados(){
    $valor = $_POST['idpostPubli'];

    $respuesta = Modelopublicar::MdlMostrarPostulados($valor);
    //var_dump($respuesta);
    return $respuesta;
 }
*/


    //mostrar publicaciones para postulantes(todas las publicaciones)
    static public function ctrMostrarPublicacionesPostulante($pagina, $limite)
    {
        $inicio = ($pagina - 1) * $limite;

        $respuesta = Modelopublicar::MdlMostrarPublicacionesPostulante($inicio,$limite);
        return $respuesta;
    }

    static public function ctrMostrarPublicacionesPostulantePaginacion()
    {

        $respuesta = Modelopublicar::MdlMostrarPublicacionesPostulantePaginacion();
        return $respuesta;
    }

    static function ctrobtenerFoto($id)
    {
        $tabla = 'empresas';
        $response = Modelopublicar::obtenerFotoEmpresa($tabla, $id);
        return $response;
    }

    //Editar publicacion de trabajo
    static public function ctrEditarPublicacion()
    {

        if (isset($_POST['editpuesto'])) {

            $tabla = "Publicaciones";

            $datos = array(
                "puesto" => $_POST['editpuesto'],
                "departamento" => $_POST['editselectDepartamento'],
                "provincia" => $_POST['editselectProvincia'],
                "distrito" => $_POST['editselectDistrito'],
                "direccion" => $_POST['editdireccion'],
                "contrato" => $_POST['editcontrato'],
                "especialidad" => $_POST['editespecialidad'],
                "experiencia" => $_POST['editexperiencia'],
                "salario" => $_POST['editsalario'],
                "trb_remoto" => $_POST['editoptradio'],
                "descripcion" => $_POST['editdescripcion'],
                "id_publi" => $_POST['ideditPubli']
            );




            $respuesta = Modelopublicar::mdlEditarPublicacion($tabla, $datos);



            if ($respuesta == "ok") {

                echo '<script>
                        alert ("EXITO").then((result)=>{
                            if(result.value){
                                window.location = "verempleoo";
                            }
                        })
        
                        </script>';
                /*
                    echo "<script>
                    swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                      )
                    </script>";*/
            } else {
                echo '<script>
                    alert ("Hubo un problema").then((result)=>{
                        if(result.value){
                            window.location = "verempleoo";
                        }
                    })
    
                    </script>';
                /*
                    echo '<script>
                        swal.fire({
                            type:"error",
                            title : "Hubo un problema",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar",
                            closeOnConfirm: false
                        }).then((result)=>{
                            if(result.value){
                                window.location = "publicaEmpleo";
                            }
                        })
        
                        </script>';*/
            }
        }
    }

    static public function ctrVerificarPostulacion($idUsu, $idDeta)
    {
        $tabla = 'postulados';

        $response = Modelopublicar::mdlVerificarPostulante($tabla, $idUsu, $idDeta);

        return $response;
    }

    //Editar publicacion de trabajo
    static public function ctrPostular()
    {
        if (isset($_POST['detempleid'])) {
            if (isset($_SESSION['idusuario'])) {
                $sesion = $_SESSION['idusuario'];
            } else {
                $sesion = null;
            }

            if (isset($sesion)) {
                $verificar = ControladorPublicar::ctrVerificarPostulacion($_SESSION['idusuario'], $_POST['detempleid']);

                if (count($verificar) > 0 && count($verificar) < 2) {
                    echo '<script>
                        document.addEventListener("DOMContentLoaded",() => {
                            Swal.fire({
                                icon: "error",
                                text: "Usted ya se postulo a este Empleo"
                            })
                        })
                    </script>';
                    return;
                }

                $tabla = "postulados";

                $datos = array(
                    "id_publicacion" => $_POST['detempleid'],
                    "id_usuario" => $_SESSION['idusuario']
                );

                $respuesta = Modelopublicar::mdlPostular($tabla, $datos);

                if ($respuesta == "ok") {

                    echo '
                        <script>
                            document.addEventListener("DOMContentLoaded",() => {
                                Swal.fire({
                                    icon: "success",
                                    text: "POSTULADO CON EXITO"
                                })
                            })
                        </script>';
                } else {
                    echo '
                        <script>
                            document.addEventListener("DOMContentLoaded",() => {
                                Swal.fire({
                                    icon: "error",
                                    text: "Hubo un problema"
                                })
                            })
                        </script>';

                    /*
                        echo '<script>
                            swal.fire({
                                type:"error",
                                title : "Hubo un problema",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar",
                                closeOnConfirm: false
                            }).then((result)=>{
                                if(result.value){
                                    window.location = "publicaEmpleo";
                                }
                            })
            
                            </script>';*/
                }
            } else {
                echo '<script>
                document.addEventListener("DOMContentLoaded",() => {
                    Swal.fire({
                        icon: "error",
                        text: "Necesita estar registrado para postular a un empleo"
                    })
                })
                </script>';
            }
        }
    }

    static public function ctrListarAreaEstudio()
    {
        $tabla = 'area_estudio';

        $response = Modelopublicar::mdlListarAreaEstudio($tabla);

        return $response;
    }
}
