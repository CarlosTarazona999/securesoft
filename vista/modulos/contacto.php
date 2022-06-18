<!-- INICIO FORMULARIO HTML -->
<div class="container-fluid p-0 mb-5 ">
    <div class="palaxIn" > 
        <div class="container py-lg-3 py-2">
            <div class="row">                         
                 <nav class="navbar navbar-expand nav-1">
                <ul class="navbar-nav">
                <h2 class="pt-4  text-white text-center font-weight-bold " style="font-size: 40px;">Contáctenos </h2> <!-- aca le implementado los estilos para el footer-->
            </div>
            
        </div>
     </div>
<div>

<section class="container">
    <div class="">
            <div class=" ja row">

                    <div class="col-sm-7 col-md-6 col-md-offset-1 mb-30">
                                            
                        <form class="contact-form-wrapper needs-validation" novalidate   action="controlador/enviarContacto.php" method="POST" autocomplete="off">
                        
                            <div class="row lulu">
                            
                                <div class="col-sm-6">

                                    <div class="pt-4 form-group">
                                  <!-- aca le implementado los estilos para nombre y apellido , correo electronico y mensaje en letras negritras -->
                                        <label  style="color:white" for="inputName">Nombres y apellidos <span class="font10 cooo">(requerido)</span></label>
                                        <input id="inputName" name="nombre" type="text" class=" form-control " data-error="Tu nombre es obligatorio" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-sm-6">
                                
                                    <div class="pt-4 form-group">
                                        <label  style="color:white" for="inputEmail">Tu Correo Electrónico <span class="font10 text-danger" style="cooo">(requerido)</span></label>
                                        <input id="inputEmail" name="email" type="text" class="form-control " data-error="Tu correo es obligatorio y verificado por Correo Electrónico" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    
                                </div>

                                
                                <div class="col-sm-12">
                                
                                    <div class="form-group">
                                        <label  style="color:white"for="inputMessage">Mensaje <span class="font10 text-danger">(requerido)</span></label>
                                        <textarea id="inputMessage" name="mensaje" class="form-control " rows="8" data-minlength="50" data-error="Your message is required and must not less than 50 characters" required></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>

                                </div>
                                
                                <div class="col-sm-12 text-right">
                                <button type="submit" class="bottt btn ">Enviar Mensaje</button>
                                </div>
                                
                            </div>
                        </form>
                        
                    </div>
                
                     <div class="sa col-md-4 ml-4">
                          <p class="colo pt-4 font-weight-bold">Dirección</p>
                         <div><p class="brr">Av. Circunvalación Golf Los Incas Nro. 208, Torre 3,  Oficina 602B , Santiago de Surco</p></div>
                     <div>

                     <div>
                       <p class="colo font-weight-bold">Correo Electrónico</p>
                       <p class= "brr"> jruiz@corpibgroup.com</p>
                     </div>

                     <div>
                       <p class="colo font-weight-bold">Teléfono</p>
                       <p class=" brr">78846456487</p>
                     </div>

                     <div>
                       <p class="colo font-weight-bold">Redes Sociales</p>
                     </div>
                   

                       <div class="pt-3 d-flex justify-content-start">
					      <ul class="social-icons-c margin-top-20 nav"> <!-- En esta ocación se añadio "social-icons-c" , la diferencia es solo "-c2 para que se adaptara los cambios en el aumento de ionos mas grandes  -->
				           <li class="ml-auto facebook4">

							  <a class="nav-link"  href="https://www.facebook.com/IBOutplacementOficial/"><i class="fab fa-facebook-f"></i></a>
							</li>
						
							<li class="twitter4">
                                <a class="nav-link" href="https://twitter.com/IBOutplacement"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li class="instagram4">
                                <a class="nav-link" href="https://www.instagram.com/iboutplacement/"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li class="google-plus4">
                                <a class="nav-link" href="https://www.youtube.com/watch?v=ftaDuJWgqLw&ab_channel=IBoutplacement"><i class="fab fa-youtube"></i></a>
                            </li>
                            <li class="linkendin4">
                                <a class="nav-link" href="https://www.linkedin.com/company/iboutplacement"><i class="fab fa-linkedin"></i></a>
                            </li>
							<space>
                        </ul>
                       </div>
                    
 
                      </div>
                      
                
                    </div>
                    
            <div>
    <div>        
</section>
            <!-- FIN CONTACTO FORMULARIO HTML -->

            