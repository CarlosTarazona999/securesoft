<div class="container-fluid p-0">

<!--tabla para ver los empleos publicados-->
<div class="card m-2" id="listempleos">
  <div class="card-header text-muted text-center">
    <h3>Empleos</h3>
  </div>
  <div class="container  table-responsive table-hover mt-5 mb-5">
    <table class="table text-muted" id="verempleo">
      <thead class="thead-dark">
        <tr class="text-center">
          <th scope="col">Editar</th>
          <th scope="col">Nombre del Empleo</th>
          <th scope="col">Detalle</th>
          <th scope="col">Postulantes</th>
          <th scope="col">Eliminar</th>

        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>


<!-- Modal editar-->
<div class="modal fade" id="editmodal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Publicacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <input type="hidden" name="ideditPubli" id="ideditPubli" value="">
          <div class="row">
            <div class="form-group col-lg-6">
              <label>Nonmre del Puesto</label>
              <input type="text" class="form-control" name="editpuesto" id="editpuesto" required placeholder="">
            </div>
            <div class="form-group col-lg-6">
              <label>Departamento</label>
              <input type="text" class="form-control" name="editselectDepartamento" id="editselectDepartamento">
            </div>
            <div class="form-group col-lg-6">
              <label>Provincia</label>
              <input type="text" class="form-control" name="editselectProvincia" id="editselectProvincia">
            </div>
            <div class="form-group col-lg-6">
              <label>Distrito</label>
              <input type="text" class="form-control" name="editselectDistrito" id="editselectDistrito">
            </div>
            <div class="form-group col-lg-6">
              <label>Dirección</label>
              <input placeholder="" required type="text" name="editdireccion" id="editdireccion" class="form-control">
            </div>
            <div class="form-group col-lg-6">
              <label>Especialidad</label>
              <input placeholder="" required type="text" name="editespecialidad" id="editespecialidad" class="form-control ">
            </div>
            <div class="form-group col-lg-6">
              <label>Años de Experiencia</label>
              <input required type="number" name="editexperiencia" id="editexperiencia" class="form-control ">
            </div>
            <div class="form-group col-lg-6">
              <label>Contrato</label>
              <select class="form-control" name="editcontrato" id="editcontrato" required="">
                <option value="">Seleccione</option>
                <option value="Part-Time">Part-Time</option>
                <option value="Full-time">Full-time</option>
                <option value="Horas">Horas</option>
              </select>
            </div>
            <div class="form-group col-lg-6">
              <label>Salario por mes o por año S/.</label>
              <input placeholder="Ejmp: 900.00" required type="number" step="any" name="editsalario" id="editsalario" class="form-control ">
            </div>
            <div class="form-group col-lg-6">
              <label>¿Podrias realizar trabajo remoto desde casa?</label>
              <select class="form-control" name="editoptradio" id="editoptradio" required="">
                <option value="">Seleccione</option>
                <option value="si">Si</option>
                <option value="No">No</option>
              </select>
            </div>
            <!--
                <div class="form-group col-lg-6">
                        <label for="pregunta">¿Podrias realizar trabajo remoto desde casa?</label>
                        <div class="form-check-inline">
                               <label class="form-check-label" for="radio1">
                                <input type="radio" class="form-check-input" id="editoptradio" name="editoptradio" value="si">Si
                               </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label" for="radio2">
                           <input type="radio" class="form-check-input" id="radio2" name="editoptradio" id="editoptradio" value="no">No
                          </label>
                        </div>
                </div>-->
            <div class="form-group col-lg-12">
              <label>Descripción del empleo</label>
              <textarea class="cnt form-control" name="editdescripcion" id="editdescripcion" ref="small" rows="10"></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" id="btnEditPubli" class="btn btn-primary form-control">Gruadar Cambios</button>
      </div>
      <?php

      $editarPubli = new ControladorPublicar();
      $editarPubli->ctrEditarPublicacion();
      ?>
      </form>
    </div>
  </div>
