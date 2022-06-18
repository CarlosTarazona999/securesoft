<div class="container p-4">
    <div class="row py-5">
        <div class="col-12 text-center">
            <h3>Recuperar Contraseña</h3>
            <p>Por favor introduce tu cuenta de correo electronico</p>
        </div>
        <form action="" method="POST" class="col-12" style="display: flex; justify-content: center;flex-direction: column;align-items: center;">
            <input type="email" name="forgot" id="" class="form-control py-4 mb-3" placeholder="Example@example.com" required style="max-width: 450px;">
            <button type="submit" class="btn btn-secondary px-5 m-auto">Recuperar</button>

            <?php
                $respuesta = new ControladorLogin();
                $respuesta->ctrRecuperarContraseña();
            ?>
        </form>
    </div> 
</div>
