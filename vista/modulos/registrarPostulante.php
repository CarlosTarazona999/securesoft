<section class="container mt-3" id="registrarPostulante">

    <div class="container mi-container text-muted">
        <div class="row justify-content-center">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xl-8 caja-login mx-3 px-0">
                <div class="login-header pt-2 text-center text-white">
                    <h4> REGISTRA POSTULANTE</h4>
                </div>
                <form method="post" class="needs-validation" >
                    <div class="container bor-input ">
                        <div class="text-center pt-2"><i class="fas fa-user text-muted" style="font-size:50px;"></i></div>
                        <div class="form-group p-3">
                            <label>Nombre</label>
                            <input name="nombre" required  class="form-control " placeholder="Ingresa nombre" pattern="[A-Za-záéíóúÁÉÍÓÚ ]+" title="Este Campo solo debe llevar Letras">
                        </div>
                        <div class="form-group p-3">
                            <label>Apellido</label>
                            <input name="apellido" required class="form-control "  placeholder="Ingresa apellido" pattern="[A-Za-záéíóúÁÉÍÓÚ ]+" title="Este Campo solo debe llevar Letras">
                        </div>
                        <div class="form-group p-3">
                            <label>Correo Electrónico</label>
                            <input name="email" required class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa tu correo electrónico">
                        </div>
                        <div class="form-group p-3">
                            <label>Género</label>
                            <select required name="CboGenero" required class="selectpicker show-tick form-control" data-live-search="true" style="border: none; border-bottom: #013f62 2px solid;">
                                <option value="">Seleccionar...</option>
                                <option value="1">Masculino</option>
                                <option value="2">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group p-3">
                            <label class="text-muted">Teléfono</label>
                            <input type="text" minlength="8" maxlength="10" name="telefono" class="form-control " placeholder="Ingresa telefono" pattern="[0-9]+" required title="Este Campo solo debe llevar Numeros y debe tener entre 8 y 10 digitos">
                        </div>
                        <div class="form-group p-3">
                            <label>Celular</label>
                            <input type="text" minlength="8" maxlength="10" name="celular" class="form-control " placeholder="Ingresa celular" pattern="[0-9]+" required title="Este Campo solo debe llevar Numeros y debe tener entre 8 y 10 digitos">
                        </div>
                        <div class="form-group p-3" hidden>
                                <input  name="rol" id="rol" type="text" class="form-control" hidden value="1">
                            </div>
                        <div class="form-group p-3">
                            <label>DNI/carnet de extranjería/ RUC</label>
                            <select required name="CboID" id="CboID" required class="selectpicker show-tick form-control" data-live-search="true" style="border: none; border-bottom: #013f62 2px solid;">
                                <option value="">Seleccionar...</option>
                                    <option value="1">DNI</option>
                                    <option value="3">carnet extranjería</option>
                                    <option value="2">RUC</option>
                            </select>
                        </div>
                        <div class="form-group p-3">
                            <label>Número de documento</label>
                            <div class="d-flex">
                                <input type="text" minlength="8" maxlength="11" name="DNI" id="carnet" class="form-control " placeholder="Ingresa DNI" required disabled pattern="[0-9]+">
                                <input type="hidden" name="valor" id="valor" value="0">
                            </div>
                        </div>
                        <!--<div class="form-group p-3">
                            <label>Nacionalidad</label>
                            <input name="nacionalidad" class="form-control " placeholder="Ingresa departamento">
                        </div>-->
                        <div class="form-group p-3">
                            <label>Fecha de Nacimiento</label>
                            <?php $date_now = date("Y-m-d"); 
                                $date_past = strtotime($date_now."- 6570 days");
	 							$date_past = date("Y-m-d",$date_past);
 								$date_future = strtotime($date_now."+ 6 days");
	 							$date_future = date("Y-m-d",$date_future);
	 							?>
                            <input required type="date" name="fechanac" class="form-control" name="date"  max="<?php echo $date_past ?>" required>
                        </div>
                        <div class="form-group p-3">
                            <label>Contraseña</label>
                            <input required type="password"name="password" class="form-control" id="exampleInputPassword1" placeholder="Ingresa tu contraseña">
                        </div>
                        
                        <div class="form-group align-items-center">
                                <div class="g-recaptcha" data-sitekey="6Lcx2cAaAAAAAGXpo2-YSJg_Js0BDmvTlSweWu-f"></div>
                                <input  class="form-control d-none" data-recaptcha="true"  data-error="Please complete the Captcha">
                                <div class="help-block with-errors"></div>
                            </div>

                    </div>
                    <div class="login-footer pt-2 text-center">
                        <button id="btnsubmit" type="submit" class="btn btn-primary boton-login" style="background-color:#9a2442;">Registrar</button>
                    </div>
                    <?php
        
                        $crearAlumno = new ControladorLogin();
                        $crearAlumno->ctrCrearUsuario();
                    ?>
                    <?php /*
                        if(isset($_POST['submit'])) {
                            $datos = $_POST;
                            $enviar = new Postulantes();
                            if ($enviar->emailExiste($datos)==true){
                                echo '<br><div class="alert alert-danger">Este correo esta siendo usado, ingrese otro</div>';
                            }
                            else {
                                $enviar->insertar($datos);
                            }
                            
                        }*/
                    ?>
                </form>
            
            </div>

        </div>
    </div>
</section>