<script src="https://www.paypal.com/sdk/js?client-id=ARK8p4mNEOCzV8ueL5hZpznAYZR7olrljkTfnf1YxP_IYHfga3raSdWN7NNQ222lNP8zVZ_jawI8dYwe"></script>
<!--Inicio Banner-->
<section class="panel-planes" style="background-image: url('vista/images/baner-plan.jpeg');
  background-attachment: fixed; background-size: cover; height: 40vh">
    <div class="planes py-sm-5 py-4" style="background-color: rgba(1, 63, 98, 0.25); height: 40vh">
        <div class="container py-lg-3 py-2">
            <div class="row text-center">
                <div class="col-lg-12">
                    <h1 class="text-white mb-0">Modos de cuenta y precio para empresas</h1>
                    <p class="lead my-3 text-white" style="font-size:25px;">Compare los distintos modos de cuenta disponible</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Fin Banner-->

<!--Seccción de Planes-->
<div class="container-fluid p-0 mb-5 pt-5" style="background: #fff;">

    <div class="container col-lg-8 ">

        <!--Card Premium-->
        <div class="card border  shadow p-0 mb-5 bg-white rounded">
            <div class="card-header text-white" style="background-color:#013f62">
                <p class="text-center h2 my-2">Premium</p>
            </div>
            <div class="card-body">

                <!--Inicio de tabla-->
                <table class="table text-center pb-0 table-responsive-sm">
                    <thead class="table table-borderless">
                        <tr>
                            <th colspan="2"></th>
                            <th class="pl-0 pr-0">30 días</th>
                            <th class="pr-0">90 días</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left" colspan="2">Activar Empleos</td>
                            <td class="pl-0">100</td>
                            <td class="pr-0">200</td>
                        </tr>
                        <tr>
                            <td class="text-left" colspan="2">Empleos Activos</td>
                            <td class="pl-0">100</td>
                            <td class="pr-0">200 </td>
                        </tr>
                        <tr>
                            <td class="text-left" colspan="2">Acceder a postulantes por publicación</td>
                            <td colspan="2">Ilimitado</td>
                        </tr>
                        <tr>
                            <td class="text-left" colspan="2">API</td>
                            <td class="pl-0">Sí</td>
                            <td class="pr-0">Sí</td>
                        </tr>
                        <tr colspan="4">
                            <td class="text-left" colspan="2"></td>
                            <td><button id="btn-buscar" class="btn btn-premiun-1 btn-block my-2" value="445">445 PEN </button></td>
                            <td><button id="btn-buscar" class="btn btn-premiun-2 btn-block my-2" value="890">890 PEN</butoon></td>
                        </tr>
                        <tr>
                            <td colspan="4">

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--Fin de tabla-->
                <div class="text-center mb-3">
                    <div id="text-pago-premiun">
                    </div>
                    <div id="paypal-button-container"></div>
                </div>

            </div>
        </div>
        <!--Fin de Card Premium-->

    </div>


    <div class="container col-lg-8">

        <!--Inicio de Card Standard-->
        <div class="card border shadow p-0 mb-5 bg-white rounded">
            <div class="card-header text-white" style="background-color:#013f62">
                <p class="text-center h2 my-2">Standard</p>
            </div>

            <div class="card-body">
                <!--Inicio de tabla-->

                <table class="table text-center table-responsive-sm">
                    <thead class="table table-borderless">
                        <tr>
                            <th colspan="2"></th>
                            <th class="pl-0 pr-0">30 días</th>
                            <th class="pr-0">90 días</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="text-left" colspan="2">Activar Empleos</td>
                            <td class="pl-0">50</td>
                            <td class="pr-0">100</td>
                        </tr>
                        <tr>
                            <td class="text-left" colspan="2">Empleos Activos</td>
                            <td class="pl-0">50</td>
                            <td class="pr-0">100 </td>
                        </tr>

                        <tr>
                            <td class="text-left" colspan="2">Acceder a postulantes por publicación</td>
                            <td colspan="2">Ilimitado</td>
                        </tr>

                        <tr>
                            <td class="text-left" colspan="2">API</td>
                            <td class="pl-0">Sí</td>
                            <td class="pr-0">Sí</td>
                        </tr>
                        <tr>
                            <td class="text-left" colspan="2"></td>
                            <td><button id="btn-buscar" class="btn btn-standar-1  btn-block my-2" value="149">149 PEN</button></td>
                            <td><button id="btn-buscar" class="btn btn-standar-2 btn-block my-2" value="295">295 PEN</butoon></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--Fin de tabla-->

                <div class="text-center mb-3">
                    <div id="text-pago-standar">
                    </div>
                    <div id="paypal-button-container2"></div>
                </div>
            </div>
        </div>
        <!--Fin de Card Standard-->

    </div>

    <div class="container col-lg-8">

        <!--Inicio de Card Básico-->
        <div class="card border shadow p-0 mb-5 bg-white rounded">
            <div class="card-header text-white" style="background-color:#013f62">
                <p class="text-center h2 my-2">Básico</p>
            </div>
            <div class="card-body">
                <table class="table text-center table-responsive-sm">
                    <thead class="table table-borderless">
                        <tr>
                            <th colspan="2"></th>
                            <th colspan="2">Siempre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-left" colspan="2">Activar Empleos</td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td class="text-left" colspan="2">Empleos Activos</td>
                            <td>10</td>
                        </tr>

                        <tr>
                            <td class="text-left" colspan="2">Acceder a postulantes por publicación</td>
                            <td>15</td>
                        </tr>

                        <tr>
                            <td class="text-left" colspan="2">API</td>
                            <td> No</td>
                        </tr>
                        <tr>
                            <td class="text-left" colspan="2"></td>
                            <td>
                                <button id="btn-buscar" class="btn btn-block my-2 btn-gratis">Gratis </button>
                            </td>
                        <tr>
                            <td colspan="4">

                            </td>
                        </tr>
                    </tbody>
                </table>
                <!--Fin de la tabla-->
                <div class="text-center mb-3">
                    <img src="vista/images/Paypal.jpeg" width="60" height="42" alt="">
                    <span>ó</span>
                    <span class="font-weight-bold ">Tranferencia</span>
                </div>

            </div>
        </div>
        <!--Fin de Card Básico-->

    </div>

    <script>
        const premiun1 = document.querySelector('.btn-premiun-1');
        const premiun2 = document.querySelector('.btn-premiun-2');
        const textPremiun = document.querySelector('#text-pago-premiun');
        premiun1.addEventListener('click', (e) => {
            const plan = 'p30';

            textPremiun.innerHTML = '';
            document.querySelector('#paypal-button-container').innerHTML = '';
            const valorPremiun = e.target.value;
            const h4 = document.createElement('h4');
            const eli = document.createElement('button');
            textPremiun.classList.add('d-flex','justify-content-center','mb-3');
            eli.classList.add('btn','btn-danger');
            eli.textContent = 'X';
            eli.onclick = () => {
                document.querySelector('#paypal-button-container').innerHTML = '';
                textPremiun.innerHTML = '';
            }
            h4.textContent = `Pago de ${valorPremiun} PEN -`;
            textPremiun.appendChild(h4);
            textPremiun.appendChild(eli);

            paypal.Buttons({
                createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                    amount: {
                        value: `${valorPremiun}`
                    }
                    }]
                });
                },
                onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    if (details.status == "COMPLETED") {
                        const pago = {
                            monto: valorPremiun,
                            codTra: details.id
                        }
                        $.ajax({
                            type: "POST",
                            url: "ajax/pagos.ajax.php",
                            data: "paga="+JSON.stringify(pago),
                            success: function (response1) {
                                if (response1 == "ok") {
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/plan.ajax.php",
                                        data: "plan="+plan,
                                        success: function (response) {
                                            if (response == 'premiun30') {
                                                Swal.fire({
                                                    icon: "success",
                                                    text: "Plan Premiun de 30 dias comprada con exito."
                                                })
                                            }else{
                                                Swal.fire({
                                                    icon: "error",
                                                    text: "Error al comprar el Plan Premiun de 30 dias."
                                                })
                                            }
                                        }
                                    });
                                }else{
                                    Swal.fire({
                                        icon: "error",
                                        text: "Ah ocurrido un error al realizar la Transacción"
                                    })
                                }
                            }
                        });
                        
                    }else{
                        Swal.fire({
                            icon: "error",
                            text: "Ah ocurrido un error al realizar la Transacción"
                        })
                    }
                });
                }
            }).render('#paypal-button-container'); // Display payment options on your web page
        })
        premiun2.addEventListener('click', (e) => {

            const plan = 'p90';

            textPremiun.innerHTML = '';
            document.querySelector('#paypal-button-container').innerHTML = '';
            const valorPremiun = e.target.value;
            const h4 = document.createElement('h4');
            const eli = document.createElement('button');
            textPremiun.classList.add('d-flex','justify-content-center','mb-3');
            eli.classList.add('btn','btn-danger');
            eli.textContent = 'X';
            eli.onclick = () => {
                document.querySelector('#paypal-button-container').innerHTML = '';
                textPremiun.innerHTML = '';
            }
            h4.textContent = `Pago de ${valorPremiun} PEN -`;
            textPremiun.appendChild(h4);
            textPremiun.appendChild(eli);

            paypal.Buttons({
                createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                    amount: {
                        value: `${valorPremiun}`
                    }
                    }]
                });
                },
                onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    if (details.status == "COMPLETED") {
                        const pago = {
                            monto: valorPremiun,
                            codTra: details.id
                        }
                        $.ajax({
                            type: "POST",
                            url: "ajax/pagos.ajax.php",
                            data: "paga="+JSON.stringify(pago),
                            success: function (response1) {
                                if (response1 == "ok") {
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/plan.ajax.php",
                                        data: "plan="+plan,
                                        success: function (response) {
                                            if (response == 'premiun90') {
                                                Swal.fire({
                                                    icon: "success",
                                                    text: "Plan Premiun de 90 dias comprada con exito."
                                                })
                                            }else{
                                                Swal.fire({
                                                    icon: "error",
                                                    text: "Error al comprar el Plan Premiun de 90 dias."
                                                })
                                            }
                                        }
                                    });
                                }else{
                                    Swal.fire({
                                        icon: "error",
                                        text: "Ah ocurrido un error al realizar la Transacción"
                                    })
                                }
                            }
                        });
                        
                    }else{
                        Swal.fire({
                            icon: "error",
                            text: "Ah ocurrido un error al realizar la Transacción"
                        })
                    }
                });
                }
            }).render('#paypal-button-container'); // Display payment options on your web page
        })
    </script>
    <script>
        const standar1 = document.querySelector('.btn-standar-1');
        const standar2 = document.querySelector('.btn-standar-2');
        const textStandar = document.querySelector('#text-pago-standar');

        standar1.addEventListener('click', (e) => {

            const plan = 's30';

            textStandar.innerHTML = '';
            document.querySelector('#paypal-button-container2').innerHTML = '';
            const valorStandar = e.target.value;
            const h4 = document.createElement('h4');
            const eli = document.createElement('button');
            textStandar.classList.add('d-flex','justify-content-center','mb-3');
            eli.classList.add('btn','btn-danger');
            eli.textContent = 'X';
            eli.onclick = () => {
                document.querySelector('#paypal-button-container2').innerHTML = '';
                textStandar.innerHTML = '';
            }
            h4.textContent = `Pago de ${valorStandar} PEN -`;
            textStandar.appendChild(h4);
            textStandar.appendChild(eli);

            paypal.Buttons({
                createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                    amount: {
                        value: `${valorStandar}`
                    }
                    }]
                });
                },
                onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    if (details.status == "COMPLETED") {
                        const pago = {
                            monto: valorStandar,
                            codTra: details.id
                        }
                        $.ajax({
                            type: "POST",
                            url: "ajax/pagos.ajax.php",
                            data: "paga="+JSON.stringify(pago),
                            success: function (response1) {
                                if (response1 == "ok") {
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/plan.ajax.php",
                                        data: "plan="+plan,
                                        success: function (response) {
                                            if (response == 'standar30') {
                                                Swal.fire({
                                                    icon: "success",
                                                    text: "Plan Standar de 30 dias comprada con exito."
                                                })
                                            }else{
                                                Swal.fire({
                                                    icon: "error",
                                                    text: "Error al comprar el Plan Standar de 30 dias."
                                                })
                                            }
                                        }
                                    });
                                }else{
                                    Swal.fire({
                                        icon: "error",
                                        text: "Ah ocurrido un error al realizar la Transacción"
                                    })
                                }
                            }
                        });
                        
                    }else{
                        Swal.fire({
                            icon: "error",
                            text: "Ah ocurrido un error al realizar la Transacción"
                        })
                    }
                });
                }
            }).render('#paypal-button-container2'); // Display payment options on your web page
        })

        standar2.addEventListener('click', (e) => {

            const plan = 's90';

            textStandar.innerHTML = '';
            document.querySelector('#paypal-button-container2').innerHTML = '';
            const valorStandar = e.target.value;
            const h4 = document.createElement('h4');
            const eli = document.createElement('button');
            textStandar.classList.add('d-flex','justify-content-center','mb-3');
            eli.classList.add('btn','btn-danger');
            eli.textContent = 'X';
            eli.onclick = () => {
                document.querySelector('#paypal-button-container2').innerHTML = '';
                textStandar.innerHTML = '';
            }
            h4.textContent = `Pago de ${valorStandar} PEN -`;
            textStandar.appendChild(h4);
            textStandar.appendChild(eli);

            paypal.Buttons({
                createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                    amount: {
                        value: `${valorStandar}`
                    }
                    }]
                });
                },
                onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    if (details.status == "COMPLETED") {
                        const pago = {
                            monto: valorStandar,
                            codTra: details.id
                        }
                        $.ajax({
                            type: "POST",
                            url: "ajax/pagos.ajax.php",
                            data: "paga="+JSON.stringify(pago),
                            success: function (response1) {
                                if (response1 == "ok") {
                                    $.ajax({
                                        type: "POST",
                                        url: "ajax/plan.ajax.php",
                                        data: "plan="+plan,
                                        success: function (response) {
                                            if (response == 'standar90') {
                                                Swal.fire({
                                                    icon: "success",
                                                    text: "Plan Standar de 90 dias comprada con exito."
                                                })
                                            }else{
                                                Swal.fire({
                                                    icon: "error",
                                                    text: "Error al comprar el Plan Standar de 90 dias."
                                                })
                                            }
                                        }
                                    });
                                }else{
                                    Swal.fire({
                                        icon: "error",
                                        text: "Ah ocurrido un error al realizar la Transacción"
                                    })
                                }
                            }
                        });
                        
                    }else{
                        Swal.fire({
                            icon: "error",
                            text: "Ah ocurrido un error al realizar la Transacción"
                        })
                    }
                });
                }
            }).render('#paypal-button-container2'); // Display payment options on your web page
        })

        const btnGratis = document.querySelector(".btn-gratis");
        btnGratis.addEventListener('click',(e) => {
            e.preventDefault();
            const plan = 'b';
            $.ajax({
                type: "POST",
                url: "ajax/plan.ajax.php",
                data: "plan="+plan,
                success: function (response) {
                    if (response == 'basico') {
                        Swal.fire({
                            icon: "success",
                            text: "Plan Basico comprada con exito."
                        })
                    }else{
                        Swal.fire({
                            icon: "error",
                            text: "Error al comprar el Plan Basico."
                        })
                    }
                }
            });                            
        })
    </script>
</div>