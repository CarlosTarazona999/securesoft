<div class="container-fluid p-0">
    
<div class="card m-3">   
    
<form class="needs-validation" novalidate id="formedu" action="" method="POST" autocomplete="off">

<div class=" text-muted">

    
    <div class="mb-3 card-header m-0 text-center">
        <h5 class="pt-3 font-weight-bold">EDUCACION</h5>
    </div>
    <div class="texto-labels">
    <div class="  mx-3 row gap-20 ">
    
        

        <div class=" col-md-6">

            <div class="form-group">
                <label>Institución</label>
                <input type="text" name="centro_educacion" class="form-control" placeholder="Ingresa Institucion" required>
            </div>

        </div>

        <div class=" col-md-6">
            <?php 
                $enviar = new Educacion();
                $dato = $enviar->ObtenerArea();
            ?>
            <div class="form-group">
                <label>Area de estudio</label>
                <select name="area_estudio" id="area_estudio" required class="selectpicker show-tick form-control" data-live-search="true">
                    <option value="">Area estudio</option>
                    <?php
                        foreach($dato as $fila){
                            echo '<option value="'.$fila['idarea_estudio'].'">'.$fila['tipo_area_estudio'].'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>

    </div>

    <div class="  mx-3 clear"></div>
    <div class="mx-3 row gap-20">
        <div class="clear"></div>
        <div class=" col-md-6">
            <div class="form-group">
                <label>Tipo de estudio</label>
                <select name="nivel" required class="selectpicker show-tick form-control" data-live-search="true" required>
                    <option value="">Seleccionar...</option>
                    <option value="Secundario">Secundario</option>
                    <option value="SuperiorTécnico">Superior Técnico</option>
                    <option value="Universitario">Universitario</option>
                    <option value="Posgrado">Posgrado</option>
                    <option value="Master">Master</option>
                    <option value="Doctorado">Doctorado</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
        </div>

        <div class=" col-md-6">

            <div class="form-group">
                <label>Estado</label>
                <select name="estado" required class="selectpicker show-tick form-control" data-live-search="true" required>
                    <option value="">Seleccionar...</option>
                    <option value="En curso">En curso</option>
                    <option value="Graduado">Graduado</option>
                    <option value="Abandonado">Abandonado</option>
                </select>
            </div>


        </div>

    </div>
    <div class="  clear"></div>

    <div class=" mx-3 row gap-20">
        <div class="clear"></div>

        <div class=" col-md-6">

            <div class="form-group">
                <label>Fecha de inicio</label>
                <input class="form-control" type="datetime-local" id="dateday" name="fechainicio" max="<?php echo $date_now ?>" required>
            </div>

        </div>

        <div class=" col-md-6">

            <div class="form-group">
                <label>Fecha de fin</label>
                <input class="form-control" type="datetime-local" id="dateday" name="fechafin" max="<?php echo $date_now ?>" required>
            </div>

        </div>

    </div>
</div>

    <div class="col-sm-12 mi-btn-margen mi-user-action"></div>

    <div class=" mx-3 row gap-20 ">
        <div class="clear"></div>

        <div class=" col-md-6">

            <div class="form-group">

                <button type="submit" onclick="" class="mi-btn mi-btn-primary guardar btn">Añadir</button>
            </div>

        </div>

        <div class=" col-md-6">

            <div class="form-group">

                <button type="reset" class="mi-btn mi-btn-primary guardar btn">Cancelar</a>
            </div>

        </div>

    </div>
</div>
<br><br>
</form>
<!-- INICIO TABLE -->
<div class="container mb-5">
<div class="container">
    <div class="row">
    <div class="container card table-responsive table-hover p-4" style="width: 100%; height: 419px;">
            <table id="tablaedu" class="display">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Institucion</th>
                        <th scope="col">Area de estudio</th>
                        <th scope="col">Tipo de estudio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de inicio</th>
                        <th scope="col">Fecha de fin</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                
                <tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>

