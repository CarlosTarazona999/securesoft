<header class="app-header"><a class="app-header__logo" href="inicio"><img src="vista/images/logo_IBLABORA.png" width="180" class="d-inline-block align-top mt-2" alt="Logo"></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="inicio" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
          <?php if ($_SESSION['rol'] == 1) { ?>
            <li><a class="dropdown-item" href="datosPostulante"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
          <?php }else { ?>
            <li><a class="dropdown-item" href="datosempresa"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
          <?php } ?>
            <li><a class="dropdown-item" href="configuracion"><i class="fa fa-cog fa-lg"></i> Configuracion</a></li>
            <li><a class="dropdown-item" href="salir"><i class="fa fa-sign-out fa-lg"></i> Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </header>