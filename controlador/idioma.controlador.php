<?php
class ControladorIdioma
{

    //Crear publicacion de trabajo
    // static public function ctrCrearIdioma()
    // {

    //     if (isset($_POST['CboIdioma'])) {

    //         $tabla = "idioma";

    //         $datos = array(

    //             "idioma" => $_POST['CboIdioma'],
    //             "nivel" => $_POST['CboNivel'],
    //             "idusuario" => $_SESSION['idusuario']
    //         );

    //         $respuesta = ModeloIdioma::mdlIngresarIdioma($tabla, $datos);

    //         if ($respuesta == "ok") {
    //             echo '<script>
    //                     alert ("EXITO").then((result)=>{
    //                         if(result.value){
    //                             window.location = "idioma";
    //                         }
    //                     })

    //                     </script>';
    //         } else {
    //             if ($respuesta == "repet") {
    //                 echo '<script>
    //                 alert("El idioma ya existe, ingrese otro").then((result)=>{
    //                     if(result.value){
    //                         window.location = "idioma";
    //                     }
    //                 })

    //                 </script>';
    //             } else {
    //                 echo '<script>
    //                 alert("El idioma no se registró").then((result)=>{
    //                     if(result.value){
    //                         window.location = "idioma";
    //                     }
    //                 })

    //                 </script>';
    //             }
    //         }
    //     }
    // }
    //mostrar idioma en select
    static public function ctrMostrarIdioma()
    {
        $tabla = "nombre_idioma";
        $model = new ModeloIdioma();
        $respuesta = $model->MdlMostrar($tabla);

        return $respuesta;
    }
    //mostrar nivel en select
    static public function ctrMostrarNivel()
    {
        $tabla = "nivel_idioma";
        $model = new ModeloIdioma();
        $respuesta = $model->MdlMostrar($tabla);

        return $respuesta;
    }
    //mostrar tabla idioma
    // static public function ctrMostrarTablaIdioma($item, $valor)
    // {


    //     $respuesta = ModeloIdioma::MdlMostrarTablaIdioma($item, $valor);

    //     return $respuesta;
    // }
    // static public function ctrEliminarDatos($id)
    // {

    //     $respuesta = ModeloIdioma::MdlEliminaDatos($id);
    //     return $respuesta;
    // }
}
