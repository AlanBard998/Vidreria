<?php

require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/../Conexion.php';

$mensaje = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $actual = $_POST['password_actual'] ?? '';
    $nueva = $_POST['password_nueva'] ?? '';
    $confirmar = $_POST['password_confirmar'] ?? '';

    $stmt = $conexion->prepare('SELECT PASSWORD_HASH FROM administradores WHERE Id = ?');
    $stmt->bind_param('i', $_SESSION['admin_id']);
    $stmt->execute();
    $admin = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$admin || !password_verify($actual, $admin['PASSWORD_HASH'])) {
        $mensaje = ['tipo' => 'error', 'texto' => 'La contraseña actual no es correcta.'];
    } elseif (strlen($nueva) < 8) {
        $mensaje = ['tipo' => 'error', 'texto' => 'La nueva contraseña debe tener al menos 8 caracteres.'];
    } elseif ($nueva !== $confirmar) {
        $mensaje = ['tipo' => 'error', 'texto' => 'La confirmación no coincide con la nueva contraseña.'];
    } else {
        $hash = password_hash($nueva, PASSWORD_BCRYPT);
        $stmt = $conexion->prepare('UPDATE administradores SET PASSWORD_HASH = ? WHERE Id = ?');
        $stmt->bind_param('si', $hash, $_SESSION['admin_id']);
        $stmt->execute();
        $stmt->close();
        $mensaje = ['tipo' => 'ok', 'texto' => 'Contraseña actualizada correctamente.'];
    }
}

$conexion->close();

$pageTitle = 'Mi Cuenta';
$activeNav = 'perfil';
require __DIR__ . '/includes/layout_top.php';
?>

<?php if ($mensaje): ?>
<div class="mb-6 px-4 py-3 rounded-lg text-sm font-medium <?= $mensaje['tipo'] === 'ok' ? 'bg-[#E0F2FE] text-[#0284C7]' : 'bg-[#FFDAD6] text-[#93000A]' ?>">
  <?= htmlspecialchars($mensaje['texto']) ?>
</div>
<?php endif; ?>

<div class="bg-white rounded-xl border border-[#E2E8F0] p-6 max-w-md">
  <h2 class="font-display font-bold text-base text-[#0D2137] mb-1" style="font-family:'Plus Jakarta Sans',sans-serif;">Cambiar Contraseña</h2>
  <p class="text-sm text-[#64748B] mb-5">Sesión activa: <?= htmlspecialchars($_SESSION['admin_nombre'] ?? '') ?></p>
  <form method="post" class="flex flex-col gap-4">
    <div class="flex flex-col gap-1.5">
      <label class="text-sm font-semibold text-[#0D2137]">Contraseña actual</label>
      <input type="password" name="password_actual" required
             class="h-11 px-3 border border-[#CBD5E1] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0284C7]">
    </div>
    <div class="flex flex-col gap-1.5">
      <label class="text-sm font-semibold text-[#0D2137]">Nueva contraseña</label>
      <input type="password" name="password_nueva" required minlength="8"
             class="h-11 px-3 border border-[#CBD5E1] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0284C7]">
      <span class="text-xs text-[#64748B]">Mínimo 8 caracteres.</span>
    </div>
    <div class="flex flex-col gap-1.5">
      <label class="text-sm font-semibold text-[#0D2137]">Confirmar nueva contraseña</label>
      <input type="password" name="password_confirmar" required minlength="8"
             class="h-11 px-3 border border-[#CBD5E1] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0284C7]">
    </div>
    <button type="submit" class="mt-2 inline-flex items-center justify-center gap-2 h-11 rounded-xl bg-[#0D2137] text-white font-semibold hover:bg-[#0284C7] transition-colors">
      <span class="material-symbols-outlined text-[18px]">lock_reset</span>
      Actualizar Contraseña
    </button>
  </form>
</div>

<?php
require __DIR__ . '/includes/layout_bottom.php';
