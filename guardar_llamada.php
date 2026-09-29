<?php

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/Conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

$nombre = trim($_POST['nombre'] ?? '');
$telefono = trim($_POST['telefono'] ?? '');

$errores = [];
if (!$nombre) $errores[] = 'El nombre es obligatorio.';
if (!$telefono) $errores[] = 'El teléfono es obligatorio.';

if ($errores) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errores)]);
    exit;
}

$stmt = $conexion->prepare('INSERT INTO llamadas_rapidas (NOMBRE, TELEFONO) VALUES (?, ?)');
$stmt->bind_param('ss', $nombre, $telefono);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'id' => $stmt->insert_id]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'No se pudo registrar la solicitud, intente nuevamente.']);
}

$stmt->close();
$conexion->close();