</div>
<!-----detalle publicacion---------->
<div class="card m-2" id="detallePubli">
  <div class="col-1">
    <button class="btn btn-primary btn-sm mt-1 ml-1" title="atrás" onclick="regresarVerempleo()"><i class="fas fa-arrow-circle-left text-white"></i></button>
  </div>

  <div class="card-header text-muted text-center">
    <h3>Detalle de la Publicación</h3>
  </div>
  <div class="card-body">
    <div class="container text-muted">
      <div class="row texto-labels">
        <div class="col-lg-6">
          <div class="borderdetalle p-2 mb-2">
            <label>Nombre del Puesto: </label>
            <h5 id="detpuesto"></h5>
          </div>

        </div>
        <div class="col-lg-6">
          <div class="borderdetalle p-2 mb-2">
            <label class="texto-labels">Departamento: </label>
            <h5 id="detdepartamento"></h5>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="borderdetalle p-2 mb-2">
            <label class="texto-labels">Provincia: </label>
            <h5 id="detprovincia"></h5>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="borderdetalle p-2 mb-2">
            <label class="texto-labels">distrito: </label>
            <h5 id="detdistrito"></h5>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="borderdetalle p-2 mb-2">
            <label class="texto-labels">direccion: </label>
            <h5 id="detdireccion"></h5>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="borderdetalle p-2 mb-2">
            <label class="texto-labels">Contrato: </label>
            <h5 id="detcontrato"></h5>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="borderdetalle p-2 mb-2">
            <label class="texto-labels">Especialidad: </label>
            <h5 id="detespecialidad"></h5>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="borderdetalle p-2 mb-2">
            <label class="texto-labels">Experiencia: </label>
            <h5 id="detexperiencia"></h5>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="borderdetalle p-2 mb-2">
            <label class="texto-labels">Salario: </label>
            <h5 id="detsalario"></h5>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="borderdetalle p-2 mb-2">
            <label class="texto-labels">Trabajo Remoto?: </label>
            <h5 id="detremoto"></h5>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="borderdetalle p-2 mb-2">
            <label class="texto-labels">Fecha de la publicacion: </label>
            <h5 id="detfecha"></h5>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="borderdetalle p-2 mb-2">
            <label class="texto-labels">Hora de la publicación: </label>
            <h5 id="dethora"></h5>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="borderdetalle p-2">
            <label class="texto-labels">Descripción del trabajo: </label>
            <h5 id="detdescripcion"></h5>
          </div>
        </div>

        <intut type="hidden" id="iddetalleEmpresa">
      </div>
    </div>
  </div>
</div>


<!-- tabla para ver todos los postulantes que postularon a ese trabajo -->
<div class="card m-2" id="listpostulantes">
  <div class="col-1">
    <button class="btn btn-primary btn-sm mt-1 ml-1" title="atrás" onclick="regresarVerempleodPostulados()"><i class="fas fa-arrow-circle-left text-white"></i></button>
  </div>
  <form action="" method="post">
    <input type="hidden" id="idpostPubli">
  </form>
  <div class="card-header text-muted text-center">
    <h3>Empleo: </h3>
    <h4 id="postpuesto"> </h4>
  </div>
  <div class="container  table-responsive table-hover">
    <table class="table text-muted" id="listpostulados">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Eliminar</th>

        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
</div>


<!--=====================================================
VER PERFIL POSTULANTE
======================================================-->

