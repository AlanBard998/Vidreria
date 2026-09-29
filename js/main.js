// js/main.js
function switchStep(stepNumber) {
  for (let i = 1; i <= 3; i++) {
    const panel = document.getElementById('step-content-' + i);
    const tab = document.getElementById('step-tab-' + i);
    if (panel) {
      panel.classList.add('hidden');
      panel.classList.remove('flex');
    }
    if (tab) {
      tab.classList.remove('bg-primary-container', 'text-on-primary');
      tab.classList.add('text-on-surface-variant');
      const badge = tab.querySelector('span:first-child');
      if (badge) {
        badge.classList.remove('bg-secondary', 'text-on-secondary');
        badge.classList.add('bg-surface-container', 'text-on-surface');
      }
    }
  }
  
  const targetPanel = document.getElementById('step-content-' + stepNumber);
  const targetTab = document.getElementById('step-tab-' + stepNumber);
  if (targetPanel) {
    targetPanel.classList.remove('hidden');
    targetPanel.classList.add('flex');
  }
  if (targetTab) {
    targetTab.classList.remove('text-on-surface-variant');
    targetTab.classList.add('bg-primary-container', 'text-on-primary');
    const badge = targetTab.querySelector('span:first-child');
    if (badge) {
      badge.classList.remove('bg-surface-container', 'text-on-surface');
      badge.classList.add('bg-secondary', 'text-on-secondary');
    }
  }
}


// ==========================================
// 1. DATOS DEL MOSTRADOR VISUAL (IMÁGENES UNIFORMES)
// ==========================================
const visualData = {
  'solo-cristal': `
    <h4 class="font-bold text-primary mb-3 flex items-center gap-2"><span class="material-symbols-outlined text-secondary">visibility</span> Galería de Cristales:</h4>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <div class="flex flex-col items-center gap-2">
        <img src="images/incoloro.jpg" alt="Cristal Incoloro" class="w-full aspect-[4/3] object-cover object-center rounded-lg border border-outline-variant shadow-sm bg-surface">
        <span class="text-xs font-bold text-primary text-center">Incoloro / Claro</span>
      </div>
      <div class="flex flex-col items-center gap-2">
        <img src="images/pavonado.jpg" alt="Cristal Pavonado" class="w-full aspect-[4/3] object-cover object-center rounded-lg border border-outline-variant shadow-sm bg-surface">
        <span class="text-xs font-bold text-primary text-center">Pavonado / Opaco</span>
      </div>
      <div class="flex flex-col items-center gap-2">
        <img src="images/termopanel.jpg" alt="Termopanel" class="w-full aspect-[4/3] object-cover object-center rounded-lg border border-outline-variant shadow-sm bg-surface">
        <span class="text-xs font-bold text-primary text-center">Termopanel DVH</span>
      </div>
      <div class="flex flex-col items-center gap-2">
        <img src="images/texturizado.avif" alt="Cristal Diseño" class="w-full aspect-[4/3] object-cover object-center rounded-lg border border-outline-variant shadow-sm bg-surface">
        <span class="text-xs font-bold text-primary text-center">Texturizado / Diseño</span>
      </div>
      <div class="flex flex-col items-center gap-2">
        <img src="images/laminado.jpg" alt="Cristal Diseño" class="w-full aspect-[4/3] object-cover object-center rounded-lg border border-outline-variant shadow-sm bg-surface">
        <span class="text-xs font-bold text-primary text-center">Laminado</span>
      </div>
      <div class="flex flex-col items-center gap-2">
        <img src="images/templado.jpg" alt="Cristal Diseño" class="w-full aspect-[4/3] object-cover object-center rounded-lg border border-outline-variant shadow-sm bg-surface">
        <span class="text-xs font-bold text-primary text-center">Templado</span>
      </div>
    </div>
  `,
  'espejo': `
    <h4 class="font-bold text-primary mb-3 flex items-center gap-2"><span class="material-symbols-outlined text-secondary">visibility</span> Terminaciones de Espejos:</h4>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <div class="flex flex-col items-center gap-2">
        <img src="images/tu-foto-pulido.jpg" alt="Borde Pulido" class="w-full aspect-[4/3] object-cover object-center rounded-lg border border-outline-variant shadow-sm bg-surface">
        <span class="text-xs font-bold text-primary text-center">Borde Pulido</span>
      </div>
      <div class="flex flex-col items-center gap-2">
        <img src="images/tu-foto-biselado.jpg" alt="Biselado" class="w-full aspect-[4/3] object-cover object-center rounded-lg border border-outline-variant shadow-sm bg-surface">
        <span class="text-xs font-bold text-primary text-center">Biselado Elegante</span>
      </div>
      <div class="flex flex-col items-center gap-2">
        <img src="images/tu-foto-marco.jpg" alt="Marco Aluminio" class="w-full aspect-[4/3] object-cover object-center rounded-lg border border-outline-variant shadow-sm bg-surface">
        <span class="text-xs font-bold text-primary text-center">Con Marco</span>
      </div>
      <div class="flex flex-col items-center gap-2">
        <img src="images/tu-foto-led.jpg" alt="Espejo LED" class="w-full aspect-[4/3] object-cover object-center rounded-lg border border-outline-variant shadow-sm bg-surface">
        <span class="text-xs font-bold text-primary text-center">Retroiluminado LED</span>
      </div>
    </div>
  `,
  'ventana': `
    <h4 class="font-bold text-primary mb-3 flex items-center gap-2"><span class="material-symbols-outlined text-secondary">visibility</span> Líneas y Materiales:</h4>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
      <div class="flex flex-col items-center gap-2">
        <img src="images/tu-foto-pvc-blanco.jpg" alt="PVC Blanco" class="w-full aspect-[4/3] object-cover object-center rounded-lg border border-outline-variant shadow-sm bg-surface">
        <span class="text-xs font-bold text-primary text-center">PVC Europeo Blanco</span>
      </div>
      <div class="flex flex-col items-center gap-2">
        <img src="images/tu-foto-pvc-foliado.jpg" alt="PVC Foliado" class="w-full aspect-[4/3] object-cover object-center rounded-lg border border-outline-variant shadow-sm bg-surface">
        <span class="text-xs font-bold text-primary text-center">PVC Foliado (Madera/Gris)</span>
      </div>
      <div class="flex flex-col items-center gap-2">
        <img src="images/tu-foto-aluminio-qt.jpg" alt="Aluminio QT" class="w-full aspect-[4/3] object-cover object-center rounded-lg border border-outline-variant shadow-sm bg-surface">
        <span class="text-xs font-bold text-primary text-center">Aluminio Arquitectónico QT</span>
      </div>
    </div>
  `,
  'reparacion': `
    <div class="flex items-center gap-4 bg-surface rounded-xl p-4 border border-outline-variant">
      <div class="w-16 h-16 rounded-full bg-secondary-container flex items-center justify-center shrink-0">
        <span class="material-symbols-outlined text-[32px] text-on-secondary-container">support_agent</span>
      </div>
      <div>
        <h4 class="font-bold text-primary text-sm">¿Sabía que...?</h4>
        <p class="text-xs text-on-surface-variant mt-1">Adjuntar una foto clara del desperfecto (ruedas rotas, vidrio quebrado o filtración) ayuda a nuestros técnicos a llevar los repuestos exactos a su domicilio en Temuco o alrededores, ahorrando tiempo en la reparación.</p>
      </div>
    </div>
  `
};

