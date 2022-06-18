<?php
class ControladorConocimiento
{

    // //Crear publicacion de trabajo
    // static public function ctrCrearConocimiento()
    // {

    //     if (isset($_POST['CboConocimiento'])) {

    //         $tabla = "conocimiento";

    //         $datos = array(

    //             "conocimiento" => $_POST['CboConocimiento'],

    //             "idusuario" => $_SESSION['idusuario']
    //         );

    //         $respuesta = ModeloConocimiento::mdlIngresarConocimiento($tabla, $datos);

    //         if ($respuesta == "ok") {
    //             echo '<script>
    //                     alert ("EXITO").then((result)=>{
    //                         if(result.value){
    //                             window.location = "Conocimiento";
    //                         }
    //                     })

    //                     </script>';
    //         } else {
    //             if ($respuesta == "repet") {
    //                 echo '<script>
    //                 alert("El Conocimiento ya existe, ingrese otro").then((result)=>{
    //                     if(result.value){
    //                         window.location = "Conocimiento";
    //                     }
    //                 })

    //                 </script>';
    //             } else {
    //                 echo '<script>
    //                 alert("El Conocimiento no se registró").then((result)=>{
    //                     if(result.value){
    //                         window.location = "Conocimiento";
    //                     }
    //                 })

    //                 </script>';
    //             }
    //         }
    //     }
    // }
    //mostrar Conocimiento en select
    static public function ctrMostrarConocimiento()
    {
        $tabla = "nombre_conocimiento";
        $model = new ModeloConocimiento();
        $respuesta = $model->MdlMostrar($tabla);

        return $respuesta;
    }

    // //mostrar tabla Conocimiento
    // static public function ctrMostrarTablaConocimiento($item, $valor)
    // {


    //     $respuesta = ModeloConocimiento::MdlMostrarTablaConocimiento($item, $valor);

    //     return $respuesta;
    // }
    // static public function ctrEliminarDatos($id)
    // {

    //     $respuesta = ModeloConocimiento::MdlEliminaDatos($id);
    //     return $respuesta;
    // }
}
