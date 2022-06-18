<div class="container-fluid p-0">
    
        <div class=" card text-muted m-2">

            <form method="POST" id="FormDatosEmpresa" enctype="multipart/form-data">
                <div class="col-lg-12  mb-2 card-header">
                    <h2 class="text-center">Datos del Contacto</h2>
                </div>
                <?php
                $datos = controladorDatosEmpresa::ctrselectEmpresa();
                ?>

                <!-- Datos del contacto -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 texto-labels">
                            <div class="form-group">

                                <label class="mt-1" for="">Nombres</label>
                                <input type="text" class="form-control mb-4" name="nombre" placeholder="Nombres" value="<?= $datos['nombre'] != null ? $datos['nombre'] : "" ?>" require>

                            </div>
                            <div class="form-group">
                                <label class="mt-1" for="">Apellidos</label>
                                <input type="text" class="form-control mb-4" name="apellidos" placeholder="Apellidos" value="<?= $datos['apellido'] != null ? $datos['apellido'] : "" ?>" require>
                            </div>
                            <div class="form-group">
                                <label class="mt-1" for="">Correo</label>
                                <input type="text" name="correo" required class="form-control" placeholder="Correo" value="<?= $datos['correo'] != null ? $datos['correo'] : "" ?>" require>
                            </div>
                            <div class="form-group">
                                <label for="">Genero</label>
                                <select name="CboGenero" required class="selectpicker show-tick form-control" data-live-search="true" id="generoid" require>
                                    <option value="">Seleccionar...</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                    <option value="3">Otros</option>
                                </select>
                                <?php
                                $name = $datos["genero"];
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
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="text" class="form-control" name="telefono" placeholder="Telefono" value="<?= $datos['telefono'] != null ? $datos['telefono'] : null ?>" require>
                            </div>
                            <div class="form-group">
                                <label for="">Celular</label>
                                <input type="text" class="form-control" name="celular" placeholder="Celular" value="<?= $datos['celular'] != null ? $datos['celular'] : null ?>" require>
                            </div>
                        </div>
                        <div class="col-lg-6 texto-labels">
                            
                                <div class="form-group">
                                    <label for="">Insertar Foto</label>
                                    <label for="" style="font-size: 11px;">Imagen menor a 500kb</label>
                                    <div class="impadredp">
                                        <?php
                                        if ($datos["foto_perfil"] != null && file_exists($datos["foto_perfil"])) {
                                    echo '<img src="' . $datos["foto_perfil"] . '" class="imgdp">';
                                        } else {

                                        echo '<img src="vista/images/foto-por-defecto.png" class="imgdp">';
                                         }
                                        ?>
                                        <label for="file-input" class="img2dp">
                                            <img src="vista/images/camara.png" alt="Click aquí para subir tu foto" title="Click aquí para subir tu foto">
                                        </label>
                                        <input type="file" id="file-input" name="foto_perfil" hidden>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="">Tipo de carnet</label>
                                <select name="CboCarnet" required class="selectpicker show-tick form-control" data-live-search="true" id="sel_tipocarnet" require>
                                    <option value="">Seleccionar...</option>
                                    <option value="1">DNI</option>
                                    <option value="3">carnet extrangeria</option>
                                    <option value="2">RUC</option>
                                </select>
                                <?php
                                $tipocarnet = $datos["tipo_carneti"];
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
                            </div>
                            <div class="form-group">
                                <label for="">Numero de carnet</label>
                                <input type="text" class="form-control" name="numCarnet" placeholder="Numero de carnet" value="<?= $datos['num_carnet'] != null ? $datos['num_carnet'] : null ?>" require>
                            </div>
                            <div class="form-group">
                                <label for="">Fecha de nacimiento</label>

                                <input class="form-control" type="date" id="dateday" name="fechanac" required value="<?= $datos['fecha_nac'] != null ? $datos['fecha_nac'] : null ?>" require>
                            </div>
                            <div class="form-group">
                                <label for="">Contraseña</label>
                                <input class="form-control" name="passwordPersona" required placeholder="Contraseña" value="<?= $datos['contrasena'] != null ? $datos['contrasena'] : null ?>" require>
                            </div>


                        </div>
                    </div>

                </div>

                <!-- Datos de empresa -->
                <div class="col-lg-12  mb-2 card-header">
                    <h2 class="text-center">Datos de la Empresa</h2>
                </div>
                <div class="container ">
                    <div class="row">
                        <div class="col-lg-6 texto-labels">
                            <div class="form-group">
                                <label class="mt-1" for="">Nombre</label>
                                <input type="text" class="form-control mb-4" name="nombreEmpresa" placeholder="Nombre de la empresa" value="<?= $datos['nom_empresa'] != null ? $datos['nom_empresa'] : null ?>" require>
                            </div>
                            <div class="form-group">
                                <label class="mt-1" for="">RUC</label>
                                <input type="text" class="form-control mb-4" name="ruc" placeholder="RUC" value="<?= $datos['ruc'] != null ? $datos['ruc'] : null ?>" require>
                            </div>
                            <div class="form-group">
                                <label for="">Industria</label>
                                <input type="text" class="form-control" name="industria" placeholder="Industria" value="<?= $datos['industria'] != null ? $datos['industria'] : null ?>" require>
                            </div>
                            
                                <div class="form-group">
                                    <label for="">Insertar Logo</label>
                                    <label for="" style="font-size: 11px;">Imagen menor a 500kb</label>
                                    <div class="impadredp">
                                        <?php
                                       if ($datos["logo"] != null && file_exists($datos["logo"])) {
                                        echo '<img src="' . $datos["logo"] . '" class="imgdp">';
                                        } else {

                                        echo '<img src="vista/images/foto-por-defecto.png" class="imgdp">';
                                         }
                                        ?>
                                        <label for="aea" class="img2dp">
                                            <img src="vista/images/camara.png" alt="Click aquí para subir tu foto" title="Click aquí para subir tu foto">
                                        </label>
                                        <input type="file" id="aea" accept="image/*" name="logo"/ hidden>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="">Misión y Visión</label>
                                <textarea class="form-control" id="" cols="30" rows="4" name="misionvision" require><?= $datos['mision_vision'] != null ? $datos['mision_vision'] : null ?>
                        </textarea>
                            </div>

                        </div>
                        <div class="col-lg-6 texto-labels">

                            <div class="form-group">
                                <label for="">Departamento</label>
                                <input type="text" class="form-control" name="departamento" placeholder="Departamento" value="<?= $datos['departamento'] != null ? $datos['departamento'] : null ?>" require>
                            </div>
                            <div class="form-group">
                                <label for="">Provincia</label>
                                <input type="text" class="form-control" name="provincia" placeholder="Provincia" value="<?= $datos['provincia'] != null ? $datos['provincia'] : null ?>" require>
                                <div class="form-group">
                                    <label for="">Distrito</label>
                                    <input type="text" class="form-control" name="distrito" placeholder="Distrito" value="<?= $datos['distrito'] != null ? $datos['distrito'] : null ?>" require>
                                </div>
                                <div class="form-group">
                                    <label for="">Dirección</label>
                                    <input type="text" class="form-control" name="direccion" placeholder="Dirección" value="<?= $datos['direccion'] != null ? $datos['direccion'] : null ?>" require>
                                </div>
                                <div class="form-group">
                                    <label for="">Beneficios</label>
                                    <textarea name="beneficios" class="form-control" cols="30" rows="4" require><?= $datos['beneficios'] != null ? $datos['beneficios'] : null ?></textarea>
                                </div>
                                <input type="text" name="dato1" value="<?= $datos["foto_perfil"]; ?>" hidden="">
                                <input type="text" name="dato2" value="<?= $datos["logo"]; ?>" hidden="">
                            </div>

                        </div>
                        <div class="col-lg-12 mx-auto mb-3 text-center">
                            <input type="submit" class="guardar btn  my-2 " id="GuardarDatosEmpresa" value="Guardar">
                        </div>
                    </div>
            </form>

        </div>