function updateRadioSelection(radioInput) {
  // 1. Resetear estilos y ocultar menús en todas las tarjetas
  document.querySelectorAll('.product-choice-card').forEach(card => {
    card.classList.remove('bg-surface-container-low', 'border-secondary', 'ring-1', 'ring-secondary');
    card.classList.add('bg-surface-container-lowest', 'border-transparent');
    
    const indicator = card.querySelector('.radio-indicator');
    const dot = indicator ? indicator.querySelector('span') : null;
    if (indicator) indicator.classList.replace('bg-secondary', 'bg-surface-container');
    if (dot) dot.classList.replace('bg-on-secondary', 'bg-transparent');

    const submenu = card.querySelector('.sub-menu-options');
    if(submenu) {
      submenu.classList.add('hidden');
      submenu.classList.remove('flex');
    }
  });

  // 2. Encender la tarjeta seleccionada
  const parentCard = radioInput.closest('.product-choice-card');
  if (parentCard) {
    parentCard.classList.remove('bg-surface-container-lowest', 'border-transparent');
    parentCard.classList.add('bg-surface-container-low', 'border-secondary', 'ring-1', 'ring-secondary');
    
    const indicator = parentCard.querySelector('.radio-indicator');
    const dot = indicator ? indicator.querySelector('span') : null;
    if (indicator) indicator.classList.replace('bg-surface-container', 'bg-secondary');
    if (dot) dot.classList.replace('bg-transparent', 'bg-on-secondary');

    const submenu = parentCard.querySelector('.sub-menu-options');
    if(submenu) {
      submenu.classList.remove('hidden');
      submenu.classList.add('flex');
    }
  }

  // 3. Inyectar contenido en el Mostrador Visual
  const visualContainer = document.getElementById('mostrador-visual');
  const selectedValue = radioInput.value;

  if (visualContainer && visualData[selectedValue]) {
    // Inyecta el HTML predefinido según la opción
    visualContainer.innerHTML = visualData[selectedValue];
    // Lo hace visible
    visualContainer.classList.remove('hidden');
    visualContainer.classList.add('block');
  } else if (visualContainer) {
    visualContainer.classList.add('hidden');
    visualContainer.classList.remove('block');
  }
}

