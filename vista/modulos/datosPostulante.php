
    <div class="container-fluid p-0" style="background: #fff;">
    
    
    <div class="container wrapper">
        <div class="card">
            <div class="">
                <div class="">
                <?php
                $recibir = new DatosPersonales();
                $dato = $recibir->selectDp();
                $option = $recibir->ctrSelectEstadoCivil();
                ?>
                    <form action="" method="POST" autocomplete="off" style="width: 100%;" class="text-muted" enctype="multipart/form-data" id="formDatosPersonales">
                        <div class="card-header text-center">
                            <h5 class=" font-weight-bold ">DATOS PERSONALES</h5>
                        </div>
                    
                        <div class="row mx-2 pt-2" >
                            <div class="col-lg-6 texto-labels">
                                <div class="form-group">
                                    <label>Nombre</></label>
                                    <input name="nombre" required type="text" class="form-control" value="<?= $dato["nombre"]; ?>" placeholder="Ingresa tu Nombres">
                                </div>
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input name="apellido" required type="text" class="form-control" value="<?= $dato["apellido"]; ?>" placeholder="Ingresa tu Apellidos">
                                </div>
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input name="Correo" required type="text" class="form-control" value="<?= $dato["correo"]; ?>" placeholder="Ingresa tu Correo">
                                </div>
                                <div class="form-group">
                                <label>Genero</label>
                                <select name="CboGenero" id="generoid" required class="selectpicker show-tick form-control" data-live-search="true">
                                    <option value=""><?php echo $dato["tipo_genero"]; ?></option>
                                    <option value="2">Femenino</option>
                                    <option value="1">Masculino</option>
                                    <option value="3">Otro</option>
                                </select>
                                <?php
                                $name = $dato["genero"];
                                ?>
                                    <script type="text/javascript">
                                        let genero = document.getElementById('generoid');
                                        for (let i = 0; i < genero.length; i++) {
                                            let option = genero[i];
                                            if (option.value == <?= json_encode($name) ?>) {
                                                option.selected = 'selected';
                                            }
                                        }
                                    </script>
                                </div>
                                <!--<div class="form-group">
                                    <label>Nacionalidad</label>
                                    <input type="text" name="ID" required class="form-control" value="" placeholder="Ingrese Nacionalidad">
                                </div>-->
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <input type="text" name="telefono" class="form-control" value="<?= $dato['telefono']; ?>" placeholder="Ingrese Telefono">
                                </div>
              
                                <div class="form-group">
                                <label>Fecha de nacimiento</label>

                                <?php $date_now = date("Y-m-d"); 
                                $date_past = strtotime($date_now."- 6570 days");
	 							$date_past = date("Y-m-d",$date_past);
 								$date_future = strtotime($date_now."+ 6 days");
	 							$date_future = date("Y-m-d",$date_future);
	 							?>
                                <input class="form-control" type="date" id="dateday" name="fechanac" max="<?php echo $date_past; ?>" value="<?= $dato["fecha_nac"]; ?>" required>

                                </div>
                                <div class="form-group">
                                    <label>Departamento</label>
                                    <select name="departamento" id="depart"  class="selectpicker show-tick form-control" data-live-search="true">
                                        <option value=""><?php echo $dato["departamento"]; ?></option>
                                        <option value="Lima">Lima</option>
                                        <option value="Arequipa">Arequipa</option>
                                        <option value="Cuzco">Cuzco</option>
                                    </select>
                                </div>

                                <?php
                                $departamento = $dato["departamento"];
                                ?>
                                <script type="text/javascript">
                                    let depa = document.getElementById('depart');
                                    for (let i = 0; i < depa.length; i++) {
                                        let option = depa[i];
                                        if (option.value == <?= json_encode($departamento) ?>) {
                                            option.selected = 'selected';
                                        }
                                    }
                                </script>

                                <div class="form-group">
                                    <label>Provincia</label>
                                    <select name="provincia" id="provincia"  class="selectpicker show-tick form-control" data-live-search="true">
                                        <option value=""><?php echo $dato["provincia"]; ?></option>
                                        <option value="Lima">Lima</option>
                                        <option value="huarochiri">huarochiri</option>
                                    </select>
                                </div>

                                <?php
                                $provincia = $dato["provincia"];
                                ?>
                                <script type="text/javascript">
                                    let prov = document.getElementById('provincia');
                                    for (let i = 0; i < prov.length; i++) {
                                        let option = prov[i];
                                        if (option.value == <?= json_encode($provincia) ?>) {
                                            option.selected = 'selected';
                                        }
                                    }
                                </script>

                                <div class="form-group">
                                    <label>Distrito</label>
                                    <select name="distrito" id="distrito"  class="selectpicker show-tick form-control" data-live-search="true">
                                        <option value="">Seleccionar...</option>
                                        <option value="Lince">Lince</option>
                                        <option value="la victoria">la victoria</option>
                                    </select>
                                </div>

                                <?php
                                $distrito = $dato["distrito"];
                                ?>
                                <script type="text/javascript">
                                    let distrito = document.getElementById('distrito');
                                    for (let i = 0; i < distrito.length; i++) {
                                        let option = distrito[i];
                                        if (option.value == <?= json_encode($distrito) ?>) {
                                            option.selected = 'selected';
                                        }
                                    }
                                </script>

                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input type="text" name="direccion"  class="form-control" value="<?= $dato["direccion"]; ?>" placeholder="Ingresa dirección">
                                </div>
                                <div class="form-group">
                                    <label>Estado civil</label>
                                    <select name="CboCivil" id="estadoC"  class="selectpicker show-tick form-control" data-live-search="true">
                                        <?php 
                                            foreach ($option as $key) {
                                                echo '<option value="'. $key["id_estadocivil"].'">'. $key["tipo_estadocivil"]. '</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <?php
                                $estadoCivil = $dato["estado_civil"];
                                ?>
                                <script type="text/javascript">
                                    let escivil = document.getElementById('estadoC');
                                    for (let i = 0; i < escivil.length; i++) {
                                        let option = escivil[i];
                                        if (option.value == <?= json_encode($estadoCivil) ?>) {
                                            option.selected = 'selected';
                                        }
                                    }
                                </script>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="discapacidad"> Posee algún tipo de discapacidad</label><br>
                                    </div>

                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="radio1">
                                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="si">Si
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label" for="radio2">
                                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="no">No
                                        </label>
                                    </div>
                                </div>
                                <?php
                                    
                                    $discapacidad = $dato["discapacidad"];
                                ?>
                                <script>
                                    let opciones = document.getElementsByName("optradio");

                                    for(let i=0; i<opciones.length; i++) {
                                    
                                        let opt = opciones[i];
                                        if(opt.value == <?= json_encode($discapacidad) ?>){
                                            opt.checked = 'checked';
                                        }
                                    }

                                </script>
                                <div class="form-group">
                                    <div class="m-auto imgpadre" style="width:100%">
                                        <label>Adjuntar CV</label>
                                        <div id="arreglo">
                                            <input type="file" id="cv" name="cv" hidden>
                                            <label for="" id="labelinputdp" onclick="document.getElementById('cv').click()">
                                                Seleccionar archivo
                                            </label>
                                        </div>
                                        <div>
                                            <?php 
                                                if($dato["cv"]){
                                                    echo '<a target ="_black" href="http://iblabora.com/'.$dato["cv"].'">Ver CV</a>';
                                                }
                                            ?>
                                        </div>
                                        <!-- <input class="form-control-file imgin" accept="image/*" type="file" name="image" required> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 texto-labels">
                                <div class="form-group">
                                    <label for="">Insertar Foto</label>
                                    <div class="impadredp">
                                        <?php
                                 if ($dato["foto_perfil"] != " " && file_exists($dato['foto_perfil'])) {
                                            echo '<img src="'.$dato["foto_perfil"].'" alt="" class="rounded-circle imgdp">';
                                        } else {
                                            
                                            echo '<img src="vista/images/foto-por-defecto.png" alt="" class="rounded-circle imgdp">';
                                        }
                            
                                        ?>
                                        <label for="aea" class="img2dp">
                                            <img src="vista/images/camara.png" alt="Click aquí para subir tu foto" title="Click aquí para subir tu foto">
                                        </label>
                                        <input type="file" id="aea" name="file"/ hidden>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tipo Carnet</label>
                                    <select name="CboID" id="sel_tipocarnet"  class="selectpicker show-tick form-control" data-live-search="true">
                                        <option value=""><?php echo $dato["tipo_carnet"]; ?></option>
                                        <option value="1">Dni</option>
                                        <option value="3">Carnet</option>
                                        <option value="2">Ruc.</option>
                                    </select>
                                </div>

                                <?php
                                $tipocarnet = $dato["tipo_carneti"];
                                ?>
                                <script type="text/javascript">
                                    let carnet = document.getElementById('sel_tipocarnet');
                                    for (let i = 0; i < carnet.length; i++) {
                                        let option = carnet[i];
                                        if (option.value == <?= json_encode($tipocarnet) ?>) {
                                            option.selected = 'selected';
                                        }
                                    }
                                </script>

                                <div class="form-group">
                                    <label>Carnet</label>
                                    <input type="text" name="ID" class="form-control" value="<?= $dato["num_carnet"]; ?>" placeholder="Ingrese Carnet">
                                    <input type="text" name="dnipostulante" class="form-control" value="<?= $dato["num_carnet"]; ?>"  hidden>
                                </div>

                                <div class="form-group">
                                    <label>Celular</label>
                                    <input type="text" name="celular"  class="form-control" value="<?= $dato["celular"]; ?>" placeholder="Ingrese Celular">
                                </div>
                                <div class="form-group">
                                    <label>Linkedin</label>
                                    <input type="text" name="linkedin"  class="form-control" value="<?= $dato["linkendin"]; ?>" placeholder="Ingresa linkedin">
                                </div>

                                <div class="form-group">
                                    <label>Sobre mi</label>
                                    <textarea name="about" class="form-control" placeholder="Ingresa tu descripcion ..." style="height: 250px;" value=""><?= $dato["sobre_mi"]; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" name="password" placeholder="Ingresa nueva contraseña">
                                </div>

                                <div class="form-group">
                                    <label>Confirmar Contraseña</label>
                                    <input type="password" class="form-control" name="confirmpassword"  placeholder="Confirma tu contraseña">
                                </div>
                                
                                <input type="text" name="dato1" value="<?= $dato["foto_perfil"];?>" hidden="">
                                <input type="text" name="dato2" value="<?= $dato["cv"];?>" hidden="">
                            </div>
                            <div class="col-lg-12 text-center">
                                <div class="form-group btndivdp">
                                    <button type="submit" class="btn btn-primary btn-nan" id="actuPost">Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

            