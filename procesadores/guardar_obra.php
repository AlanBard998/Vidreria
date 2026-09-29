<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/Conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

// 1. Capturar datos del cliente
$clienteNombre = trim($_POST['cliente_nombre'] ?? '');
$clienteTelefono = trim($_POST['cliente_telefono'] ?? '');
$clienteEmail = trim($_POST['cliente_email'] ?? '');
$clienteUbicacion = trim($_POST['cliente_ubicacion'] ?? '');

// 2. Validar que vengan los datos principales
if (!$clienteNombre || !$clienteTelefono || !$clienteEmail || !$clienteUbicacion) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Faltan datos de contacto obligatorios.']);
    exit;
}

// 3. Capturar los arrays de ventanas
// Al usar name="ubicacion[]" en HTML, PHP los recibe automáticamente como arrays (listas)
$ubicaciones = $_POST['ubicacion'] ?? [];
$anchos = $_POST['ancho'] ?? [];
$altos = $_POST['alto'] ?? [];
$aperturas = $_POST['apertura'] ?? [];
$materiales = $_POST['material'] ?? [];

if (empty($ubicaciones) || count($ubicaciones) === 0) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Debe incluir al menos un paño/ventana en su cotización.']);
    exit;
}

// 4. Iniciar transacción (Asegura que si falla una ventana, no se guarde nada a medias)
$conexion->begin_transaction();

try {
    // A) Insertar el proyecto/cliente
    $stmtObra = $conexion->prepare('INSERT INTO obras_mayores (cliente_nombre, cliente_telefono, cliente_email, cliente_ubicacion) VALUES (?, ?, ?, ?)');
    $stmtObra->bind_param('ssss', $clienteNombre, $clienteTelefono, $clienteEmail, $clienteUbicacion);
    $stmtObra->execute();
    
    // Obtener el ID recién creado para este cliente
    $obraId = $stmtObra->insert_id; 
    $stmtObra->close();

    // B) Insertar cada ventana enlazada al ID del cliente
    $stmtDetalle = $conexion->prepare('INSERT INTO obras_detalle (obra_id, ubicacion, ancho, alto, apertura, material) VALUES (?, ?, ?, ?, ?, ?)');
    
    // Recorremos el array de ventanas
    for ($i = 0; $i < count($ubicaciones); $i++) {
        $ubi = trim($ubicaciones[$i]);
        $anc = floatval($anchos[$i]);
        $alt = floatval($altos[$i]);
        $ape = trim($aperturas[$i]);
        $mat = trim($materiales[$i]);

        $stmtDetalle->bind_param('isddss', $obraId, $ubi, $anc, $alt, $ape, $mat);
        $stmtDetalle->execute();
    }
    $stmtDetalle->close();

    // C) Confirmar guardado
    $conexion->commit();
    echo json_encode(['success' => true, 'id_obra' => $obraId]);

} catch (Exception $e) {
    // Si algo falla, deshacemos todo para evitar datos basura
    $conexion->rollback();
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error al guardar el proyecto. Intente nuevamente.']);
}

$conexion->close();