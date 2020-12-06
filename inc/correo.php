<?php

$nombre = '';
$empresa = '';
$telefono = '';
$correo = '';
$mensaje = '';

if(isset($_POST)){
    if(isset($_POST['nombre'])){
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['empresa'])){
        $empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['correo'])){
        $correo = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['correo']);    
        $correo = filter_var($correo, FILTER_VALIDATE_EMAIL);
    }
    
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $mensaje = $_POST['mensaje'];

    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $correo . "\r\n";

    $msj = "Nombre: " . $nombre;
    $msj .= "Empresa: " . $empresa . " \r\n ";
    $msj .= "Teléfono: " . $telefono . " \r\n ";
    $msj .= "Correo: " . $correo . " \r\n ";
    $msj .= "Mensaje: " . $mensaje  . " \r\n ";

    $mail = "info@brokenjobs.com.mx";

    $asunto = "Mensaje de " . $nombre . "Desde sitio Web";

    if(mail($mail, $asunto, $msj, $headers)){
        echo '<p class="tc"> Gracias, se ha enviado correctamente <a class="btn btn-main" href="https://brokenjobs.com.mx"> Volver a inicio </a> </p>';
        header("Location: https://brokenjobs.com.mx");
        die();
    } else {
        echo '<p class="tc"> Hubo un error al enviar mensaje, si es posible comunicarse con el administrado </p>';
        header("Location: contacto.php");
    }

} else {
    echo '<p class="tc"> Hubo un erro </p>';
    header("Location: contacto.php");
}

?>