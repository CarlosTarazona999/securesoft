<?php
if (isset($_POST['filtroEspecialidad']) && $_POST['filtroEspecialidad'] != null && $_POST['filtroEspecialidad'] != '-Selecciona categoria-') {
    $especialidad = $_POST['filtroEspecialidad'];
} else {
    $especialidad = null;
}

if (isset($_POST['filtroContrato']) && $_POST['filtroContrato'] != null) {
    $contrato = $_POST['filtroContrato'];
} else {
    $contrato = null;
}

if (isset($_POST['filtroRemoto']) && $_POST['filtroRemoto'] != null) {
    $trabajo_remoto = $_POST['filtroRemoto'];
} else {
    $trabajo_remoto = null;
}

if (isset($_POST['filtroPrecio']) && $_POST['filtroPrecio'] != null) {
    $precio = $_POST['filtroPrecio'];
} else {
    $precio = null;
}

if (isset($_POST['filtroDepartamento']) && $_POST['filtroDepartamento'] != null) {
    $departamento = $_POST['filtroDepartamento'];
} else {
    $departamento = null;
}

if (isset($_POST['filtroAños']) && $_POST['filtroAños'] != null) {
    $experiencia = $_POST['filtroAños'];
} else {
    $experiencia = null;
}

if (isset($_POST['buscarTrabajo']) && $_POST['buscarTrabajo'] != null) {
    $name_trabajo = $_POST['buscarTrabajo'];
} else {
    $name_trabajo = null;
}

if (isset($_POST['FiltroDistrito']) && $_POST['FiltroDistrito'] != null && $_POST['FiltroDistrito'] != '-Selecciona ciudad-') {
    $distrito = $_POST['FiltroDistrito'];
} else {
    $distrito = null;
}
?>


<!-------- BANNER --------->
<section class="panel-trabajos">
    <form class="trabajos py-sm-5 py-4" action="empleosFiltro" method="POST">
        <div class="container py-lg-3 py-2">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="text-white">Lista de Trabajos</h1>
                    <div class="input-group mb-5">
                        <input type="search" name="buscarTrabajo" class="form-control" placeholder="Ingresa el Nombre del Trabajo" aria-label="Ingresa el Nombre del Trabajo">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit" id="boton-busqueda">
                                <i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
<!--------FIN DEL BANNER --------->

