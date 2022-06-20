<div class="container-fluid p-0 mt-2">
    <div class=" card mx-5 my-5">
        <div class="card-header text-left">
            <h5 class="mt-2 font-weight-bold">Formulario de gestión de productos</h5>
        </div>
        <div class="d-flex flex-column align-items-center texto-labels ml-5 text-muted">
            <form method="POST" class="needs-validation d-flex flex-column flex-wrap p-3" style="width: 100%;" id="formProducto">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 d-flex flex-column align-items-left fig1">
                        <label class="form-label">Producto</label>
                        <input required type="text" id="Producto" name="Producto" placeholder="Nombre del producto" class="form-control rec">
                        <label class="form-label">Stock</label>
                        <input required type="number" id="Stock" name="Stock" min="1" max="1000" class="form-control rec">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 d-flex flex-column align-items-left fig1">
                        <label class="form-label">Categoría</label>
                        <input required type="text" id="Categoria" name="Categoria" placeholder="Categoría del producto" class="form-control rec">
                        <label class="form-label">Imagen</label>
                        <input type="file" id="Imagen" name="Imagen" />
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 d-flex flex-column align-items-left fig1">
                        <label class="form-label">Precio</label>
                        <input required type="number" id="Precio" name="Precio" min="1" class="form-control rec">
                        <div class="text-right btnAnadirEl my-4">
                            <button type="submit" class="mi-btn mi-btn-primary guardar btn">Registrar</button>
                        </div>
                    </div>

                </div>

            </form>
        </div>

        <div class="card-header text-left">
            <h5 class="mt-2 font-weight-bold">Datos del producto</h5>
        </div>
        <!-- FIN FORMULARIO -->
        <!-- INICIO TABLE -->
        <div class="container mt-5 mb-5">
            <div class="container">
                <div class="row container">
                    <div class="container card table-responsive table-hover p-4" style="width: 100%; height: 419px;">
                        <table id="tablaProducto" class="display text-left" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Producto</th>
                                    <th>Categoría</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Imagen</th>
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