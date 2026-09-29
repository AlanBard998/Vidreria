<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../Conexion.php';

if (!empty($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit;
}

$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($usuario === '' || $password === '') {
        $error = 'Debe ingresar usuario y contraseña.';
    } else {
        $stmt = $conexion->prepare('SELECT Id, PASSWORD_HASH, NOMBRE FROM administradores WHERE USUARIO = ?');
        $stmt->bind_param('s', $usuario);
        $stmt->execute();
        $admin = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if ($admin && password_verify($password, $admin['PASSWORD_HASH'])) {
            session_regenerate_id(true);
            $_SESSION['admin_id'] = $admin['Id'];
            $_SESSION['admin_nombre'] = $admin['NOMBRE'];
            header('Location: index.php');
            exit;
        }

        $error = 'Usuario o contraseña incorrectos.';
    }
}

$conexion->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ingresar · Panel Administrativo</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#0D2137] min-h-screen flex items-center justify-center px-4">
  <div class="w-full max-w-sm bg-white rounded-2xl shadow-2xl p-8">
    <div class="flex flex-col items-center gap-2 mb-6">
      <div class="w-12 h-12 rounded-xl bg-[#0284C7] text-white flex items-center justify-center font-bold" style="font-family:'Plus Jakarta Sans',sans-serif;">VL</div>
      <h1 class="font-bold text-lg text-[#0D2137]" style="font-family:'Plus Jakarta Sans',sans-serif;">Vidriería Lagos</h1>
      <p class="text-sm text-[#64748B]">Panel Administrativo</p>
    </div>
    <?php if ($error): ?>
    <div class="mb-4 px-4 py-3 rounded-lg bg-[#FFDAD6] text-[#93000A] text-sm font-medium">
      <?= htmlspecialchars($error) ?>
    </div>
    <?php endif; ?>
    <form method="post" class="flex flex-col gap-4">
      <div class="flex flex-col gap-1.5">
        <label class="text-sm font-semibold text-[#0D2137]">Usuario</label>
        <input type="text" name="usuario" required autofocus
               class="h-11 px-3 border border-[#CBD5E1] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0284C7]">
      </div>
      <div class="flex flex-col gap-1.5">
        <label class="text-sm font-semibold text-[#0D2137]">Contraseña</label>
        <input type="password" name="password" required
               class="h-11 px-3 border border-[#CBD5E1] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0284C7]">
      </div>
      <button type="submit" class="mt-2 h-11 rounded-lg bg-[#0D2137] text-white font-semibold hover:bg-[#0284C7] transition-colors">
        Ingresar
      </button>
    </form>
  </div>
</body>
</html>
