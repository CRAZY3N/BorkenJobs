<?php

if(isset($_POST['enviar'])){
    if(!empty($_POST['nombre']) && !empty($_POST['telefono']) && !empty($_POST['email']) && !empty($_POST['mensaje']) ) {
        $nombre = $_POST['nombre'];
        $empresa = $_POST['empresa'];
        $telefono = $_POST['telefono'];
        $email = $_POST['correo'];
        $mensaje = $_POST['mensaje'];

        $mails = "info@brokenjobs.com.mx;" . $email;
        $asunto = "Solicitud del sitio BrokenJbos.com.mx";
        $msg = "Nombre: " . $nombre . "\r\n";
        $msg .= "Empresa: " . $empresa . "\r\n";
        $msg .= "Teléfono: " . $telefono . "\r\n";
        $msg .= "Email: " . $email . "\r\n";

        $header = "From: info@brokenjobs.com.mx" . "\r\n";
        $header .= "Reply-To:" . $email . "\r\n";
        $header .= "X-Mailer: PHP/" . phpversion();
        $mail = mail($mails, $asunto, $msg, $header);
        if($mail) {
            header('Location: index.html');
            echo "Enviado exitosamente";
        }

    }
}

?>