// Escuchar cambios en los inputs tipo "file" para mostrarle al usuario que la foto se cargó
document.addEventListener('DOMContentLoaded', () => {
  const fileInputs = document.querySelectorAll('input[type="file"]');
  fileInputs.forEach(input => {
    input.addEventListener('change', function(e) {
      if (this.files && this.files.length > 0) {
        const fileName = this.files[0].name;
        // Encuentra el span de texto dentro del label y cámbialo por el nombre del archivo
        const labelText = this.closest('label').querySelector('span:not(.material-symbols-outlined)');
        if(labelText) labelText.textContent = '✔️ ' + fileName;
      }
    });
  });
});

  // 2. Encender la tarjeta seleccionada y mostrar su sub-menú
  const parentCard = radioInput.closest('.product-choice-card');
  if (parentCard) {
    parentCard.classList.remove('bg-surface-container-lowest', 'border-transparent');
    parentCard.classList.add('bg-surface-container-low', 'border-secondary', 'ring-1', 'ring-secondary');
    
    const indicator = parentCard.querySelector('.radio-indicator');
    const dot = indicator ? indicator.querySelector('span') : null;
    if (indicator) indicator.classList.replace('bg-surface-container', 'bg-secondary');
    if (dot) dot.classList.replace('bg-transparent', 'bg-on-secondary');

    const submenu = parentCard.querySelector('.sub-menu-options');
    if(submenu) {
      submenu.classList.remove('hidden');
      submenu.classList.add('flex');
    }
  }


function filterGallery(category, event) {
  document.querySelectorAll('.gallery-filter-btn').forEach(btn => {
    btn.classList.remove('bg-primary-container', 'text-on-primary');
    btn.classList.add('bg-surface-container-high', 'text-primary');
  });
  event.currentTarget.classList.remove('bg-surface-container-high', 'text-primary');
  event.currentTarget.classList.add('bg-primary-container', 'text-on-primary');

  const items = document.querySelectorAll('.project-item');
  items.forEach(item => {
    if (category === 'todos' || item.getAttribute('data-category') === category) {
      item.classList.remove('hidden');
    } else {
      item.classList.add('hidden');
    }
  });
}

async function handleQuoteSubmit(e) {
  e.preventDefault(); // Evita que la página se recargue
  
  const form = e.target;
  const formData = new FormData(form);

  try {
    // Reemplaza 'cotizaciones.php' por el nombre exacto de tu archivo PHP que guarda las cotizaciones
    const response = await fetch('procesadores/guardar_cotizacion.php', {
      method: 'POST',
      body: formData
    });

    const result = await response.json();

    if (result.success) {
      // Si el PHP guardó los datos correctamente, mostramos el mensaje de éxito
      document.getElementById('quote-form').classList.add('hidden');
      document.getElementById('quote-success-msg').classList.remove('hidden');
      document.getElementById('quote-success-msg').classList.add('flex');
    } else {
      // Muestra el mensaje de error que viene del PHP
      alert('Error: ' + result.message);
    }
  } catch (error) {
    console.error('Error en la petición:', error);
    alert('Hubo un problema de conexión. Por favor, intente nuevamente.');
  }
}


async function handleQuickCallback(e) {
  e.preventDefault(); // Evita que la página se recargue

  const form = e.target;
  const formData = new FormData(form);

  try {
    // Apuntamos al archivo PHP correcto según tu estructura de carpetas
    const response = await fetch('procesadores/guardar_llamada.php', {
      method: 'POST',
      body: formData
    });

    const result = await response.json();

    if (result.success) {
      // Mensaje de éxito y limpieza de los campos
      alert('¡Gracias! Un asesor técnico de Vidriería Lagos le devolverá la llamada en menos de 15 minutos.');
      form.reset(); 
    } else {
      // Muestra si hubo algún error de validación en el PHP (ej. falta el teléfono)
      alert('Aviso: ' + result.message);
    }
  } catch (error) {
    console.error('Error en la petición:', error);
    alert('Hubo un problema de comunicación con el servidor. Intente por nuestro WhatsApp directo.');
  }
}


document.addEventListener('DOMContentLoaded', () => {
  const selectCantidad = document.getElementById('select-cantidad');
  const alertaObra = document.getElementById('alerta-obra-mayor');

  if(selectCantidad && alertaObra) {
    selectCantidad.addEventListener('change', (e) => {
      if(e.target.value === '9+') {
        // Muestra la alerta
        alertaObra.classList.remove('hidden');
        alertaObra.classList.add('block');
      } else {
        // Oculta la alerta
        alertaObra.classList.add('hidden');
        alertaObra.classList.remove('block');
      }
    });
  }
});