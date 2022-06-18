<?php
$nombre  = $_POST['nombre'];
$mail =  $_POST['email'];
$mensaje = $_POST['mensaje'];
$fecha = 'Enviado:' . date("Y-m-d H:i:s") . "\n";
$para = 'jruiz@corpibgroup.com';
$asunto = 'CONTACTENOS-IBTRABAJA';
$message = "Nombre y apellidos : $nombre \n"
            ."Correo : $mail \n"
            ."Asunto : $asunto \n"
            ."Mensaje : $mensaje \n"
            ."Fecha : $fecha";

mail($para, $asunto, $message);
echo "correo enviado";

?>