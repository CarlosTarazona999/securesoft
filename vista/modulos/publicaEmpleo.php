<div class="container-fluid p-0">

    <div class=" card text-muted m-2">

      <form method="post">
        <div class="col-lg-12 mb-2 card-header">
            <h2 class="text-center">PUBLICA EL EMPLEO</h2>    
        </div>
        <div class="container texto-labels">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="nombre">Nombre del Puesto</label> 
                      <input required type="text" name="puesto" id="puesto" class="form-control " placeholder="Nombre del puesto">
                    </div>
                    <!--DEPARTAMENTOS,PROVINCIA Y DISTRITO-->
                    <div class="form-group">
                      <label>Departamento</label> 
                      <select name="selectDepartamento" onchange="cambia()" class="form-control" required>
                        <option value="">Seleccione</option>
                        <option value="Amazonas">Amazonas</option>
                        <option value="Ancash">Ancash</option>
                        <option value="Apurímac">Apurímac</option>
                        <option value="Arequipa">Arequipa</option>
                        <option value="Ayacucho">Ayacucho</option>
                        <option value="Cajamarca">Cajamarca</option>
                        <option value="Callao">Callao</option>
                        <option value="Cuzco">Cuzco </option>
                        <option value="Huancavelica">Huancavelica</option>
                        <option value="Huánuco">Huánuco</option>
                        <option value="Ica">Ica</option>
                        <option value="Junín">Junín</option>
                        <option value="La_Libertad">La Libertad</option>
                        <option value="Lambayeque">Lambayeque</option>
                        <option value="Lima">Lima</option>
                        <option value="Loreto">Loreto</option>
                        <option value="Madre_de_Dios">Madre de Dios</option>
                        <option value="Moquegua">Moquegua</option>
                        <option value="Pasco">Pasco</option>
                        <option value="Piura">Piura</option>
                        <option value="Puno">Puno</option>
                        <option value="San_Martín">San Martín</option>
                        <option value="Tacna">Tacna</option>
                        <option value="Tumbes">Tumbes</option>
                        <option value="Ucayali">Ucayali</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Provincia</label> 
                      <select class="form-control" name="selectProvincia" onchange="cambiaDistrito()" required="">
                        <option>Seleccione la Provincia</option>
                      </select> 
                    </div>
                    <div class="form-group">
                      <label>Distrito</label> 
                      <select class="form-control" name="selectDistrito" required="">
                        <option>Seleccione el Distrito</option>
                      </select>
                    </div>
                    <!--FIN DEPARTAMENTOS,PROVINCIA Y DISTRITO-->
                    <div class="form-group">
                      <label for="ubicacion">Direccion</label> 
                          <input required type="text" name="direccion" id="direccion" class="form-control " placeholder="Direccion">
                    </div>
                    <div class="form-group">
                      <label for="especialidad">Especialidad</label> 
                      <select name="especialidad" id="especialidad" class="form-control ">
                        <option>Seleccione</option>
                        <?php
                        $response = ControladorPublicar::ctrListarAreaEstudio();
                        foreach ($response as $key => $value): ?>
                          <option value="<?php echo $value["idarea_estudio"]; ?>"><?php echo $value["tipo_area_estudio"]; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="vacantes">Años de Experiencia</label> 
                      <input required type="number" name="experiencia" id="experiencia" class="form-control ">
                    </div>
                    <div class="form-group">
                      <label>Contrato</label> 
                      <select class="form-control" name="contrato" required="">
                        <option value="">Seleccione</option>
                        <option value="Part-Time">Part-Time</option>
                        <option value="Full-time">Full-time</option>
                        <option value="Horas">Horas</option>
                      </select> 
                    </div>
                    <div class="form-group">
                      <label for="salario">Salario por mes o por año S/.</label> 
                      <input placeholder="Ejmp: 900.00" required type="number" step="any" name="salario" id="salario" class="form-control ">
                    </div>
                    <div class="form-group">
                        <label for="pregunta">¿Podrias realizar trabajo remoto desde casa?</label>
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
                </div>

                <div class="col-lg-6">
                    
                    
                    <div class="form-group">
                    <label for="descrip">Descripción del empleo</label> 
                      <textarea class="cnt form-control" name="descripcion" id="descripcion" ref="small" rows="30"></textarea>
                    </div>
                    
                </div>
                
            </div>
            <div class="col-lg-12 mx-auto mb-3 text-center">
                <button type="submit" class="guardar btn  my-2 mi-btn mi-btn-primary " >Publica!</button>
            </div>
            <?php 
              $publicaciones = new ControladorPublicar();
              $publicaciones -> ctrCrearPulbicaciones();
            ?>
        </div>
</form>
</div>
                  
                  
                  
                