<div class="card m-2" id="verPostulante">
  <div class="col-1">
    <button class="btn btn-primary btn-sm mt-1 ml-1" title="atrás" onclick="regresarVerPostulados()"><i class="fas fa-arrow-circle-left text-white"></i></button>
  </div>

  <div class="card-header text-muted text-center">
    <h3>Perfil de Postulante</h3>
  </div>
  <div class="card-body">
    <div class="container text-muted mt-4">
      <div class="row">
          <div class="col-12 col-md-4">
            <div class="w-100 text-center">
              <img class="img-fluid foto-postulante" src="" alt="Foto de Perfil">
            </div>
            <div class="w-100 mt-4">
              <ul class='list-unstyled'>
                <li><i class="fas fa-envelope mr-3 mb-3"></i> <span class="email-postulante"></span></li>
                <li><i class="fas fa-id-card mr-3 mb-3"></i></i> <span class='carnet-postulante'></span></li>
                <li><i class="fas fa-phone mr-3 mb-3"></i> <span class='tel-postulante'></span></li>
                <li><i class="fas fa-map-marker-alt mr-3 mb-3"></i> <span class='localidad-postulante'></span></li>
                <li><i class="fas fa-map-marker-alt mr-3 mb-3"></i> <span class='direccion-postulante'></span></li>
              </ul>
            </div>
            <div class="w-100 mt-4">
              <h4 class='border-secondary border-bottom pb-2 mb-2 text-uppercase'>Conocimientos y Habilidades</h4>
              <ul class='list-unstyled habilidad-postulacion'>
                
              </ul>
            </div>
            <div class="w-100 mt-4">
              <h4 class='border-secondary border-bottom pb-2 mb-2 text-uppercase'>Idiomas</h4>
              <ul class='list-unstyled idioma-postulacion'>

              </ul>
            </div>
            <div class="w-100 mt-4">
              <h4 class='border-secondary border-bottom pb-2 mb-2 text-uppercase'>Información Adicional</h4>
              <ul class='list-unstyled'>
                <li>
                <i class="far fa-dot-circle mr-3 mb-3"></i> <span class="genero-postulante"></span>
                </li>
                <li>
                <i class="far fa-dot-circle mr-3 mb-3"></i> <span class="Estado-postulante"></span>
                </li>
                <li>
                <i class="far fa-dot-circle mr-3 mb-3"></i> <span class="Discapacidad-postulante"></span>
                </li>
                <li>
                <i class="far fa-dot-circle mr-3 mb-3"></i> <span class="Linkedin-postulante"></span>
                </li>
                <li>
                <i class="far fa-dot-circle mr-3 mb-3"></i> <span class="Fecha-postulante"></span>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-12 col-md-8">
            <div class="w-100">
              <h1 class='text-uppercase nombre-postulante'></h1>
              <h1 class='text-uppercase apellido-postulante'></h1>
            </div>
            <div class="w-100 mt-5">
              <h4 class='border-secondary border-bottom pb-2 text-uppercase'>Sobre Mi</h4>
              <p class='sobreMi-postulante'></p>
            </div>
            <div class="w-100 mt-4">
              <h4 class='border-secondary border-bottom pb-2 mb-3 text-uppercase'>Experiencia Laboral</h4>
              <div class='laboral-postulacion'>

              </div>
              
            </div>
            <div class="w-100 mt-4">
              <h4 class='border-secondary border-bottom pb-2 mb-3 text-uppercase'>Educación</h4>
              <div class='educacion-postulacion'></div>
            </div>
            <a href="#" class="w-100 btn btn-primary mt-4" target="_blank" id="miCv">MI CV</a>
            <div class="w-100 mt-4">
              <h4 class='border-secondary border-bottom pb-2 mb-3 text-uppercase'>Estado Postulación</h4>
              <form action="" class='row' style="padding: 0px 1em;" id="formularioEstado">
                <input type="hidden" id="idpostulacion" value="">
                <div class="form-check col-12 col-md-3">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="Postulada1" value="P">
                  <label class="form-check-label" for="Postulada1">
                    Postulada
                  </label>
                </div>
                <div class="form-check col-md-3">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="Visto2" value="V">
                  <label class="form-check-label" for="Visto2">
                    CV Visto
                  </label>
                </div>
                <div class="form-check col-12 col-md-3">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="Gestion3" value="G">
                  <label class="form-check-label" for="Gestion3">
                    En Gestión
                  </label>
                </div>
                <div class="form-check col-12 col-md-3">
                  <input class="form-check-input" type="radio" name="flexRadioDefault" id="Finalista4" value="F">
                  <label class="form-check-label" for="Finalista4">
                    Finalista
                  </label>
                </div>
                <button type="submit" class='btn btn-danger mt-3' id="actuEstado">Actualizar Estado Postulante</button>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
