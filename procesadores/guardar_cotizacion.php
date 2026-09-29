<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/Conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
    exit;
}

function campo($nombre, $default = null) {
    $valor = $_POST[$nombre] ?? $default;
    return is_string($valor) ? trim($valor) : $valor;
}

// 1. Capturar datos de texto (Agrupando las nuevas opciones)
$productType = campo('product_type');

// Capturar medidas dependiendo de lo que eligieron
$width = campo('espejo_ancho') ?: campo('ventana_ancho');
$height = campo('espejo_alto') ?: campo('ventana_alto');
$opening = campo('ventana_apertura');
$quantity = campo('ventana_cantidad');
$finish = campo('ventana_material') ?: campo('cristal_tipo'); // Reusando campo ACABADO para tipo
$notes = campo('reparacion_desc') ?: campo('notas'); // Juntando notas o descripciones

// Datos del cliente obligatorios
$clientName = campo('client_name');
$clientPhone = campo('client_phone');
$clientEmail = campo('client_email');
$clientLocation = campo('client_location');

// Validaciones básicas
$errores = [];
if (!$productType) $errores[] = 'Debe seleccionar un tipo de producto.';
if (!$clientName) $errores[] = 'El nombre es obligatorio.';
if (!$clientPhone) $errores[] = 'El teléfono es obligatorio.';
if (!$clientEmail || !filter_var($clientEmail, FILTER_VALIDATE_EMAIL)) $errores[] = 'El correo electrónico no es válido.';
if (!$clientLocation) $errores[] = 'La comuna o ciudad es obligatoria.';

if ($errores) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => implode(' ', $errores)]);
    exit;
}

// 2. LÓGICA PARA GUARDAR LA FOTO
$fotoNombre = null; // Por defecto no hay foto
$carpetaDestino = __DIR__ . '/uploads/';

// Buscamos si viene alguna foto en los 4 posibles campos
$camposFoto = ['cristal_foto', 'espejo_foto', 'ventana_foto', 'reparacion_foto'];

foreach ($camposFoto as $campo) {
    if (isset($_FILES[$campo]) && $_FILES[$campo]['error'] === UPLOAD_ERR_OK) {
        $nombreOriginal = $_FILES[$campo]['name'];
        $tmpName = $_FILES[$campo]['tmp_name'];
        
        // Obtener la extensión (jpg, png, etc)
        $extension = strtolower(pathinfo($nombreOriginal, PATHINFO_EXTENSION));
        
        // Validar que sea realmente una imagen
        $extensionesValidas = ['jpg', 'jpeg', 'png', 'webp'];
        if (in_array($extension, $extensionesValidas)) {
            // Generar un nombre único (ejemplo: 6511a123b.jpg)
            $fotoNombre = uniqid() . '.' . $extension;
            $rutaFinal = $carpetaDestino . $fotoNombre;
            
            // Mover la foto de la memoria temporal a la carpeta uploads
            move_uploaded_file($tmpName, $rutaFinal);
        }
        break; // Si ya encontró y procesó la foto, sale del bucle
    }
}

// 3. INSERTAR EN LA BASE DE DATOS (Ahora incluye la foto)
$stmt = $conexion->prepare(
    'INSERT INTO cotizaciones
        (TIPO_PRODUCTO, ANCHO, ALTO, TIPO_APERTURA, CANTIDAD, ACABADO, CLIENTE_NOMBRE, CLIENTE_TELEFONO, CLIENTE_EMAIL, CLIENTE_UBICACION, NOTAS, foto)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
);

// Agregamos una "s" más al bind_param para la foto
$stmt->bind_param(
    'ssssssssssss',
    $productType,
    $width,
    $height,
    $opening,
    $quantity,
    $finish,
    $clientName,
    $clientPhone,
    $clientEmail,
    $clientLocation,
    $notes,
    $fotoNombre
);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'id' => $stmt->insert_id]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'No se pudo guardar la cotización, intente nuevamente.']);
}

$stmt->close();
$conexion->close();