<?php

require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/../Conexion.php';

$etiquetasProducto = [
    'termopanel' => 'Termopanel (DVH)',
    'pvc-europeo' => 'PVC Europeo',
    'pvc-americano' => 'PVC Americano',
    'aluminio-qt' => 'Aluminio Línea QT',
    'shower-templado' => 'Shower Doors & Templados',
    'cierre-terraza' => 'Cierres de Terraza',
];
$estadosValidos = ['Pendiente', 'Contactado', 'Cerrado'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['estado'])) {
    $id = (int)$_POST['id'];
    $estado = $_POST['estado'];
    if (in_array($estado, $estadosValidos, true)) {
        $stmt = $conexion->prepare('UPDATE cotizaciones SET ESTADO = ? WHERE Id = ?');
        $stmt->bind_param('si', $estado, $id);
        $stmt->execute();
        $stmt->close();
    }
    header('Location: cotizaciones.php' . (isset($_GET['estado']) ? '?estado=' . urlencode($_GET['estado']) : ''));
    exit;
}

$filtro = $_GET['estado'] ?? '';
if (in_array($filtro, $estadosValidos, true)) {
    $stmt = $conexion->prepare('SELECT * FROM cotizaciones WHERE ESTADO = ? ORDER BY FECHA_SOLICITUD DESC');
    $stmt->bind_param('s', $filtro);
    $stmt->execute();
    $cotizaciones = $stmt->get_result();
} else {
    $filtro = '';
    $cotizaciones = $conexion->query('SELECT * FROM cotizaciones ORDER BY FECHA_SOLICITUD DESC');
}

$pageTitle = 'Cotizaciones';
$activeNav = 'cotizaciones';
require __DIR__ . '/includes/layout_top.php';
?>

<div class="flex items-center gap-2 mb-6">
  <a href="cotizaciones.php" class="px-3 py-1.5 rounded-lg text-sm font-medium <?= $filtro === '' ? 'bg-[#0D2137] text-white' : 'bg-white border border-[#E2E8F0] text-[#0D2137]' ?>">Todas</a>
  <?php foreach ($estadosValidos as $estado): ?>
  <a href="cotizaciones.php?estado=<?= urlencode($estado) ?>" class="px-3 py-1.5 rounded-lg text-sm font-medium <?= $filtro === $estado ? 'bg-[#0D2137] text-white' : 'bg-white border border-[#E2E8F0] text-[#0D2137]' ?>"><?= $estado ?></a>
  <?php endforeach; ?>
</div>

<div class="bg-white rounded-xl border border-[#E2E8F0] overflow-hidden">
  <div class="overflow-x-auto">
  <table class="w-full text-sm">
    <thead class="bg-[#F8FAFC] text-[#64748B] uppercase text-xs tracking-wide">
      <tr>
        <th class="text-left px-4 py-3">Fecha</th>
        <th class="text-left px-4 py-3">Producto</th>
        <th class="text-left px-4 py-3">Medidas</th>
        <th class="text-left px-4 py-3">Cliente</th>
        <th class="text-left px-4 py-3">Contacto</th>
        <th class="text-left px-4 py-3">Ubicación</th>
        <th class="text-left px-4 py-3">Estado</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-[#E2E8F0]">
      <?php if ($cotizaciones->num_rows === 0): ?>
      <tr><td colspan="7" class="px-4 py-6 text-center text-[#64748B]">No hay cotizaciones para este filtro.</td></tr>
      <?php endif; ?>
      <?php while ($row = $cotizaciones->fetch_assoc()): ?>
      <tr class="align-top">
        <td class="px-4 py-3 whitespace-nowrap text-[#64748B]"><?= htmlspecialchars(date('d-m-Y H:i', strtotime($row['FECHA_SOLICITUD']))) ?></td>
        <td class="px-4 py-3 font-medium text-[#0D2137]"><?= htmlspecialchars($etiquetasProducto[$row['TIPO_PRODUCTO']] ?? $row['TIPO_PRODUCTO']) ?></td>
        <td class="px-4 py-3 text-[#64748B]"><?= htmlspecialchars($row['ANCHO'] ?: '—') ?> x <?= htmlspecialchars($row['ALTO'] ?: '—') ?><br><span class="text-xs"><?= htmlspecialchars($row['CANTIDAD'] ?: '') ?> · <?= htmlspecialchars($row['ACABADO'] ?: '') ?></span></td>
        <td class="px-4 py-3 font-medium text-[#0D2137]"><?= htmlspecialchars($row['CLIENTE_NOMBRE']) ?></td>
        <td class="px-4 py-3 text-[#64748B]"><?= htmlspecialchars($row['CLIENTE_TELEFONO']) ?><br><?= htmlspecialchars($row['CLIENTE_EMAIL']) ?></td>
        <td class="px-4 py-3 text-[#64748B]"><?= htmlspecialchars($row['CLIENTE_UBICACION']) ?></td>
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
