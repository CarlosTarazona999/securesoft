<div class="container">
    <form method="POST">
        <div class="container mt-5 mb-5 text-center form-group">
            <h3>Recuperar Cuenta</h3>
            <p>Por favor introduce tu cuenta de correo electronico</p>
            <input class="form-control" type="text" name="correo"><br>
            <input type="submit" value="Recuperar" class="btn btn-primary boton-login mt-1" style="background-color:#9a2442; margin-bottom: 320px;">
        </div>
        <?php
        $activa = new ControladorLogin();
        $activa->EnviarCorreoRecuperarCuenta();
        ?>
    </form>
</div>