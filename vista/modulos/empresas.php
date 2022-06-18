<?php

if (isset($_POST['nombre_empresa']) && $_POST['nombre_empresa'] != null) {
    $nombre_empresa = $_POST['nombre_empresa'];
} else {
    $nombre_empresa = null;
}
?>

<!-- BANNER -->
<div class="container-fluid p-0">
    <form class="banner-empresas" method="POST" action="empresas">
        <div class="container">
            <div class="row text-center">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h1 class="text-center">Empresas que trabajan con nosotros</h1>
                    <div class="input-group mt-5">
                        <input type="search" name="nombre_empresa" class="form-control rounded mr-1" placeholder="Ingresa el Nombre de la Empresa" aria-label="Search" aria-describedby="search-addon" />
                        <button type="submit" class="btn" style="color: #fff; border-color: #9a2442; background: #9a2442; margin-left:-3px;"><i class="fa fa-search" aria-hidden="true"></i>
                            Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>



<!-- FIN DEL BANNER -->
<?php if ($nombre_empresa == null) : ?>
    <section class="sub-menu py-4 " id="empleos">
        <div class="container">
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <br>
                    <!-- Grupo1 -->
                    <div class="row ">
                        <?php
                        $item = "idempresa";
                        if (isset($_SESSION['idusuario'])) {
                            $valor = $_SESSION['idusuario'];
                        } else {
                            $valor = null;
                        }

                        $empresas = controladorDatosEmpresa::ctrDatosEmpresa();
                        foreach ($empresas as $value) : ?>


                            <div class="col-md-6 mb-3 grupos">
                                <!-- <p class="text-center">PWC</p> -->

                                <a href="javascript:detalleEmpresas(<?php echo $value['idempresa'] ?>)" class="text-white" style="text-decoration: none;">
                                    <?php if (isset($value['logo']) && file_exists($value['logo'])) : ?>
                                        <div class="clase_img">
                                            <img src='<?php echo $value['logo'] ?>' class="img-fluid img-responsive rounded" alt="" height="100%">
                                        </div>
                                    <?php else : ?>
                                        <div class="clase_img">
                                            <img src='vista/images/foto-por-defecto.png' class="img-responsive">
                                        </div>
                                    <?php endif; ?>

                                    <div class=" row">

                                        <div class="col-sm-12 text-center texto d-flex flex-column justify-content-center">
                                            <br><br>
                                            <h4>
                                                <?php
                                                echo $value['nom_empresa']
                                                ?>
                                            </h4>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Fin Grupo1 -->
                </div>
            </div>
            <!-- Fin Grupo1 -->
        </div>
    </section>

<?php else : ?>
    <section class="sub-menu py-4 " id="empleos">
        <div class="container">
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <br>
                    <!-- Grupo1 -->
                    <div class="row ">
                        <?php
                        $item = "idempresa";
                        if (isset($_SESSION['idusuario'])) {
                            $valor = $_SESSION['idusuario'];
                        } else {
                            $valor = null;
                        }

                        $empresas = controladorDatosEmpresa::buscar_Empresa($nombre_empresa);
                        foreach ($empresas as $value) : ?>


                            <div class="col-md-6 mb-3 grupos">
                                <!-- <p class="text-center">PWC</p> -->

                                <a href="javascript:detalleEmpresas(<?php echo $value['idempresa'] ?>)" class="text-white" style="text-decoration: none;">
                                    <?php if (isset($value['logo']) && file_exists($value['logo'])) : ?>
                                        <div class="clase_img">
                                            <img src='<?php echo $value['logo'] ?>' class="img-fluid img-responsive rounded" alt="">
                                        </div>
                                    <?php else : ?>
                                        <div class="clase_img">
                                            <img src='vista/images/foto-por-defecto.png' class="img-responsive">
                                        </div>
                                    <?php endif; ?>

                                    <div class=" row">

                                        <div class="col-sm-12 text-center texto d-flex flex-column justify-content-center">
                                            <br><br>
                                            <h4>
                                                <?php
                                                echo $value['nom_empresa']
                                                ?>
                                            </h4>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Fin Grupo1 -->
                </div>
            </div>
            <!-- Fin Grupo1 -->
        </div>
    </section>
<?php endif; ?>
<!---------VER MODAL EMPRESAS---------->

<div class="container" id="detalleempresas">
    <!--Detalle Empresas-->

    <br>
    <div class="card w-100 shadow bg-white rounded">
        <div class="card-body">
            <div class="col-lg-1">
                <button class="btn btn-danger" onclick="regresarEmpresas()">
                    <h4><i class="fas fa-arrow-circle-left text-white"></i></h4>
                </button>
            </div>

            <hr>
            <h3>Descripción de empresa:</h3>
            <div class="descripcion_detalleE">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="w-100">
                                <img id="DElogo" src="" alt="asdasdasd" class="img-fluid">
                            </div>
                            <div class="w-100 mt-3">
                                <ul class="list-unstyled">
                                    <li class="pt-2 fs-3">Ruc: <span id="DEruc"></span></li>
                                    <li class="pt-2 fs-3">Rubro: <span id="DErubro"></span></li>
                                    <li class="pt-2 fs-3">Razon Social: <span id="DErazon_social"></span></li>
                                    <li class="pt-2 fs-3">Industria: <span id="DEindustria"></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <h1 class="text-center" id="DEnom_empresa"></h1>
                            <div class="w-100 mt-3">
                                <h4 class="border-secondary border-bottom pb-2">Misión y Visión</h4>
                                <p id="DEmision_vision"></p>
                            </div>
                            <div class="w-100 mt-3">
                                <h4 class="border-secondary border-bottom pb-2">Beneficios</h4>
                                <p id="DEbeneficios"></p>
                            </div>
                            <div class="w-100 mt-3">
                                <h4 class="border-secondary border-bottom pb-2">Ubicación</h4>
                                <div class="row">
                                    <div class="col-6">
                                        <h5>Departamento</h5>
                                        <p id="DEdepartamento"></p>
                                    </div>
                                    <div class="col-6">
                                        <h5>Provincia</h5>
                                        <p id="DEprovincia"></p>
                                    </div>
                                    <div class="col-6">
                                        <h5>Distrito</h5>
                                        <p id="DEdistrito"></p>
                                    </div>
                                    <div class="col-6">
                                        <h5>Dirección</h5>
                                        <p id="DEdireccion"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--FIN Detalle Empleos-->

</div>