<section class="sub-menu py-4 " id="empleos">

    <div class="container">
        <div class="row">
            <form class="contenido col-lg-3" class="myform" action="empleosFiltro" method="POST">

                <?php if ($especialidad != null || $contrato != null || $trabajo_remoto != null || $precio != null || $departamento != null || $experiencia != null || $name_trabajo != null || $distrito != null) :
                ?>
                    <div class="filtro pb-4">
                        <h4><i class="fa fa-search pl-2"></i> Filtros Aplicados</h4>
                        <div class="col-12 border" style="height:100%;background:#fff;">
                            <?php if (isset($especialidad)) : ?>
                                <strong>-Especialidad:</strong>
                                (<?php echo $especialidad; ?>)<br>
                            <?php endif; ?>

                            <?php if (isset($contrato)) : ?>
                                <strong>-Contrato:</strong>
                                (<?php echo $contrato; ?>)<br>
                            <?php endif; ?>

                            <?php if (isset($trabajo_remoto)) : ?>
                                <strong>-Trabajo Remoto:</strong>
                                (<?php echo $trabajo_remoto; ?>)<br>
                            <?php endif; ?>

                            <?php if (isset($precio)) : ?>
                                <strong>-Precio:</strong>
                                (<?php echo $precio; ?>)<br>
                            <?php endif; ?>

                            <?php if (isset($departamento)) : ?>
                                <strong>-Departamento:</strong>
                                (<?php echo $departamento; ?>)<br>
                            <?php endif; ?>

                            <?php if (isset($experiencia)) : ?>
                                <strong>-Experiencia:</strong>
                                (<?php echo $experiencia; ?>)<br>
                            <?php endif; ?>

                            <?php if (isset($name_trabajo)) : ?>
                                <strong>-Nombre del trabajo:</strong>
                                (<?php echo $name_trabajo; ?>)<br>
                            <?php endif; ?>

                            <?php if (isset($distrito)) : ?>
                                <strong>-Ciudad:</strong>
                                (<?php echo $distrito; ?>)<br>
                            <?php endif; ?>

                        </div>
                        <a href="empleos" style="color:red;font-size:15px;"><i class="fa fa-trash pl-2"></i> Eliminar Filtro</a>
                    </div>
                <?php endif; ?>

                <!----Boton filtro--->
                <div class="container pt-2" id="btn_filtro" style="margin-bottom: 15px;">
                    <button type="submit" id="btn_filtr" class="btn btn-secondary w-100 p-2 font-weight-bold" style="display: block;">
                        Aplicar Filtro
                    </button>
                </div>
                <!------->


                <div class="marco">
                    <a class="barra-menu btn col-lg text-white " role="button" data-toggle="collapse" href="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
                        <i class="far fa-thumbtack pr-3"></i>
                        Especialidad
                        <i class="far fa-plus-circle pl-4"></i>
                    </a>
                    <div class="collapse show" id="collapseExample2">
                        <div class="card card-body">
                            <?php
                            $filtro = EmpleosControlador::ListarFiltros('tipo_area_estudio', null, true);
                            foreach ($filtro as $key => $value) :
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filtroEspecialidad" id="radioEspecialidad" value="<?php echo $value['tipo_area_estudio']; ?>">

                                    <label class="form-check-label" for=" <?php echo $value['tipo_area_estudio']; ?>">
                                        <?php echo $value['tipo_area_estudio']; ?>
                                    </label>

                                    <span class="float-right text-muted">
                                        (<?= $value['contador']; ?>)
                                    </span>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="marco">
                    <a class="barra-menu btn col-lg text-white " role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <div class="cont-icon">
                            <i class="far fa-thumbtack pr-3"></i>Contrato<i class="far fa-plus-circle pl-4"></i>
                        </div>

                    </a>
                    <div class="collapse show" id="collapseExample">
                        <div class="card card-body">
                            <?php
                            $filtro = EmpleosControlador::ListarFiltros('contrato', null, true);
                            foreach ($filtro as $key => $value) :
                            ?>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filtroContrato" id="radioContrato" value="<?php echo $value['contrato']; ?>">

                                    <label class="form-check-label" for=" <?php echo $value['contrato']; ?>">
                                        <?php echo $value['contrato']; ?>
                                    </label>

                                    <span class="float-right text-muted">
                                        (<?= $value['contador']; ?>)
                                    </span>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="marco">
                    <a class="barra-menu btn col-lg text-white collapsed" role="button" data-toggle="collapse" href="#collapseExample3" aria-expanded="false" aria-controls="collapseExample">
                        <i class="far fa-thumbtack pr-3"></i>Trabajo Remoto<i class="far fa-plus-circle pl-4"></i>
                    </a>
                    <div class="collapse " id="collapseExample3">
                        <div class="card card-body">
                            <?php
                            $filtro = EmpleosControlador::ListarFiltros('trb_remoto', null, true);
                            foreach ($filtro as $key => $value) :
                            ?>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filtroRemoto" id="radioRemoto" value="<?php echo $value['trb_remoto']; ?>">

                                    <label class="form-check-label" for=" <?php echo $value['trb_remoto']; ?>">
                                        <?php echo $value['trb_remoto']; ?>
                                    </label>

                                    <span class="float-right text-muted">
                                        (<?= $value['contador']; ?>)
                                    </span>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="marco">
                    <a class="barra-menu btn col-lg text-white collapsed" role="button" data-toggle="collapse" href="#collapseExample32" aria-expanded="false" aria-controls="collapseExample">
                        <i class="far fa-thumbtack pr-3"></i>Salario<i class="far fa-plus-circle pl-4"></i>
                    </a>
                    <div class="collapse " id="collapseExample32">
                        <div class="card card-body">
                            <?php
                            $menor = EmpleosControlador::ListarFiltros('salario', '<', false);
                            foreach ($menor as $key => $value) :
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filtroPrecio" id="radioMenos900" value="Menos900">

                                    <label class="form-check-label" for=" Menos de S/.900.00">
                                        Menos de S/.900.00
                                    </label>

                                    <span class="float-right text-muted">
                                        (<?= $value['sumacontador']; ?>)
                                    </span>
                                </div>

                            <?php endforeach; ?>
                            <?php
                            $mayor = EmpleosControlador::ListarFiltros('salario', '>', false);
                            foreach ($mayor as $key => $value) :
                            ?>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filtroPrecio" id="radioMas900" value="Mas900">

                                    <label class="form-check-label" for=" Más de S/.900.00">
                                        Más de S/.900.00
                                    </label>

                                    <span class="float-right text-muted">
                                        (<?= $value['sumacontador']; ?>)
                                    </span>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="marco">
                    <a class="barra-menu btn col-lg text-white collapsed" role="button" data-toggle="collapse" href="#collapseExample4" aria-expanded="false" aria-controls="collapseExample">
                        <i class="far fa-thumbtack pr-3"></i>Departamento<i class="far fa-plus-circle pl-4"></i>
                    </a>
                    <div class="collapse " id="collapseExample4">
                        <div class="card card-body">
                            <?php
                            $filtro = EmpleosControlador::ListarFiltros('departamento', null, true);
                            foreach ($filtro as $key => $value) :
                            ?>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filtroDepartamento" id="radioDepartamento" value="<?php echo $value['departamento']; ?>">

                                    <label class="form-check-label" for=" <?php echo $value['departamento']; ?>">
                                        <?php echo $value['departamento']; ?>
                                    </label>

                                    <span class="float-right text-muted">
                                        (<?= $value['contador']; ?>)
                                    </span>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="marco">
                    <a class="barra-menu btn col-lg text-white collapsed" role="button" data-toggle="collapse" href="#collapseExample5" aria-expanded="false" aria-controls="collapseExample">
                        <i class="far fa-thumbtack pr-3"></i>Años de Experiencia<i class="far fa-plus-circle pl-4"></i>
                    </a>
                    <div class="collapse " id="collapseExample5">

                        <div class="card card-body">
                            <?php
                            $res = EmpleosControlador::ListarFiltros('experiencia', '1año', false);
                            foreach ($res as $key => $value) :
                            ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filtroAños" id="radio1año" value="1año">

                                    <label class="form-check-label" for="radio1año">
                                        1 año
                                    </label>

                                    <span class="float-right text-muted">
                                        (<?= $value['sumacontador']; ?>)
                                    </span>
                                </div>

                            <?php endforeach; ?>
                            <?php
                            $res = EmpleosControlador::ListarFiltros('experiencia', '2años', false);
                            foreach ($res as $key => $value) :
                            ?>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filtroAños" id="radio2año" value="2años">

                                    <label class="form-check-label" for="radio2año">
                                        2 años
                                    </label>

                                    <span class="float-right text-muted">
                                        (<?= $value['sumacontador']; ?>)
                                    </span>
                                </div>

                            <?php endforeach; ?>
                            <?php
                            $res = EmpleosControlador::ListarFiltros('experiencia', '3-4años', false);
                            foreach ($res as $key => $value) :
                            ?>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filtroAños" id="radio3-4año" value="3-4años">

                                    <label class="form-check-label" for="radio3-4año">
                                        3-4 años
                                    </label>

                                    <span class="float-right text-muted">
                                        (<?= $value['sumacontador']; ?>)
                                    </span>
                                </div>

                            <?php endforeach; ?>
                            <?php
                            $res = EmpleosControlador::ListarFiltros('experiencia', '5-10años', false);
                            foreach ($res as $key => $value) :
                            ?>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="filtroAños" id="radio5-10años" value="5-10años">

                                    <label class="form-check-label" for="radio5-10años">
                                        5-10 años
                                    </label>

                                    <span class="float-right text-muted">
                                        (<?= $value['sumacontador']; ?>)
                                    </span>
                                </div>

                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </form>

            <div class="contenido2 col-lg-9 ">
                <div class="row">
                    <?php 
                     $item = null;
                     $valor = null;
                     $publicaciones = EmpleosControlador::FiltrarPublicaciones($especialidad, $contrato, $trabajo_remoto, $precio, $departamento, $experiencia, $name_trabajo, $distrito);
                    
                    if (count($publicaciones) > 0): ?>
                        <?php foreach ($publicaciones as $value) { ?>
                            <div class="col-lg-6 col-md-4">
                                <div class="caja-trabajo">
                                    <div class="caja-top">
                                        <div class="caja-imagen">
                                            <img src="vista/images/pruebaEmpleo.jpg" class="img-responsive">
                                        </div>
                                        <div class="caja-dato">
                                            <span title="Publicado">
                                                <i class="fas fa-calendar-alt"></i>
                                                <?php if ($value['fecha'] != null) :
                                                    echo $value['fecha']; ?>
                                                    /
                                                <?php else : ?>
                                                <?php endif; ?>
                                                <?php if ($value['hora'] != null) : ?>
                                                    /
                                                    <?php echo $value['hora']; ?>

                                                <?php else : ?>
                                                <?php endif; ?>

                                            </span>
                                            <span title="Ubicacion">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php if ($value['departamento'] != null) :
                                                    echo $value['departamento']; ?>
                                                <?php else : ?>

                                                <?php endif; ?>
                                                <?php if ($value['provincia'] != null) : ?>
                                                    /
                                                    <?php echo  $value['provincia']; ?>

                                                <?php else : ?>

                                                <?php endif; ?>

                                                <?php if ($value['distrito'] != null) : ?>
                                                    /
                                                    <?php echo  $value['distrito']; ?>
                                                <?php else : ?>

                                                <?php endif; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="caja-detalles">
                                        <h3><a href="detalleEmpleo">
                                                <?php
                                                echo $value['puesto'];
                                                ?>
                                            </a>
                                        </h3>
                                        <p class="precio"><strong>$
                                                <?php
                                                echo $value['salario'];
                                                ?>
                                            </strong>
                                        </p>
                                        <p>Especialidad:
                                            <?php
                                            echo $value['tipo_area_estudio'];
                                            ?>
                                            </strong>
                                        </p>
                                    </div>

                                    <div class="caja-info">
                                        <button onclick="detalleEmpleo(<?php echo $value['id_publicaciones'] ?>)" class="seccion-btn btn btn-primary btn-block">Ver Detalles</button>
                                    </div>
                                </div>
                            </div>
                        <?php }; ?>

                    <?php else :
                        echo '<script>
                        document.addEventListener("DOMContentLoaded",() => {
                        Swal.fire({
                        icon: "error",
                        text: "No se encontro empleos con esta busqueda"
                        })
                        })
                    </script>'; ?>
                          <div class="container">
                            <h1>No se encontro empleos con esta busqueda</h1>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>

