<div class="container-fluid p-0">

        <div class=" ">

            <div class=" mt-2 ">

                <div class=" card ">
                    <div class="card-header text-center">
                        <h5 class="mt-2 font-weight-bold">EXPERIENCIA LABORAL</h5>
                    </div>
                    <div class="d-flex flex-column align-items-center texto-labels ml-5 text-muted">
                        <?php 
                            $enviar = new ExperienciaLaboral();
                            $dato = $enviar->ObtenerCargos();
                        ?>
                        <form method="POST" class="needs-validation d-flex flex-column flex-wrap p-3" style="width: 100%;" id="formExp">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 d-flex flex-column align-items-center fig1">
                                    <label for="empresa" class="form-label">Empresa</label>
                                    <input required type="text" id="empresa" name = "empresa" placeholder="Ingrese empresa" class="form-control rec">
                                    
                                    <!--<label for="puesto" class="form-label">Puesto</label>
                                    <input  type="text" id="puesto" class="form-control rec">
                                    <label for="pais" class="form-label">Pais</label>
                                    <select  name="pais" id="pais" class="form-control rec"></select>
                                    <label for="region" class="form-label">Region</label>
                                    <select  name="region" id="region" class="form-control rec"></select>
                                    <label for="secEmp" class="form-label">Sector de la Empresa</label>
                                    <select  name="secEmp" id="secEmp" class="form-control rec"></select>
                                    -->
                                    <label for="cargo" class="form-label">Cargo</label>
                                    <select required type="text" id="cargo" name="cargo" class="form-control rec">
                                        
                                   <?php
                                        foreach($dato as $fila){
                                            echo '<option value="'.$fila['idcargo'].'">'.$fila['tipo_cargo'].'</option>';
                                        }
                                    ?>
                                    </select>
                                    <!--
                                    <label for="area" class="form-label">Area</label>
                                    <select  name="area" id="area" class="form-control rec">Area</select>
                                    -->
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 d-flex flex-column align-items-center fig2 mb-5">
                                    
                                    <label for="periodo" class="form-label">Mes año</label>
                                    <input required type="datetime-local" class="form-control rec text-center" id="periodo" name="fechaI">
                                    <label for="mes" class="form-label">Mes año </label>
                                    <input required type="datetime-local" class="form-control rec text-center" id="mes" name="fechaF">
                                    <div class="form-check ">
                                        <input  class="form-check-input" type="checkbox" id="ac" name="actual">
                                        <label class="form-check-label" for="ac">Actualmente</label>
                                    </div>
                                    <!--
                                    <label for="comPuesto" class="mt-3 form-label">Comentario sobre el puesto</label>
                                    <textarea  name="comPuesto" class="form-control" cols="30" rows="8"></textarea>
                                    -->
                                </div>
                            </div>
                            <div class="text-center btnAnadirEl">
                                <button type="submit" class="mi-btn my-5 mi-btn-primary guardar btn">Añadir</button>
                            </div>
                        </form>

                        
                    </div>
                
            
            <!-- FIN FORMULARIO -->
            <!-- INICIO TABLE -->
            <div class="container mt-2 mb-5">
                <div class="container">
                    <div class="row container">
                        <div class="container card table-responsive table-hover p-4" style="width: 100%; height: 419px;">
                            <table id="tablaexp" class="display text-left" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Empresa</th>
                                        <th>Cargo</th>
                                        <th>Fecha inicio</th>
                                        <th>Fecha fin</th>
                                        <th class="text-center">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-12"></div>
                    </div>
                </div>
            </div>
            <!-- FIN TABLE -->
            </div>
            </div>
        </div>
        </div>