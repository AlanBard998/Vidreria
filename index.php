<!DOCTYPE html>
<html class="light" lang="es">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet" />
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet" />
  
  <title>Vidriería Lagos</title>
  
  <!-- Tailwind v4 Compilado -->
  <link href="css/style.css" rel="stylesheet" />
</head>

<body class="bg-background font-body-md text-body-md text-on-surface antialiased">
  
  <!-- TOP BAR -->
  <header class="fixed top-0 left-0 w-full z-50">
    <div class="w-full bg-primary-container text-on-primary font-body-sm text-body-sm px-gutter-mobile lg:px-gutter-desktop shadow-sm">
      <div class="max-w-container-max mx-auto h-9 flex items-center justify-between">
        <div class="flex items-center gap-space-xs truncate">
          <span class="material-symbols-outlined text-secondary-container text-[16px] shrink-0">verified</span>
          <span class="font-medium tracking-tight truncate">Taller propio en Temuco • Cobertura en todo el Sur de Chile</span>
        </div>
        <div class="hidden md:flex items-center gap-space-lg shrink-0">
          <a class="flex items-center gap-space-2xs text-secondary-fixed hover:text-on-primary transition-colors" href="tel:+56989807490">
            <span class="material-symbols-outlined text-[16px]">phone_in_talk</span>
            <span class="font-label-sm text-label-sm">(+56 9) 8980 7490</span>
          </a>
          <span class="inline-flex items-center gap-space-2xs text-surface-container-high font-label-sm text-label-sm">
            <span class="material-symbols-outlined text-[15px]">schedule</span>Lunes a Viernes 08:30 - 18:30 hrs
          </span>
        </div>
      </div>
    </div>
    
    <!-- NAVBAR -->
    <div class="h-20 w-full bg-surface-container-lowest/90 backdrop-blur-xl shadow-sm px-gutter-mobile lg:px-gutter-desktop">
      <div class="max-w-container-max mx-auto h-full flex items-center justify-between gap-space-md">
        <a class="flex items-center focus:outline-none" href="index.php">
          <!-- Placeholder para el Logo -->
          <img alt="Vidriería Lagos Logo" class="h-10 w-auto object-contain rounded" src="https://placehold.co/300x100/0d2137/ffffff?text=Logo+Vidrier%C3%ADa+Lagos" />
        </a>
        
        <nav class="hidden lg:flex items-center gap-space-xs xl:gap-space-sm">
          <a class="px-space-xs py-1.5 transition-colors bg-surface-container-high text-on-surface font-semibold rounded-lg" href="#">Inicio</a>
          <a class="px-space-xs py-1.5 font-label-md text-label-md text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface rounded-lg transition-colors" href="#">Termopaneles & Vidrios</a>
          <a class="px-space-xs py-1.5 font-label-md text-label-md text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface rounded-lg transition-colors" href="#">Ventanas PVC</a>
          <a class="px-space-xs py-1.5 font-label-md text-label-md text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface rounded-lg transition-colors" href="#">Líneas de Aluminio</a>
          <a class="px-space-xs py-1.5 font-label-md text-label-md text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface rounded-lg transition-colors" href="#">Proyectos</a>
        </nav>
        
        <div class="flex items-center gap-space-sm">
          <a class="inline-flex items-center gap-space-2xs bg-primary-container text-on-primary hover:bg-secondary px-space-md py-2.5 rounded-xl font-label-md transition-all shadow-md" href="#cotizador-expres">
            <span class="material-symbols-outlined text-[18px]">request_quote</span>
            <span class="hidden sm:inline">Solicitar Cotización Gratis</span>
          </a>
        </div>
      </div>
    </div>
  </header>

  <main class="w-full pt-[7.25rem] bg-surface">
    <!-- HERO SECTION -->
    <section class="relative w-full bg-surface-container-lowest overflow-hidden pb-space-3xl lg:pb-space-4xl pt-space-xl">
      <div class="max-w-container-max mx-auto px-gutter-mobile lg:px-gutter-desktop">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl items-center">
          <div class="lg:col-span-7 flex flex-col gap-space-lg">
            <h1 class="font-display-hero text-[2.5rem] lg:text-[3.5rem] text-primary tracking-tight font-extrabold leading-[1.12]">
              Más de <span class="text-secondary">65 años</span> vistiendo de luz y confort sus espacios con maestría.
            </h1>
            <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl leading-relaxed">
              Especialistas en soluciones térmicas para el clima del sur de Chile: aislación extrema contra lluvia, frío y viento con termopaneles de alta eficiencia térmica y acústica (DVH), ventanería en PVC con estándares Europeos y Americanos, y cerramientos de vanguardia en aluminio Línea QT con taller industrial propio en Temuco.
            </p>
            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-space-md pt-space-xs">
              <a class="inline-flex items-center justify-center gap-space-sm bg-secondary text-on-secondary font-label-md px-space-xl py-4 rounded-xl shadow-lg hover:bg-secondary-container hover:text-primary transition-all" href="#cotizador-expres">
                <span class="material-symbols-outlined text-[20px]">calculate</span> Cotizar Mi Proyecto al Instante
              </a>
              <a class="inline-flex items-center justify-center gap-space-sm bg-surface-container hover:bg-surface-container-high text-primary font-label-md px-space-lg py-4 rounded-xl transition-all" href="https://wa.me/56989807490" target="_blank">
                <span class="material-symbols-outlined text-[20px] text-secondary">chat</span> Hablar con un Especialista
              </a>
            </div>
            
            <div class="grid grid-cols-3 gap-space-md pt-space-md">
              <div class="flex flex-col">
                <span class="font-headline-lg font-extrabold text-primary">+25.000</span>
                <span class="font-body-sm text-on-surface-variant">Ventanas fabricadas con sello hermético</span>
              </div>
              <div class="flex flex-col">
                <span class="font-headline-lg font-extrabold text-secondary">Hasta -68%</span>
                <span class="font-body-sm text-on-surface-variant">Pérdida energética con DVH Low-E</span>
              </div>
              <div class="flex flex-col">
                <span class="font-headline-lg font-extrabold text-primary">100%</span>
                <span class="font-body-sm text-on-surface-variant">Garantía estructural y perfiles NCh</span>
              </div>
            </div>
          </div>
          <div class="lg:col-span-5 relative">
            <div class="relative rounded-2xl overflow-hidden shadow-2xl bg-surface-container">
              <!-- Placeholder Imagen Principal (Hero) -->
              <img alt="Ventanal arquitectónico termopanel" class="w-full h-[480px] lg:h-[560px] object-cover hover:scale-105 transition-transform duration-700 ease-out" src="https://placehold.co/800x600/dce9ff/006398?text=Imagen+Principal+(Hero)" />
              <div class="absolute inset-0 bg-gradient-to-t from-primary/80 via-transparent to-transparent"></div>
              <div class="absolute bottom-6 left-6 right-6 bg-surface-container-lowest/90 backdrop-blur-xl p-space-md rounded-xl shadow-xl flex items-center justify-between">
                <div class="flex items-center gap-space-sm">
                  <div class="w-10 h-10 rounded-lg bg-secondary-fixed flex items-center justify-center text-on-secondary-fixed">
                    <span class="material-symbols-outlined text-[22px]">domain_verification</span>
                  </div>
                  <div class="flex flex-col">
                    <span class="font-title-md font-bold text-primary">Obra Residencial</span>
                    <span class="font-label-sm text-on-surface-variant">Pucón, Lago Villarrica • 2024</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- COTIZADOR RÁPIDO CON PHP BACKEND -->
    <section class="w-full bg-surface-container-low py-space-3xl" id="cotizador-expres">
      <div class="max-w-container-max mx-auto px-gutter-mobile lg:px-gutter-desktop">
        <div class="text-center max-w-2xl mx-auto mb-space-2xl">
          <span class="font-eyebrow text-secondary uppercase font-bold tracking-widest">Presupuesto Rápido y Transparente</span>
          <h2 class="font-headline-lg text-primary font-bold mt-space-2xs">Cotizador Exprés en 2 Pasos</h2>
          <p class="font-body-md text-on-surface-variant mt-space-xs">Complete los requerimientos técnicos de su obra y reciba una valorización detallada en menos de 24 horas hábiles.</p>
        </div>
        
        <div class="bg-surface-container-lowest rounded-2xl p-space-lg lg:p-space-2xl shadow-xl max-w-4xl mx-auto">
          <!-- Formulario conectado a procesador PHP -->
          <form action="procesadores/guardar_cotizacion.php" method="POST" enctype="multipart/form-data" class="flex flex-col gap-space-xl">
            <!-- Paso 1 -->
            <div class="flex flex-col gap-space-md">
              <span class="font-headline-sm text-primary font-bold">1. ¿Qué necesita cotizar o reparar?</span>
              <select name="product_type" class="w-full h-12 px-4 bg-surface rounded-lg border border-surface-container-high focus:ring-2 focus:ring-secondary outline-none text-primary font-body-md" required>
                <option value="">Seleccione una opción...</option>
                <option value="termopanel">Termopaneles a Medida (DVH)</option>
                <option value="pvc">Ventanas PVC (Europeo / Americano)</option>
                <option value="aluminio">Línea Aluminio QT</option>
                <option value="reparacion">Servicio de Reparación / Mantención</option>
              </select>
            </div>

            <!-- Paso 2 -->
            <div class="flex flex-col gap-space-md pt-space-md border-t border-surface-container-high">
              <span class="font-headline-sm text-primary font-bold">2. Datos de Contacto</span>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-space-md">
                <input type="text" name="client_name" placeholder="Nombre Completo *" required class="w-full h-11 px-space-md bg-surface-container-low rounded-lg focus:ring-2 focus:ring-secondary text-primary font-body-md outline-none" />
                <input type="tel" name="client_phone" placeholder="WhatsApp / Teléfono *" required class="w-full h-11 px-space-md bg-surface-container-low rounded-lg focus:ring-2 focus:ring-secondary text-primary font-body-md outline-none" />
                <input type="email" name="client_email" placeholder="Correo Electrónico" class="w-full h-11 px-space-md bg-surface-container-low rounded-lg focus:ring-2 focus:ring-secondary text-primary font-body-md outline-none" />
                <input type="text" name="client_location" placeholder="Ciudad / Comuna *" required class="w-full h-11 px-space-md bg-surface-container-low rounded-lg focus:ring-2 focus:ring-secondary text-primary font-body-md outline-none" />
              </div>
              <textarea name="notes" placeholder="Detalles adicionales, planos o especificaciones especiales (Opcional)" rows="3" class="w-full p-space-md bg-surface-container-low rounded-lg focus:ring-2 focus:ring-secondary text-primary font-body-md outline-none"></textarea>
            </div>

            <div class="flex justify-end pt-space-md">
              <button type="submit" class="inline-flex items-center gap-space-sm bg-secondary text-on-secondary px-space-2xl py-3.5 rounded-xl font-label-md shadow-lg hover:bg-secondary-container hover:text-primary transition-all font-bold">
                <span class="material-symbols-outlined text-[20px]">send</span> Solicitar Presupuesto Gratuito
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- CORE PRODUCT CATALOG -->
    <section class="w-full bg-surface-container-lowest py-space-3xl lg:py-space-4xl">
      <div class="max-w-container-max mx-auto px-gutter-mobile lg:px-gutter-desktop">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md mb-space-2xl">
          <div class="flex flex-col gap-space-2xs max-w-2xl">
            <span class="font-eyebrow text-secondary uppercase font-bold tracking-widest">Catálogo de Alta Gama</span>
            <h2 class="font-headline-lg text-primary font-bold">Sistemas de Vidrio & Perfilería Certificada</h2>
          </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-space-xl">
          <!-- CATEGORÍA 1 -->
          <div class="bg-surface-container-low rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
            <div class="relative h-64 overflow-hidden bg-surface-container">
              <!-- Placeholder Termopanel -->
              <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://placehold.co/600x400/e5eeff/006398?text=Foto+Termopanel+DVH')"></div>
              <div class="absolute top-4 left-4 bg-primary-container text-on-primary px-space-sm py-1.5 rounded-lg font-label-sm font-bold shadow-md">
                Aislación Térmica NCh Sur
              </div>
            </div>
            <div class="p-space-xl flex flex-col gap-space-md flex-grow justify-between">
              <div class="flex flex-col gap-space-xs">
                <h3 class="font-headline-md text-primary font-bold">Termopaneles de Alta Eficiencia (DVH)</h3>
                <p class="font-body-md text-on-surface-variant">Unidades de Doble Vidriado Hermético fabricadas en nuestro taller propio de Temuco. Eliminan 100% la condensación por frío austral y resisten temporales severos.</p>
              </div>
              <div class="grid grid-cols-2 gap-space-xs bg-surface-container-lowest p-space-md rounded-xl">
                <div class="flex items-center gap-space-2xs"><span class="material-symbols-outlined text-secondary text-[18px]">volume_off</span><span class="font-body-sm font-semibold text-primary">Aislación Acústica: -38 dB</span></div>
                <div class="flex items-center gap-space-2xs"><span class="material-symbols-outlined text-secondary text-[18px]">thermostat</span><span class="font-body-sm font-semibold text-primary">Valor U: 1.3 W/m²K</span></div>
              </div>
            </div>
          </div>
          
          <!-- CATEGORÍA 2 -->
          <div class="bg-surface-container-low rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
            <div class="relative h-64 overflow-hidden bg-surface-container">
              <!-- Placeholder PVC -->
              <img alt="Ventana PVC" class="w-full h-full object-cover" src="https://placehold.co/600x400/e5eeff/006398?text=Foto+Ventana+PVC" />
              <div class="absolute top-4 left-4 bg-secondary text-on-secondary px-space-sm py-1.5 rounded-lg font-label-sm font-bold shadow-md">
                PVC Multicámara Reforzado
              </div>
            </div>
            <div class="p-space-xl flex flex-col gap-space-md flex-grow justify-between">
              <div class="flex flex-col gap-space-xs">
                <h3 class="font-headline-md text-primary font-bold">Ventanas PVC: Estilo Europeo y Americano</h3>
                <p class="font-body-md text-on-surface-variant">Perfilería de alta densidad con refuerzo de acero galvanizado interior de 1.5mm. Sellado perimetral estanco concebido para resistir temporales de viento y lluvia.</p>
              </div>
              <div class="grid grid-cols-2 gap-space-xs bg-surface-container-lowest p-space-md rounded-xl">
                <div class="flex items-center gap-space-2xs"><span class="material-symbols-outlined text-secondary text-[18px]">lock</span><span class="font-body-sm font-semibold text-primary">Cierre Perimetral Multipunto</span></div>
                <div class="flex items-center gap-space-2xs"><span class="material-symbols-outlined text-secondary text-[18px]">water_drop</span><span class="font-body-sm font-semibold text-primary">Cero Filtración de Lluvia</span></div>
              </div>
            </div>
          </div>

          <!-- CATEGORÍA 3 -->
          <div class="bg-surface-container-low rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
            <div class="relative h-64 overflow-hidden bg-surface-container">
              <!-- Placeholder Aluminio -->
              <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://placehold.co/600x400/e5eeff/006398?text=Foto+Aluminio+Linea+QT')"></div>
              <div class="absolute top-4 left-4 bg-primary-container text-on-primary px-space-sm py-1.5 rounded-lg font-label-sm font-bold shadow-md">
                Serie QT / Grandes Luces
              </div>
            </div>
            <div class="p-space-xl flex flex-col gap-space-md flex-grow justify-between">
              <div class="flex flex-col gap-space-xs">
                <h3 class="font-headline-md text-primary font-bold">Líneas de Aluminio Arquitectónico (Línea QT)</h3>
                <p class="font-body-md text-on-surface-variant">Diseñadas para proyectos de arquitectura contemporánea que exigen perfiles esbeltos y paños monumentales de piso a cielo. Gran inercia estructural.</p>
              </div>
              <div class="grid grid-cols-2 gap-space-xs bg-surface-container-lowest p-space-md rounded-xl">
                <div class="flex items-center gap-space-2xs"><span class="material-symbols-outlined text-secondary text-[18px]">height</span><span class="font-body-sm font-semibold text-primary">Alturas hasta 3.20 metros</span></div>
                <div class="flex items-center gap-space-2xs"><span class="material-symbols-outlined text-secondary text-[18px]">palette</span><span class="font-body-sm font-semibold text-primary">Pintura electrostática certificada</span></div>
              </div>
            </div>
          </div>

          <!-- CATEGORÍA 4 -->
          <div class="bg-surface-container-low rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
            <div class="relative h-64 overflow-hidden bg-surface-container">
              <!-- Placeholder Cristal Templado -->
              <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://placehold.co/600x400/e5eeff/006398?text=Foto+Cristal+Templado')"></div>
              <div class="absolute top-4 left-4 bg-secondary text-on-secondary px-space-sm py-1.5 rounded-lg font-label-sm font-bold shadow-md">
                Cristal de Seguridad
              </div>
            </div>
            <div class="p-space-xl flex flex-col gap-space-md flex-grow justify-between">
              <div class="flex flex-col gap-space-xs">
                <h3 class="font-headline-md text-primary font-bold">Templados, Laminados y Shower Doors</h3>
                <p class="font-body-md text-on-surface-variant">Soluciones integrales de seguridad: barandas panorámicas auto-portantes para terrazas, mamparas de acceso para locales u oficinas y shower doors.</p>
              </div>
              <div class="grid grid-cols-2 gap-space-xs bg-surface-container-lowest p-space-md rounded-xl">
                <div class="flex items-center gap-space-2xs"><span class="material-symbols-outlined text-secondary text-[18px]">verified_user</span><span class="font-body-sm font-semibold text-primary">Templado térmico 5x resistencia</span></div>
                <div class="flex items-center gap-space-2xs"><span class="material-symbols-outlined text-secondary text-[18px]">hardware</span><span class="font-body-sm font-semibold text-primary">Herrajes Acero Inox 304</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- NOSOTROS / 65 AÑOS -->
    <section class="w-full bg-primary text-on-primary py-space-3xl lg:py-space-4xl relative overflow-hidden">
      <div class="max-w-container-max mx-auto px-gutter-mobile lg:px-gutter-desktop relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-space-2xl items-center">
          <div class="lg:col-span-7 flex flex-col gap-space-lg">
            <div class="inline-flex items-center gap-space-xs bg-primary-container px-space-md py-1.5 rounded-full w-fit">
              <span class="material-symbols-outlined text-secondary-container text-[18px]">history_edu</span>
              <span class="font-eyebrow text-secondary-container tracking-widest uppercase font-bold">Desde 1959 en Temuco</span>
            </div>
            <h2 class="font-headline-lg font-bold text-on-primary tracking-tight">65 años combinando maestría artesanal con ingeniería de precisión.</h2>
            <p class="font-body-lg text-on-primary-container leading-relaxed">
              Fundada en 1959 por una familia de artesanos vidrieros en Temuco, Vidriería Lagos ha evolucionado de un taller clásico de corte a un centro integral de mecanizado con líneas robotizadas para DVH y termo-soldado de perfiles PVC.
            </p>
          </div>
          <div class="lg:col-span-5 relative">
            <div class="bg-surface-container-low rounded-2xl p-space-xl text-primary shadow-2xl flex flex-col gap-space-lg">
              <div class="flex items-center justify-between">
                <div class="flex flex-col">
                  <span class="font-display-hero font-extrabold text-secondary leading-none">65</span>
                  <span class="font-eyebrow uppercase tracking-wider font-bold text-on-surface-variant">Años Ininterrumpidos</span>
                </div>
              </div>
              <div class="rounded-xl overflow-hidden shadow-inner bg-surface-container h-44">
                <!-- Placeholder Taller -->
                <div class="w-full h-full bg-cover bg-center" style="background-image: url('https://placehold.co/800x400/dce9ff/0b1c30?text=Foto+Taller+Temuco')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- GALERÍA DE PROYECTOS -->
    <section class="w-full bg-surface py-space-3xl lg:py-space-4xl">
      <div class="max-w-container-max mx-auto px-gutter-mobile lg:px-gutter-desktop">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-space-md mb-space-2xl">
          <div>
            <span class="font-eyebrow text-secondary uppercase font-bold tracking-widest">Obras Entregadas</span>
            <h2 class="font-headline-lg text-primary font-bold mt-space-2xs">Proyectos Recientes</h2>
          </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
          <!-- Proyecto 1 -->
          <div class="rounded-2xl overflow-hidden shadow-md bg-surface-container-lowest">
            <div class="h-64 w-full bg-cover bg-center" style="background-image: url('https://placehold.co/600x400/e5eeff/006398?text=Proyecto+Puc%C3%B3n')"></div>
            <div class="p-space-lg flex flex-col gap-space-xs">
              <span class="font-eyebrow text-secondary uppercase font-bold">Pucón, Lago Villarrica</span>
              <h3 class="font-title-md text-primary font-bold">Residencia Los Coihues: PVC Europeo</h3>
            </div>
          </div>
          <!-- Proyecto 2 -->
          <div class="rounded-2xl overflow-hidden shadow-md bg-surface-container-lowest">
            <div class="h-64 w-full bg-cover bg-center" style="background-image: url('https://placehold.co/600x400/e5eeff/006398?text=Proyecto+Temuco')"></div>
            <div class="p-space-lg flex flex-col gap-space-xs">
              <span class="font-eyebrow text-secondary uppercase font-bold">Temuco, Av. Alemania</span>
              <h3 class="font-title-md text-primary font-bold">Edificio Portal Cautín: Aluminio Línea QT</h3>
            </div>
          </div>
          <!-- Proyecto 3 -->
          <div class="rounded-2xl overflow-hidden shadow-md bg-surface-container-lowest">
            <div class="h-64 w-full bg-cover bg-center" style="background-image: url('https://placehold.co/600x400/e5eeff/006398?text=Proyecto+Pto+Octay')"></div>
            <div class="p-space-lg flex flex-col gap-space-xs">
              <span class="font-eyebrow text-secondary uppercase font-bold">Puerto Octay / Pto Montt</span>
              <h3 class="font-title-md text-primary font-bold">Cabaña Lago Llanquihue: Termopanel</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FORMULARIO LLAMADA RÁPIDA -->
    <section class="w-full bg-primary-container text-on-primary py-space-3xl lg:py-space-4xl">
      <div class="max-w-container-max mx-auto px-gutter-mobile lg:px-gutter-desktop">
        <div class="bg-primary rounded-3xl p-space-xl lg:p-space-3xl shadow-2xl relative overflow-hidden grid grid-cols-1 lg:grid-cols-12 gap-space-xl items-center">
          <div class="lg:col-span-7 flex flex-col gap-space-md">
            <span class="font-eyebrow text-secondary-container tracking-widest uppercase font-bold">Atención Inmediata</span>
            <h2 class="font-headline-lg text-on-primary font-bold">¿Tiene un plano o necesita renovar hoy mismo?</h2>
            <p class="font-body-lg text-on-primary-container">Nuestros ingenieros lo asesoran directamente en obra en Temuco, Villarrica, Pucón y Puerto Montt.</p>
          </div>
          
          <div class="lg:col-span-5 flex flex-col gap-space-md bg-surface-container-lowest text-primary p-space-xl rounded-2xl shadow-xl">
            <span class="font-title-md font-bold text-primary">Le devolvemos el llamado en 15 minutos:</span>
            <!-- Formulario conectado a procesador PHP -->
            <form action="procesadores/guardar_llamada.php" method="POST" class="flex flex-col gap-space-sm">
              <input name="nombre" placeholder="Su Nombre" required class="w-full h-11 px-space-md bg-surface-container-low rounded-lg focus:ring-2 focus:ring-secondary text-primary outline-none" type="text" />
              <input name="telefono" placeholder="Su Teléfono / WhatsApp" required class="w-full h-11 px-space-md bg-surface-container-low rounded-lg focus:ring-2 focus:ring-secondary text-primary outline-none" type="tel" />
              <button type="submit" class="w-full py-3.5 bg-secondary text-on-secondary rounded-xl font-bold transition-all shadow-md hover:bg-secondary-container hover:text-primary">
                Solicitar Llamada Inmediata
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="w-full bg-primary text-on-primary pt-space-3xl pb-space-2xl">
    <div class="max-w-container-max mx-auto px-gutter-mobile lg:px-gutter-desktop flex flex-col items-center justify-center text-center gap-space-md">
      <!-- Placeholder Logo Footer -->
      <img alt="Logo Footer" class="h-12 w-auto object-contain rounded" src="https://placehold.co/200x80/0d2137/ffffff?text=Logo+Footer" />
      <p class="font-body-sm text-on-primary-container mt-4">© 2026 Vidriería Lagos S.A. Todos los derechos reservados. <br>Av. Rudecindo Ortega / Parque Industrial, Temuco.</p>
    </div>
  </footer>
  
</body>
</html>