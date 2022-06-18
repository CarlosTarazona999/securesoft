<div class="mooS" style="background-image:url('vista/images/cooperacion.jpg'); height: 100vh; background-size:cover">
    <section class="pt-5" id="login">

        <div class="wrapper">
            <div class="container" style="height: 100%;">

                <div class="row contenedor-login">
                    <div class="lis" >

                        <div class="mt-3 pt-2 text-center text-white mb-5">
                            <h4>Ingresa a tu cuenta </h4>
                        </div>
                        <form action="" method="POST">

                            <div class="container form-append ">

                                <div class="input-group mb-4">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="email"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input class="form-control" type="email" name="ingcorreo" placeholder="Correo Electrónico" aria-label="Correo Electrónico" aria-describedby="email">
                                </div>

                                <div class="input-group mb-4">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="ingcontraseña"><i class="fas fa-unlock-alt"></i></span>
                                    </div>
                                    <input class="form-control" type="password" name="ingcontraseña" placeholder="Contraseña" aria-label="Recipient's password" aria-describedby="ingcontraseña">
                                </div>

                            </div>
                            <div class="form-group login-footer pt-2 text-center mb-2">
                                <button type="submit" class="btn btn-primary boton-login" style="background-color:#9a2442;">Iniciar Sesion</button>
                            </div>
                            <div class="w-100 text-center mb-2">
                                <a href="recuperarcontrasena" class="text-white">¿Olvidaste tu Cuenta?</a>
                            </div>
                            <div class="w-100 text-center mb-5">
                                <a href="recuperarCuenta" class="text-white">¿Quieres reactivar tu cuenta?</a>
                            </div>

                            <?php

                            $login = new ControladorLogin();
                            $login->ctrLogin();
                            ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>