<!---------VER MODAL EMPLEO---------->

<div class="container" id="detalleempleoopen">
    <!--Detalle Empleos-->

    <br>
    <div class="card w-100 shadow bg-white rounded">
        <div class="card-body">
            <div class="col-lg-1"><button class="btn btn-danger" onclick="regresarEmpleos()">
                    <h4><i class="fas fa-arrow-circle-left text-white"></i></h4>
                </button></div>
            <form method="post">
                <input value="" type="hidden" name="detempleid" id="detempleid">
                <button type="submit" name="submitpos" class="btn btn-danger btn-outline btn_detalleEmpleo">Postular</button>
                <?php

                $enviar = new ControladorPublicar();
                $enviar->ctrPostular();
                ?>

            </form>
            <div class="body__detalleEmpleos">
                <div class="title__detalleE">
                    <h1></h1>
                </div>
                <i class="fas fa-server icono__detalleEmpleos" style="float: left"></i>
                <div class="subtittle_detalleEmpleos">
                    <h3 id="detemplepuesto" class="text-muted"></h3>


                </div>
                <hr>
                <div class="row text-center text-muted pt-3">
                    <div class="col-lg-4" style="border-right:rgb(182, 181, 181) 1px solid;">
                        <i class="fas fa-calendar-alt" id="i8"><span class="mr-2"></span>Fecha de Publicación:</i>
                        <h4 class="text-muted" id="detemplefecha"></h4>
                    </div>
                    <div class="col-lg-4" style="border-right:rgb(182, 181, 181) 1px solid;">
                        <i class="fas fa-calendar-alt " id="i5"><span class="mr-2"></span> Hora de Publicación:</i>
                        <h4 class="text-muted" id="detemplehora"></h4>
                    </div>
                    <div class="col-lg-4">
                        <i class="fas fa-calendar-alt" id="i8"><span class="mr-2"></span>Contrato:</i>
                        <h4 class="text-muted" id="detemplecontrato"></h4>
                    </div>

                </div>

                <hr>

                <div class="row text-center text-muted pt-3">
                    <div class="col-lg-4" style="border-right:rgb(182, 181, 181) 1px solid;">
                        <i class="fas fa-home" id="i5"><span class="mr-2"></span>Departamento:</i>
                        <h4 id="detempledepartamento"></h4>
                    </div>
                    <div class="col-lg-4" style="border-right:rgb(182, 181, 181) 1px solid;">
                        <i class="fas fa-home" id="i5"><span class="mr-2"></span>Provincia:</i>
                        <h4 id="detempleprovincia"></h4>
                    </div>
                    <div class="col-lg-4">
                        <i class="fas fa-home" id="i5"><span class="mr-2"></span>Distrito:</i>
                        <h4 id="detempledistrito"></h4>
                    </div>
                </div>

                <hr>
                <div class="row text-center text-muted pt-3">
                    <div class="col-lg-6" style="border-right:rgb(182, 181, 181) 1px solid;">
                        <i class="fas fa-home" id="i5"><span class="mr-2"></span>Dirección:</i>
                        <h4 id="detempledireccion"></h4>
                    </div>
                    <div class="col-lg-3" style="border-right:rgb(182, 181, 181) 1px solid;">
                        <i class="fas fa-home" id="i5"><span class="mr-2"></span>Trabajo remoto:</i>
                        <h4 id="detempleremoto"></h4>
                    </div>
                    <div class="col-lg-3 ">
                        <i class="fas fa-dollar-sign" id="i5"><span class="mr-2"></span>Sueldo:</i>
                        <h4 id="detemplesueldo"></h4>
                    </div>
                </div>

                <hr>
                <hr>

                <h3>Descripción del empleo:</h3>
                <div class="descripcion_detalleE">

                    <h4 id="detempledescripcion"></h4>
                    <h3>Especialidad :</h3>
                    <h4 id="detempleespecialidad"></h4>
                    <h3>Años de Experiencia :</h3>
                    <h4 id="detempleexperiencia"></h4>
                </div>
            </div>
        </div>
    </div>
    <!--FIN Detalle Empleos-->
</div>