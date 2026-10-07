<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// 1. Generar token CSRF si no existe en la sesión actual
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// 2. Validar token globalmente para cualquier formulario POST dentro del panel
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        // Detiene la ejecución si el token es inválido o no viene
        die('Error de seguridad: Token CSRF inválido o ausente. Petición rechazada.');
    }
}