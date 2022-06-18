<!--banner-->
<div class="caja-main-wrapper">
    <div class="hero" style="background-image:url('vista/images/01.jpg');">
        <h1 class="letra1">Tu Futuro Empieza Aqu&iacute</h1>
        <p class="letra2">Encuentre su próximo trabajo o carrera en IBLabora</p>
        <form action="empleosFiltro" method="POST">
            <div class="seccion1-main-search-form-wrapper">

                <div class="form-holder">
                    <div class="row gap-0">
                        <div class="col-xss-6 col-xs-6 col-sm-6">
                            <select class="categorias-form-control" name="filtroEspecialidad" style="color: #FFF;" required>
                                <option>-Selecciona categoria-</option>
                                <?php
                                $filtro = EmpleosControlador::ListaAreaEstudio();
                                foreach ($filtro as $key => $value) :
                                ?>
                                    <option style="color: #000;">
                                        <?php echo $value['tipo_area_estudio']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-xss-6 col-xs-6 col-sm-6">
                            <select class="categorias-form-control" name="FiltroDistrito" required style="color: #FFF;">
                                <option>-Selecciona ciudad-</option>
                                <?php
                                $filtro = EmpleosControlador::ListarFiltros('distrito', null, true);
                                foreach ($filtro as $key => $value) :
                                ?>
                                    <option style="color: #000;">
                                        <?php echo $value['distrito']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row btn__inicio__buscar" style="text-align: center; align-items: center; justify-content: center; display: flex; margin-top: 15px;">
                <div class="col-6">
                    <button type="submit" class="text-white botonbuscar" value="Search">Buscar empleo
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>
<!--finn-->
<!--secion2-->
<section class="container1">
    <div class="contenido-prosesos">
        <div class="group">
            <div class="row">
                <div class="col-sm-4">
                    <div class="proseso-item">
                        <div class="icono">
                            <i class="fas fa-search hola3"></i>
                        </div>
                        <div class="contenido-item">
                            <h5 class="cont1">01 / Buscar empleos</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="proseso-item">
                        <div class="icono">
                            <i class="fas fa-pencil-alt hola3 "></i>
                        </div>
                        <div class="contenido-item">
                            <h5 class="cont1">02 / Postula</h5>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="proseso-item">
                        <div class="icono">
                            <i class="fas fa-calendar-alt hola3"></i>
                        </div>
                        <div class="contenido-item">
                            <h5 class="cont1">03 / Trabaja</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>
<section>
    <h2 class="text-center">Empresas Aleatorias<h2>
</section>
<br>
<br>
<!--Inicio Carrusel de imagenes -->
<div class="container">
    <main class="contenido-principal">

    </main>
    <div class="carousel">
        <div class="carousel__contenedor">
            <button arial-label="Anterior" class="carousel__anterior">
                <i class="fas fa-chevron-left"></i>
            </button>

            <div class="carousel__lista">
                <div class="carousel__elemento">
                    <img class="box_img" src="vista/images/ADIDAS.jpg" alt="img1">
                </div>
                <div class="carousel__elemento ">
                    <img class="box_img" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="img2">
                </div>
                <div class="carousel__elemento ">
                    <img class="box_img" src="vista/images/ADIDAS.jpg" alt="img3">
                </div>
                <div class="carousel__elemento ">
                    <img class="box_img" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="img4">
                </div>
                <div class="carousel__elemento ">
                    <img class="box_img" src="vista/images/ADIDAS.jpg" alt="img5">
                </div>
                <div class="carousel__elemento ">
                    <img class="box_img" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="img6">
                </div>
                <div class="carousel__elemento ">
                    <img class="box_img" src="vista/images/ADIDAS.jpg" alt="img7">
                </div>
                <div class="carousel__elemento ">
                    <img class="box_img" src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="img8">
                </div>
            </div>
            <button arial-label="Siguiente" class="carousel__siguiente">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </div>
</div>
<!--Fin Carrusel de imagenes -->
<br>