 <!-- Sidebar menu-->
 <!-- Sidebar menu-->
 <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
 <aside class="app-sidebar">
 <?php
 if( $_SESSION['rol'] == 1){
  $row = VerPostulanteControlador::ctrListarFotoPerfil('postulante',$_SESSION['idusuario']);
 }else{
  $row = VerPostulanteControlador::ctrListarFotoPerfil('empresas',$_SESSION['idusuario']);
 }?>
   <div class="app-sidebar__user">
   <?php foreach ($row as $key => $value): 
       if ($value["foto_perfil"] != null && file_exists($value["foto_perfil"])) {
          $img = $value["foto_perfil"];
        } else {
          $img = 'vista/images/foto-por-defecto.png';
        }?>
    <img class="imgdp" src="<?php echo $img; ?>"  alt="User Image" >
   <?php endforeach; ?>
     <div class="name_user">
     <p class="app-sidebar__user-designation"><?php echo $_SESSION['nombre'] ?></p>
     <p class="app-sidebar__user-designation"><?php echo $_SESSION['apellido'] ?></p>
       <p class="app-sidebar__user-designation"><?php echo $_SESSION['rol'] ?></p>
     </div>
   </div>
   <?php if( $_SESSION['rol'] == 1)
    {?>
    <ul class="app-menu">
      
      <li><a class="app-menu__item" href="inicio"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Inicio</span></a></li>

      <li class="treeview <?php echo ($_GET['ruta'] == "datosPostulante" || $_GET['ruta'] == "educacion" || $_GET['ruta'] == "idioma" || $_GET['ruta'] == "conocimiento" || $_GET['ruta'] == "experiencia") ? "is-expanded" : "" ?>">
        <a class="app-menu__item" href="usuarios" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Perfil</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu ml-2">
          <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "datosPostulante") ? "active" : "" ?>" href="datosPostulante"><i class="icon fas fa-user-graduate mr-1"></i> Datos del Postulante</a></li>
          <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "educacion") ? "active" : "" ?>" href="educacion"><i class="fas fa-university mr-1"></i> Educación</a></li>
          <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "idioma") ? "active" : "" ?>" href="idioma"><i class="fas fa-language mr-1"></i> Idiomas</a></li>
          <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "conocimiento") ? "active" : "" ?>" href="conocimiento"><i class="fas fa-atlas mr-1"></i> Conocimientos y Habilidades</a></li>
          <li><a class="treeview-item pt-3  <?php echo ($_GET['ruta'] == "experiencia") ? "active" : "" ?>" href="experiencia"><i class="fas fa-industry mr-1"></i> Experiencia</a></li>
          
        </ul>
      </li>
      <li><a class="app-menu__item" href="empleos"><i class="app-menu__icon fa fa-briefcase"></i><span class="app-menu__label">Buscar Empleo</span></a></li>
      <li><a class="app-menu__item" href="postulaciones"><i class="app-menu__icon fa fa-address-book"></i><span class="app-menu__label">Postulados</span></a></li>
      <li><a class="app-menu__item" href="trabajoideal"><i class="app-menu__icon fas fa-heart"></i><span class="app-menu__label">Trabajo Ideal</span></a></li>
      <li><a class="app-menu__item" href="salir"><i class="app-menu__icon fa fa-close"></i><span class="app-menu__label">Cerrar sesión</span></a></li>
    </ul>
    <?php
    }
    ?>


   <?php if( $_SESSION['rol'] != 1)
   {?>
   <ul class="app-menu">
      
      <li><a class="app-menu__item" href="inicio"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Inicio</span></a></li>
      <li><a class="app-menu__item" href="datosempresa"><i class="app-menu__icon fab fa-buffer"></i><span class="app-menu__label">Datos </span></a></li>
      <li><a class="app-menu__item" href="publicaEmpleo"><i class="app-menu__icon fa fa-bullhorn"></i><span class="app-menu__label">Publicar Empleo</span></a></li>
      <li><a class="app-menu__item" href="verempleo"><i class="app-menu__icon fab fa-sistrix"></i><span class="app-menu__label">Empleos Publicados</span></a></li>
      <li><a class="app-menu__item" href="planes"><i class="app-menu__icon fa fa-bell"></i><span class="app-menu__label">Planes</span></a></li>
      <li><a class="app-menu__item" href="salir"><i class="app-menu__icon fa fa-close"></i><span class="app-menu__label">Cerrar sesión</span></a></li>
    </ul>
    <?php
   }
   ?>

 </aside>