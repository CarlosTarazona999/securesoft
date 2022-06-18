<div class="container-fluid p-0">
    
    <div class="card text-muted">
        <?php 
            $enviar = new TrabajoIdeal();
            $dato = $enviar->ObtenerRubro();
        ?>
                <form class="needs-validation"novalidate action="" method="POST" autocomplete="off" id="formtrabajo">
                    <div class="mb-3 card-header m-0 text-center ">
                        <h5 class="pt-3 font-weight-bold">TRABAJO IDEAL</h5>
                    </div>
                    <div class="m-4 texto-labels">
                        
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre de empleo</label>
                                    <input type="text" name="empleo" required class="form-control" value="" placeholder="Ingresa nombre del empleo" required>
                                </div>
                            </div>

                            <div class=" col-md-6">
                                <label>Rubro</label>
                                <select name="rubro"  id="rubro" required class="selectpicker show-tick form-control" data-live-search="true">
                                    <option value="">Rubro</option>
                                    <?php
                                        foreach($dato as $fila){
                                            echo '<option value="'.$fila['idrubro'].'">'.$fila['tipo_rubro'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                    
                        </div>

                        <div class="row gap-20">
                            <div class="clear"></div>
                            <div class=" col-md-6">

                                <div class="form-group">
                                    <label>Ubicacion</label>
                                    <input type="text" name="ubicacion" required class="form-control" value="" placeholder="Ubicacion" required>
                                </div>

                            </div>

                            <div class=" col-md-6">

                                <div class="form-group">
                                    <label>Salario</label>
                                    <input type="text" name="salario" required class="form-control" value="" required>
                                </div>

                            </div>

                        </div>
                        <br>
                        <div class=" col-md-12">

                            <div class="form-group text-center btnAnadirEl">

                                <button type="submit" class="mi-btn mi-btn-primary ">Actualizar</button>
                            
                            </div>

                        </div>

                    
                </form>
            
<!--INICIO TABLE-->
<div class="container mt-4 mb-5 text-muted text-center">
<div class="container">
    <div class="row">
        <div class="container card table-responsive table-hover p-4" style="width: 100%; height: 319px;">
            <table id="tablatrabajo" class="display text-muted text-center" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre de empleo</th>
                        <th scope="col">Rubro</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">salario</th>
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




