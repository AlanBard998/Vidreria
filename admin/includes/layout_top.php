<?php
$pageTitle = $pageTitle ?? 'Panel Administrativo';
$activeNav = $activeNav ?? '';

$navItems = [
    'dashboard' => ['href' => 'index.php', 'label' => 'Resumen', 'icon' => 'dashboard'],
    'cotizaciones' => ['href' => 'cotizaciones.php', 'label' => 'Cotizaciones', 'icon' => 'request_quote'],
    'llamadas' => ['href' => 'llamadas.php', 'label' => 'Llamadas Rápidas', 'icon' => 'phone_callback'],
    'precios' => ['href' => 'precios.php', 'label' => 'Precios', 'icon' => 'sell'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle) ?> · Vidriería Lagos</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>
  body { font-family: 'Inter', sans-serif; }
  .font-display { font-family: 'Plus Jakarta Sans', sans-serif; }
  .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 500; }
</style>
</head>
<body class="bg-[#F8FAFC] text-[#0B1C30] antialiased">
<div class="flex min-h-screen">
  <!-- Sidebar -->
  <aside class="w-64 bg-[#0D2137] text-white flex flex-col shrink-0">
    <div class="h-20 flex items-center gap-3 px-6 border-b border-white/10">
      <div class="w-9 h-9 rounded-lg bg-[#0284C7] flex items-center justify-center font-bold font-display">VL</div>
      <div class="flex flex-col leading-tight">
        <span class="font-display font-bold text-sm uppercase tracking-wide">Vidriería Lagos</span>
        <span class="text-[11px] text-[#93CCFF] uppercase tracking-widest">Panel Administrativo</span>
      </div>
    </div>
    <nav class="flex-1 px-3 py-6 flex flex-col gap-1">
      <?php foreach ($navItems as $key => $item): ?>
      <a href="<?= htmlspecialchars($item['href']) ?>"
         class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors <?= $activeNav === $key ? 'bg-[#0284C7] text-white' : 'text-[#B5C8E5] hover:bg-white/10 hover:text-white' ?>">
        <span class="material-symbols-outlined text-[20px]"><?= $item['icon'] ?></span>
        <?= htmlspecialchars($item['label']) ?>
      </a>
      <?php endforeach; ?>
    </nav>
    <div class="px-3 py-4 border-t border-white/10">
      <div class="px-3 py-2 text-xs text-[#B5C8E5] truncate">Sesión: <?= htmlspecialchars($_SESSION['admin_nombre'] ?? '') ?></div>
      <a href="perfil.php" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium <?= $activeNav === 'perfil' ? 'bg-[#0284C7] text-white' : 'text-[#B5C8E5] hover:bg-white/10 hover:text-white' ?> transition-colors">
        <span class="material-symbols-outlined text-[20px]">person</span>
        Mi Cuenta
      </a>
      <a href="logout.php" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-[#B5C8E5] hover:bg-white/10 hover:text-white transition-colors">
        <span class="material-symbols-outlined text-[20px]">logout</span>
        Cerrar sesión
      </a>
    </div>
  </aside>
  <!-- Main content -->
  <main class="flex-1 min-w-0">
    <header class="h-20 bg-white border-b border-[#E2E8F0] flex items-center px-8">
      <h1 class="font-display font-bold text-xl text-[#0D2137]"><?= htmlspecialchars($pageTitle) ?></h1>
    </header>
    <div class="p-8">
