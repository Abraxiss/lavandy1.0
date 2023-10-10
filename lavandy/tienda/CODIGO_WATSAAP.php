<?php
function generarEnlaceWhatsApp($numero, $mensaje) {
    // Encode the message, maintaining line breaks
    $mensajeCodificado = rawurlencode($mensaje);

    // Replace spaces with the representation URL (%20)
    $mensajeCodificado = str_replace(' ', '%20', $mensajeCodificado);

    // Replace commas with %2C
    $mensajeCodificado = str_replace(',', '%2C', $mensajeCodificado);

    // Replace line breaks with the representation URL (%0A)
    $mensajeCodificado = str_replace('%0D%0A', '%0A', $mensajeCodificado);

    // Formatea el número y el mensaje para ser parte del enlace
    $numeroWhatsApp = str_replace('+', '', $numero);

    // Construye el enlace con la etiqueta <a>
    $enlaceWhatsApp = "https://api.whatsapp.com/send?phone=$numeroWhatsApp&text=$mensajeCodificado";

    return $enlaceWhatsApp;
}

// Ejemplo de uso
$numero = '51953724690';  // Número de WhatsApp
$mensaje = "111 Confirmamos.
Nuestro equipo recogerlas.
Si necesitas , con anticipación.";

$enlaceWhatsApp = generarEnlaceWhatsApp($numero, $mensaje);
echo "$enlaceWhatsApp";
?>


$firma = "%0A%0A%C2%A1Gracias%20por%20confiar%20en%20Lavandy!%0A%0AAtentamente,%0AEquipo%20Lavandy\nwww.lavandy.net"

 $vinculo =%0A%0Awww.lavandy.net
