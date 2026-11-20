<?php
// index.php - Controlador del formulario de contacto

$errores = [];
$nombre = '';
$correo = '';
$mensaje = '';
$enviado = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar y limpiar los datos enviados
    $nombre  = trim($_POST['nombre'] ?? '');
    $correo  = trim($_POST['correo'] ?? '');
    $mensaje = trim($_POST['mensaje'] ?? '');

    // Los tres campos son obligatorios
    if ($nombre === '') {
        $errores['nombre'] = 'Escribe tu nombre.';
    }

    if ($correo === '') {
        $errores['correo'] = 'Escribe tu correo.';
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores['correo'] = 'Escribe un correo válido.';
    }

    if ($mensaje === '') {
        $errores['mensaje'] = 'Escribe tu mensaje.';
    }

    // Solo se acepta el formulario si no hay errores
    if (empty($errores)) {
        $enviado = true;
    }
}

require __DIR__ . '/index.view.php';
