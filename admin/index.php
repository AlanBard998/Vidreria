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

$totalCotizaciones = $conexion->query('SELECT COUNT(*) AS n FROM cotizaciones')->fetch_assoc()['n'];
$totalLlamadas = $conexion->query('SELECT COUNT(*) AS n FROM llamadas_rapidas')->fetch_assoc()['n'];
$pendientes = $conexion->query("SELECT COUNT(*) AS n FROM cotizaciones WHERE ESTADO = 'Pendiente'")->fetch_assoc()['n'];
$ultimos7dias = $conexion->query('SELECT COUNT(*) AS n FROM cotizaciones WHERE FECHA_SOLICITUD >= NOW() - INTERVAL 7 DAY')->fetch_assoc()['n'];

$ranking = [];
$rankRes = $conexion->query('SELECT TIPO_PRODUCTO, COUNT(*) AS total FROM cotizaciones GROUP BY TIPO_PRODUCTO ORDER BY total DESC');
while ($row = $rankRes->fetch_assoc()) {
    $ranking[] = $row;
}
$maxRanking = $ranking ? max(array_column($ranking, 'total')) : 0;

$recientes = $conexion->query('SELECT * FROM cotizaciones ORDER BY FECHA_SOLICITUD DESC LIMIT 8');

$pageTitle = 'Resumen General';
$activeNav = 'dashboard';
require __DIR__ . '/includes/layout_top.php';
?>

<!-- Stat cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
  <div class="bg-white rounded-xl border border-[#E2E8F0] p-5">
    <span class="text-xs font-semibold uppercase tracking-wide text-[#64748B]">Cotizaciones Totales</span>
    <div class="mt-2 font-display font-extrabold text-3xl text-[#0D2137]"><?= (int)$totalCotizaciones ?></div>
  </div>
  <div class="bg-white rounded-xl border border-[#E2E8F0] p-5">
    <span class="text-xs font-semibold uppercase tracking-wide text-[#64748B]">Últimos 7 Días</span>
    <div class="mt-2 font-display font-extrabold text-3xl text-[#0284C7]"><?= (int)$ultimos7dias ?></div>
  </div>
  <div class="bg-white rounded-xl border border-[#E2E8F0] p-5">
    <span class="text-xs font-semibold uppercase tracking-wide text-[#64748B]">Pendientes por Contactar</span>
    <div class="mt-2 font-display font-extrabold text-3xl text-[#0D2137]"><?= (int)$pendientes ?></div>
  </div>
  <div class="bg-white rounded-xl border border-[#E2E8F0] p-5">
    <span class="text-xs font-semibold uppercase tracking-wide text-[#64748B]">Llamadas Rápidas</span>
    <div class="mt-2 font-display font-extrabold text-3xl text-[#0D2137]"><?= (int)$totalLlamadas ?></div>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
  <!-- Ranking chart -->
  <div class="bg-white rounded-xl border border-[#E2E8F0] p-6">
    <h2 class="font-display font-bold text-base text-[#0D2137] mb-1">Qué se cotiza más</h2>
    <p class="text-sm text-[#64748B] mb-5">Cantidad de solicitudes por línea de producto</p>
    <?php if (!$ranking): ?>
      <p class="text-sm text-[#64748B]">Aún no hay cotizaciones registradas.</p>
    <?php else: ?>
      <div class="flex flex-col gap-4">
        <?php foreach ($ranking as $item):
          $label = $etiquetasProducto[$item['TIPO_PRODUCTO']] ?? $item['TIPO_PRODUCTO'];
          $pct = $maxRanking > 0 ? round(($item['total'] / $maxRanking) * 100) : 0;
        ?>
        <div>
          <div class="flex items-center justify-between mb-1.5">
            <span class="text-sm font-medium text-[#0D2137]"><?= htmlspecialchars($label) ?></span>
            <span class="text-sm font-semibold text-[#0284C7]"><?= (int)$item['total'] ?></span>
          </div>
          <div class="h-2.5 w-full rounded-full bg-[#E2E8F0] overflow-hidden">
            <div class="h-full rounded-full bg-[#0284C7]" style="width: <?= max($pct, 4) ?>%"></div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- Recent quotes -->
  <div class="bg-white rounded-xl border border-[#E2E8F0] p-6">
    <h2 class="font-display font-bold text-base text-[#0D2137] mb-1">Últimas Cotizaciones</h2>
    <p class="text-sm text-[#64748B] mb-5">Solicitudes más recientes del cotizador</p>
    <div class="flex flex-col divide-y divide-[#E2E8F0]">
      <?php if ($recientes->num_rows === 0): ?>
        <p class="text-sm text-[#64748B] py-2">Aún no hay cotizaciones registradas.</p>
      <?php endif; ?>
      <?php while ($row = $recientes->fetch_assoc()): ?>
      <div class="py-3 flex items-center justify-between gap-3">
        <div class="min-w-0">
          <p class="text-sm font-semibold text-[#0D2137] truncate"><?= htmlspecialchars($row['CLIENTE_NOMBRE']) ?></p>
          <p class="text-xs text-[#64748B] truncate"><?= htmlspecialchars($etiquetasProducto[$row['TIPO_PRODUCTO']] ?? $row['TIPO_PRODUCTO']) ?> · <?= htmlspecialchars($row['CLIENTE_UBICACION']) ?></p>
        </div>
        <span class="shrink-0 text-xs font-semibold px-2.5 py-1 rounded-full <?= $row['ESTADO'] === 'Pendiente' ? 'bg-[#FFDAD6] text-[#93000A]' : 'bg-[#E0F2FE] text-[#0284C7]' ?>">
          <?= htmlspecialchars($row['ESTADO']) ?>
        </span>
      </div>
      <?php endwhile; ?>
    </div>
    <a href="cotizaciones.php" class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-[#0284C7] hover:text-[#0D2137]">
      Ver todas las cotizaciones
      <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
    </a>
  </div>
</div>

<?php
$conexion->close();
require __DIR__ . '/includes/layout_bottom.php';
