<?php

require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/../Conexion.php';

$estadosValidos = ['Pendiente', 'Contactado'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['estado'])) {
    $id = (int)$_POST['id'];
    $estado = $_POST['estado'];
    if (in_array($estado, $estadosValidos, true)) {
        $stmt = $conexion->prepare('UPDATE llamadas_rapidas SET ESTADO = ? WHERE Id = ?');
        $stmt->bind_param('si', $estado, $id);
        $stmt->execute();
        $stmt->close();
    }
    header('Location: llamadas.php');
    exit;
}

$llamadas = $conexion->query('SELECT * FROM llamadas_rapidas ORDER BY FECHA_SOLICITUD DESC');

$pageTitle = 'Llamadas Rápidas';
$activeNav = 'llamadas';
require __DIR__ . '/includes/layout_top.php';
?>

<div class="bg-white rounded-xl border border-[#E2E8F0] overflow-hidden">
  <div class="overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-[#F8FAFC] text-[#64748B] uppercase text-xs tracking-wide">
      <tr>
        <th class="text-left px-4 py-3">Fecha</th>
        <th class="text-left px-4 py-3">Nombre</th>
        <th class="text-left px-4 py-3">Teléfono</th>
        <th class="text-left px-4 py-3">Estado</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-[#E2E8F0]">
      <?php if ($llamadas->num_rows === 0): ?>
      <tr><td colspan="4" class="px-4 py-6 text-center text-[#64748B]">Aún no hay solicitudes de llamada.</td></tr>
      <?php endif; ?>
      <?php while ($row = $llamadas->fetch_assoc()): ?>
      <tr>
        <td class="px-4 py-3 whitespace-nowrap text-[#64748B]"><?= htmlspecialchars(date('d-m-Y H:i', strtotime($row['FECHA_SOLICITUD']))) ?></td>
        <td class="px-4 py-3 font-medium text-[#0D2137]"><?= htmlspecialchars($row['NOMBRE']) ?></td>
        <td class="px-4 py-3 text-[#64748B]"><?= htmlspecialchars($row['TELEFONO']) ?></td>
        <td class="px-4 py-3">
          <form method="post" class="flex items-center gap-2">
            <input type="hidden" name="id" value="<?= (int)$row['Id'] ?>">
            <select name="estado" onchange="this.form.submit()" class="text-xs font-semibold rounded-lg border border-[#CBD5E1] px-2 py-1.5 focus:outline-none focus:ring-2 focus:ring-[#0284C7]">
              <?php foreach ($estadosValidos as $estado): ?>
              <option value="<?= $estado ?>" <?= $row['ESTADO'] === $estado ? 'selected' : '' ?>><?= $estado ?></option>
              <?php endforeach; ?>
            </select>
          </form>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
  </div>
</div>

<?php
$conexion->close();
require __DIR__ . '/includes/layout_bottom.php';
