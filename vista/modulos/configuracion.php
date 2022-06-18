<div class="cuadro1  text-muted shadow p-4  bg-white text-center">
    <h3>Configuración de cuenta</h3>
    <div class="cuadro2 shadow p-1 mx-5  bg-white">
        <h4 class="text-muted"><b>Eliminar Cuenta</b></h4>

        <label><?php echo $_SESSION['correo'] ?></label>
        <p class="contenido text-muted px-1">Si elijes eliminar tu cuenta se eliminará definitivamente de nuestra plataforma,
            se eliminará toda postulación en curso y no podrás postular a las ofertas de empleo que te brinda <b>IBLABORA.</b>
        </p>
        <form method="POST">
            <div>
                <input type="hidden" name="usuario" value="<?php echo $_SESSION["idusuario"]; ?>">
                <input type="submit" class="eliminar btn btn-danger" value="Eliminar Cuenta">
            </div>
            <?php
            $activa = new ControladorLogin();
            $activa->ctrDesactivacion();
            ?>
        </form>
    </div>
</div>