<div class="container-fluid p-0">

    <div>
        <div class="card m-2">
            <div class=" text-muted">
                <form class="needs-validation" novalidate method="post" autocomplete="off" id="formIdioma">
                    <div class="clear"></div>
                    <div class="text-center card-header mb-5">
                        <h5 class="my-3 font-weight-bold">IDIOMA</h5>
                    </div>
                    <div class="container pt-2">
                        <div class="row gap-20 ml-3">
                            <div class="clear"></div>
                            <div class=" col-md-4">
                                <div class="form-group">
                                    <select required name="CboIdioma" required class="selectpicker show-tick form-control" data-live-search="true">
                                        <option value="">Idiomas</option>
                                        <?php
                                        $Sidiomas = ControladorIdioma::ctrMostrarIdioma();
                                        foreach ($Sidiomas as $valores) :
                                            echo '<option value="' . $valores["id"] . '">' . $valores["nidioma"] . '</option>';
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class=" col-md-4">
                                <select required name="CboNivel" required class="selectpicker show-tick form-control" data-live-search="true">
                                    <option value="">Nivel</option>
                                    <?php
                                    $Snivel = ControladorIdioma::ctrMostrarNivel();
                                    foreach ($Snivel as $valores) :
                                        echo '<option value="' . $valores["id"] . '">' . $valores["nnivel"] . '</option>';
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class=" col-md-3">
                                <div class="form-group">
                                    <button type="submit" onclick="" id="mibtn" class="mi-btn mi-btn-primary guardar btn">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- INICIO TABLE -->
            <div class="container mt-4 mb-5 pb-5">
                <div class="container">
                    <div class="row container">
                        <div class="container card table-responsive table-hover p-4" style="width: 100%; height: 419px;">
                            <table id="tablaidioma" class="display " style="width:100%">

                                <!-- <table class="m-2 text-muted table table-striped table-hover table-responsive-sm"> -->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Idioma</th>
                                        <th>Nivel</th>
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
</div>