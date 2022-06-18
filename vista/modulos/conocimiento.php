<div class="container-fluid p-0">

    <div>
        <div class="card mt-4" style="width: 100%;">
            <div class="card-header text-center mb-5">
                <p class="my-1 h4 font-weight-bold text-muted">Conocimientos y habilidades </p>
            </div>
            <!-- <div class="container mt-4 text-center">
                <div class="row">
                    <div class="col-lg-4 mt-1 mr-0 mb-3">
                        <span class="font-weight">Escribe tus conocimientos</span>
                    </div>
                    <div class="col-lg-5 ml-0">
                        <div class="form-outline mb-4">
                            <input type="text" class="form-control" id="conocimientos" />

                        </div>
                    </div>
                    <div class="col-lg-3 mt-1 mb-2">
                        <span><i class="fas fa-plus-circle pr-2" style="color:#9a2442"></i><a style="color:#9a2442 " href="javascript:añadir();">Añadir</a></span>
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-8">
                        <span id="seleccionados" class="text-muted">Conocimientos seleccionados</span>
                        <div class="mt-3">
                            <ul id="items" class="rounded-2">
                               
                            </ul>

                        </div>

                    </div>
                </div>
            </div> -->

            <form class="needs-validation" novalidate method="post" autocomplete="off" id="formConocimiento">
                <div class="container pt-2">
                    <div class="row gap-20 ml-0">
                        <div class="clear"></div>
                        <div class=" col-md-4">
                            <div class="form-group">
                                <select required name="CboConocimiento" required class="selectpicker show-tick form-control" data-live-search="true">
                                    <option value="">Conocimientos</option>
                                    <?php
                                    $Sconocimientos = ControladorConocimiento::ctrMostrarConocimiento();
                                    foreach ($Sconocimientos as $valores) :
                                        echo '<option value="' . $valores["id"] . '">' . $valores["nconocimiento"] . '</option>';
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class=" col-md-3">
                            <div class="form-group">
                                <button type="submit" onclick="" id="mibtn" class="mi-btn mi-btn-primary guardar btn">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- INICIO TABLE -->
            <div class="container mt-4 mb-5">
                <div class="container">
                    <div class="row container">
                        <div class="container card table-responsive table-hover p-4" style="width: 100%; height: 319px;">
                            <table id="tablaconocimiento" class="display" style="width:100%">

                                <!-- <table class="m-2 text-muted table table-striped table-hover table-responsive-sm"> -->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Conocimiento</th>
                                        <th></th>
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
        </div>
    </div>