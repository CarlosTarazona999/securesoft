
<div class="container-fluid p-0 mb-5 ">
    
    <div class="posicion_carrusel">
        <div class=" ">

            <div class="container col-lg-12 text-center">
                <h1 style="color:#013f62; text-transform:uppercase;">LO QUE TE OFRECEMOS<!--LE AGREGUÉ EL ESTILO RETIRÉ text-muted-->
                    <?php echo $_SESSION['nombre'] ?></h1>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide mt-3 mb-5 jeje" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div id="mi-div" class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100 img_carrusel_inicio" src="vista/images/7.jpg" alt="First slide">
                        <div class="carousel-caption d-md-block"><!--RETIRÉ EL D-NONE -->
                            <h5>CONSIGUE LO QUE ESTAS BUSCANDO </h5>
                            <p>IBLABORA</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 img_carrusel_inicio" src="vista/images/PWC.jpg" alt="Second slide">
                        <div class="carousel-caption d-md-block "><!--RETIRÉ EL D-NONE -->
                            <h5>TE AYUDAMOS A QUE LAS COSAS SEAN MAS FACILES</h5>
                            <p>IBLABORA</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 img_carrusel_inicio" src="vista/images/KONECTA.jpg" alt="Third slide">
                        <div class="carousel-caption d-md-block"><!--RETIRÉ EL D-NONE -->
                            <h5>EN LA UNION ESTA LA FUERZA</h5>
                            <p>IBLABORA</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
        </div>



            <?php
            date_default_timezone_set("America/Lima");

            if ($_SESSION['plan'] == "p90") {

                $fechaSesion = $_SESSION['fecha_compra'];
                $nuevafecha = strtotime('+90 days', strtotime($fechaSesion));
                $fechaExpiracion = date('Y-m-d H:i:s', $nuevafecha);
                $fechaActual = date('Y-m-d H:i:s');

               echo ("<p><strong>Fecha expiracion:</strong> <br>" . $fechaExpiracion ."</p>");

                if ($fechaExpiracion >= $fechaActual) {
                   
                } else {
                   
                    $respuesta = ModeloPlan::UpdatePlanes("b", $_SESSION['idusuario'], $fechaActual);

                    if ($respuesta == "ok") {
                        echo '<script>
                                document.addEventListener("DOMContentLoaded",() => {
                                    Swal.fire(
                                      "Plan Premium 90 dias ha expirado" 
                                    )
                                })
                            </script>';
                        $_SESSION['plan'] = "b";
                        $_SESSION['fecha_compra'] = $fechaActual;
                    } else {

                        echo '<script>
                                document.addEventListener("DOMContentLoaded",() => {
                                    Swal.fire({
                                        icon: "error",
                                        text: "Ocurrio un error"
                                    })
                                })
                            </script>';
                    }
                }
            }
            if ($_SESSION['plan'] == "p30") {
                $fechaSesion = $_SESSION['fecha_compra'];
                $nuevafecha = strtotime('+30 days', strtotime($fechaSesion));
                $fechaExpiracion = date('Y-m-d H:i:s', $nuevafecha);
                $fechaActual = date('Y-m-d H:i:s');

                 echo ("<p><strong>Fecha expiracion:</strong> <br>" . $fechaExpiracion ."</p>");
                if ($fechaExpiracion >= $fechaActual) {
                   
                } else {
                   
                    $respuesta = ModeloPlan::UpdatePlanes("b", $_SESSION['idusuario'], $fechaActual);

                    if ($respuesta == "ok") {
                        echo '<script>
                                document.addEventListener("DOMContentLoaded",() => {
                                    Swal.fire(
                                        "Plan Premium 30 dias ha expirado" 
                                    )
                                })
                            </script>';
                        $_SESSION['plan'] = "b";
                        $_SESSION['fecha_compra'] = $fechaActual;
                    } else {

                        echo '<script>
                                document.addEventListener("DOMContentLoaded",() => {
                                    Swal.fire({
                                        icon: "error",
                                        text: "Ocurrio un error"
                                    })
                                })
                            </script>';
                    }
                }
            }
            if ($_SESSION['plan'] == "s90") {
                $fechaSesion = $_SESSION['fecha_compra'];
                $nuevafecha = strtotime('+90 days', strtotime($fechaSesion));
                $fechaExpiracion = date('Y-m-d H:i:s', $nuevafecha);
                $fechaActual = date('Y-m-d H:i:s');

                  echo ("<p><strong>Fecha expiracion:</strong> <br>" . $fechaExpiracion ."</p>");
                if ($fechaExpiracion >= $fechaActual) {
                    
                } else {
                   
                    $respuesta = ModeloPlan::UpdatePlanes("b", $_SESSION['idusuario'], $fechaActual);

                    if ($respuesta == "ok") {
                        echo '<script>
                                document.addEventListener("DOMContentLoaded",() => {
                                    Swal.fire(
                                        "Plan Standard 90 dias ha expirado" 
                                    )
                                })
                            </script>';
                        $_SESSION['plan'] = "b";
                        $_SESSION['fecha_compra'] = $fechaActual;
                    } else {

                        echo '<script>
                                document.addEventListener("DOMContentLoaded",() => {
                                    Swal.fire({
                                        icon: "error",
                                        text: "Ocurrio un error"
                                    })
                                })
                            </script>';
                    }
                }
            }
            if ($_SESSION['plan'] == "s30") {
                $fechaSesion = $_SESSION['fecha_compra'];
                $nuevafecha = strtotime('+30 days', strtotime($fechaSesion));
                $fechaExpiracion = date('Y-m-d H:i:s', $nuevafecha);
                $fechaActual = date('Y-m-d H:i:s');

                echo ("<p><strong>Fecha expiracion:</strong> <br>" . $fechaExpiracion ."</p>");
                if ($fechaExpiracion >= $fechaActual) {
                   
                } else {
                   
                    $respuesta = ModeloPlan::UpdatePlanes("b", $_SESSION['idusuario'], $fechaActual);

                    if ($respuesta == "ok") {
                        echo '<script>
                                document.addEventListener("DOMContentLoaded",() => {
                                    Swal.fire(
                                        "Plan Standard 30 dias ha expirado" 
                                    )
                                })
                            </script>';
                        $_SESSION['plan'] = "b";
                        $_SESSION['fecha_compra'] = $fechaActual;
                    } else {

                        echo '<script>
                                document.addEventListener("DOMContentLoaded",() => {
                                    Swal.fire({
                                        icon: "error",
                                        text: "Ocurrio un error"
                                    })
                                })
                            </script>';
                    }
                }
            }

            ?>
        </div>