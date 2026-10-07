<?php

require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/../Conexion.php';

$mensaje = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conexion->begin_transaction();
    try {
        $stmtLinea = $conexion->prepare('UPDATE lineas_perfiles SET PRECIOBASE = ? WHERE Id = ?');
        foreach ($_POST['linea'] ?? [] as $id => $precio) {
            $id = (int)$id;
            $precio = (float)str_replace(',', '.', $precio);
            if ($precio < 0) {
                throw new Exception('El precio no puede ser negativo.');
            }
            $stmtLinea->bind_param('di', $precio, $id);
            $stmtLinea->execute();
        }
        $stmtLinea->close();

        $stmtCristal = $conexion->prepare('UPDATE tipos_cristal SET PRECIO_METRO_CUADRADO = ? WHERE Id = ?');
        foreach ($_POST['cristal'] ?? [] as $id => $precio) {
            $id = (int)$id;
            $precio = (float)str_replace(',', '.', $precio);
            if ($precio < 0) {
                throw new Exception('El precio no puede ser negativo.');
            }
            $stmtCristal->bind_param('di', $precio, $id);
            $stmtCristal->execute();
        }
        $stmtCristal->close();

        $conexion->commit();
        $mensaje = ['tipo' => 'ok', 'texto' => 'Precios actualizados correctamente.'];
    } catch (Exception $e) {
        $conexion->rollback();
        $mensaje = ['tipo' => 'error', 'texto' => 'No se pudieron guardar los precios: ' . $e->getMessage()];
    }
}

$materiales = [];
$matRes = $conexion->query('SELECT Id, NOMBRE FROM materiales ORDER BY NOMBRE');
while ($m = $matRes->fetch_assoc()) {
    $m['lineas'] = [];
    $materiales[$m['Id']] = $m;
}

$lineaRes = $conexion->query('SELECT Id, MATERIAL_ID, NOMBRE, PRECIOBASE FROM lineas_perfiles ORDER BY NOMBRE');
while ($l = $lineaRes->fetch_assoc()) {
    if (isset($materiales[$l['MATERIAL_ID']])) {
        $materiales[$l['MATERIAL_ID']]['lineas'][] = $l;
    }
}

$tiposCristal = $conexion->query('SELECT Id, TIPO, PRECIO_METRO_CUADRADO FROM tipos_cristal ORDER BY TIPO');

$pageTitle = 'Precios';
$activeNav = 'precios';
require __DIR__ . '/includes/layout_top.php';
?>

<?php if ($mensaje): ?>
<div class="mb-6 px-4 py-3 rounded-lg text-sm font-medium <?= $mensaje['tipo'] === 'ok' ? 'bg-[#E0F2FE] text-[#0284C7]' : 'bg-[#FFDAD6] text-[#93000A]' ?>">
  <?= htmlspecialchars($mensaje['texto']) ?>
</div>
<?php endif; ?>

<form method="post" class="flex flex-col gap-6">

  <div class="bg-white rounded-xl border border-[#E2E8F0] p-6">
    <h2 class="font-display font-bold text-base text-[#0D2137] mb-1" style="font-family:'Plus Jakarta Sans',sans-serif;">Líneas de Perfilería</h2>
    <p class="text-sm text-[#64748B] mb-5">Precio base por unidad, usado como referencia en las cotizaciones automáticas.</p>
    <div class="flex flex-col gap-6">
      <?php foreach ($materiales as $material): ?>
      <div>
        <h3 class="text-xs font-semibold uppercase tracking-wide text-[#64748B] mb-3"><?= htmlspecialchars($material['NOMBRE']) ?></h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
          <?php foreach ($material['lineas'] as $linea): ?>
          <div class="border border-[#E2E8F0] rounded-lg p-3">
            <label class="text-sm font-medium text-[#0D2137] block mb-1.5"><?= htmlspecialchars($linea['NOMBRE']) ?></label>
            <div class="flex items-center gap-1">
              <span class="text-sm text-[#64748B]">$</span>
              <input type="number" step="1" min="0" name="linea[<?= (int)$linea['Id'] ?>]" value="<?= htmlspecialchars($linea['PRECIOBASE']) ?>"
                    class="w-full h-10 px-2 border border-[#CBD5E1] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0284C7]">
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="bg-white rounded-xl border border-[#E2E8F0] p-6">
    <h2 class="font-display font-bold text-base text-[#0D2137] mb-1" style="font-family:'Plus Jakarta Sans',sans-serif;">Tipos de Cristal</h2>
    <p class="text-sm text-[#64748B] mb-5">Precio por metro cuadrado (m²).</p>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
      <?php while ($cristal = $tiposCristal->fetch_assoc()): ?>
      <div class="border border-[#E2E8F0] rounded-lg p-3">
        <label class="text-sm font-medium text-[#0D2137] block mb-1.5"><?= htmlspecialchars($cristal['TIPO']) ?></label>
        <div class="flex items-center gap-1">
          <span class="text-sm text-[#64748B]">$</span>
          <input type="number" step="1" min="0" name="cristal[<?= (int)$cristal['Id'] ?>]" value="<?= htmlspecialchars($cristal['PRECIO_METRO_CUADRADO']) ?>"
                class="w-full h-10 px-2 border border-[#CBD5E1] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#0284C7]">
          <span class="text-xs text-[#64748B] whitespace-nowrap">/ m²</span>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>

  <div>
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
      
    <button type="submit" class="inline-flex items-center gap-2 h-11 px-6 rounded-xl bg-[#0D2137] text-white font-semibold hover:bg-[#0284C7] transition-colors">
      <span class="material-symbols-outlined text-[18px]">save</span>
      Guardar cambios
    </button>
  </div>
</form>

<?php
$conexion->close();
require __DIR__ . '/includes/layout_bottom.php';
