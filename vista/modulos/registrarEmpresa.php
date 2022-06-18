<section class="container empresa-width mt-3" id="registrarEmpresa">
    <div class="d-flex justify-content-center text-muted">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8">
            <div class="container form-width">
                <div class="card-header login-header" style="background-color: #013f62;">
                    <h4 class="text-white text-center titulo-empresa">REGISTRA EMPRESA </h4>
                </div>
                <div class="pt-4 empresa-form">
                    <form method="post" class="needs-validation" novalidate>
                       
                        <div class="container pb-3 form-empresa">
                            <div>
                                <h3 class="text-center subtitulo-empresa pt-1 pb-1" style="color: gray;">Datos del usuario:</h3>
                            </div>
                            <div class="text-center pt-2"><i class="fas fa-user text-muted" style="font-size:50px;"></i></div>
                            <div class="form-group p-3">
                                <label class=" text-muted">Nombre</label>
                                <input type="text" name="nombre" class="form-control " id="" placeholder="Ingresa nombre" pattern="[A-Za-záéíóúÁÉÍÓÚ ]+" title="Este Campo solo debe llevar Letras">
                            </div>
                            <div class="form-group p-3">
                                <label>Apellido</label>
                                <input type="text" required name="apellido" class="form-control " id="" placeholder="Ingresa apellido" pattern="[A-Za-záéíóúÁÉÍÓÚ ]+" title="Este Campo solo debe llevar Letras">
                            </div>
                            <div class="form-group p-3">
                                <label>Genero</label>
                                <select required name="CboGenero" required class="selectpicker show-tick form-control" data-live-search="true" style="border: none; border-bottom: #013f62 2px solid;">
                                    <option value="">Seleccionar...</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>
                            </div>
                            <div class="form-group  p-3">
                                <label>Telefono</label>
                                <input type="text" required name="telefono" class="form-control " placeholder="Ingresa telefono" minlength="8" maxlength="10" pattern="[0-9]+" required title="Este Campo solo debe llevar Numeros y debe tener entre 8 y 10 digitos">
                            </div>
                            <div class="form-group p-3">
                                <label">Celular</label>
                                    <input type="text" required name="celular" class="form-control " placeholder="Ingresa celular" minlength="8" maxlength="10" pattern="[0-9]+" required title="Este Campo solo debe llevar Numeros y debe tener entre 8 y 10 digitos">
                                    <input name="rol" type="text" class="form-control" hidden value="2">
                            </div>
                            <div class="form-group p-3">
                                <label>DNI/carnet extrangeria/ RUC</label>
                                <select name="CboID" id="CboID" class="selectpicker show-tick form-control" data-live-search="true" style="border: none; border-bottom: #013f62 2px solid;">
                                    <option value="">Seleccionar...</option>
                                    <option value="1">DNI</option>
                                    <option value="3">carnet extrangeria</option>
                                    <option value="2">RUC</option>
                                </select>
                            </div>
                            <div class="form-group p-3">
                                <label">Numero de Carnet</label>
                                    <div class="d-flex">
                                        <input type="text" name="DNI" id="carnet" class="form-control " id="carnet" minlength="8" maxlength="11" placeholder="Ingresa DNI" disabled pattern="[0-9]+">
                                        <input type="hidden" name="valor" id="valor" value="0">
                                    </div>
                            </div>
                            <!--<div class="form-grou p-3">
                                <label">Nacionalidad</label>
                                <input name="nacionalidad" class="form-control " placeholder="Ingresa departamento">
                            </div>-->
                            <div class="form-group p-3">
                                <label>Fecha de Nacimiento</label>
                                <? $date_past = strtotime($date_now . "- 6570 days");
                                $date_past = date("Y-m-d", $date_past);
                                $date_future = strtotime($date_now . "+ 6 days");
                                $date_future = date("Y-m-d", $date_future); ?>
                                <input type="date" name="fechanac" class="form-control" name="date" max="<?php echo $date_past ?>">
                            </div>
                            <div class="form-group p-3">
                                <label>Correo</label>
                                <input type="email" name="email" class="form-control font-emp" placeholder="INGRESE CORREO ELECTRONICO">
                            </div>
                            <div class="form-group p-3">
                                <label>Contraseña</label>
                                <input type="password" name="password" type="password" class="form-control font-emp" placeholder="INGRESE CONTRASEÑA">
                            </div>

                            <div>
                                <h3 class="text-center subtitulo-empresa pt-1 pb-1" style="color: gray;">Datos de la
                                    empresa:</h3>
                            </div>
                            <div class="form-group p-3">
                                <input name="empresa" type="text" class="form-control font-emp" placeholder="INGRESE NOMBRE DE LA EMPRESA" pattern="[A-Za-záéíóúÁÉÍÓÚ.-_/ ]+" title="Este Campo solo debe llevar Letras">
                            </div>
                            <div class="form-group p-3">
                                <input name="ruc" id="rucEmpresa" type="text" class="form-control font-emp" placeholder="INGRESE RUC DE LA EMPRESA" minlength="11" maxlength="11" pattern="[0-9 ]+" title="El Ruc debe llevar solo 11 digitos y que sean Numeros">
                            </div>
                            <div class="form-group p-3">
                                <label>Rubro</label>
                                <select name="rubro" id="" class="selectpicker show-tick form-control" data-live-search="true" style="border: none; border-bottom: #013f62 2px solid;">
                                <?php
                        $datos = controladorDatosEmpresa::mdlLlenarRubro();
                        foreach ($datos as $key => $value): 
                        ?>
                                <option value="<?php echo $value["idrubro"] ?>"><?php echo $value["tipo_rubro"] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group align-items-center">
                                <div class="g-recaptcha" data-sitekey="6Lcx2cAaAAAAAGXpo2-YSJg_Js0BDmvTlSweWu-f"></div>
                                <input class="form-control d-none" data-recaptcha="true" data-error="Please complete the Captcha">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class=" login-footer text-center" style="background-color: #013f62;">
                            <button type="submit" class="btn btn-primary btn-lg boton-empresa" style="background-color:#9a2442;">Registrar</button>
                        </div>
                        <?php
                        $crearAlumno = new ControladorLogin();
                        $crearAlumno->ctrCrearEmpresa();
                        // $crearAlumno->ctrCrearDatos();

                        ?>

                    </form>
                </div>

            </div>
        </div>
</section>