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

    $msj = "<h3>Mensaje desde el sitio web de BrokenJobs</h3>";
    $msj .= "<h4>Nombre: <p>" . $nombre . "</p> \n \r\n</h4>";
    $msj .= "<h4>Empresa: <p>" . $empresa . "</p> \n \r\n</h4>";
    $msj .= "<h4>Teléfono: <p>" . $telefono . "</p> \n \r\n</h4>";
    $msj .= "<h4>Correo: <p>" . $correo . "</p> \n \r\n</h4>";
    $msj .= "<h4>Mensaje: <p>" . $mensaje  . "</p> \n \r\n</h4>";
    $msj .= "<br><br> <p>Gracias por comunicarte con nosotros</p>";
    $msj .= "<p>Nos comunicaremos lo antes posible</p><br>";
    $msj .= "<b>Brokenjobs - Diseñando las mejores paginas</b>";
    $msj .= "<p>Teléfono:  +52 56 2189 0948</p>";
    $msj .= "<p>info@brokenjobs.com.mx</p>";


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