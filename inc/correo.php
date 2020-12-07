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
    .'From: noreplay@brokenjobs.com.mx \r\n';

    $msj = "Nombre: " . $nombre . " \n \r\n ";
    $msj .= "Empresa: " . $empresa . " \n \r\n ";
    $msj .= "Teléfono: " . $telefono . " \n \r\n ";
    $msj .= "Correo: " . $correo . " \n \r\n ";
    $msj .= "Mensaje: " . $mensaje  . " \n \r\n ";

    $mail = "info@brokenjobs.com.mx," . $correo;

    $asunto = "Mensaje de " . $nombre . "Desde sitio Web";

    if(mail($mail, $asunto, $msj, $headers)){
        header("Location: https://brokenjobs.com.mx");
        echo '<p class="tc"> Gracias, se ha enviado correctamente, nos pondremos en contacto lo antes posible </p> <p class="tc"> <a class="btn btn-main" href="https://brokenjobs.com.mx"> Volver a inicio </a> </p>';
        die();
    } else {
        header("Location: contacto.php");
        echo '<p class="tc"> Hubo un error al enviar mensaje, si es posible comunicarse con el administrado </p> <p class="tc"> <a class="btn btn-main" href="https://brokenjobs.com.mx"> Volver a inicio </a> </p>';
    }

} else {
    echo '<p class="tc"> Hubo un erro </p> <p class="tc"> <a class="btn btn-main" href="https://brokenjobs.com.mx"> Volver a inicio </a> </p>';
    header("Location: contacto.php");
    die();
}

?>