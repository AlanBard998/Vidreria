/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",
  content: ["./*.html", "./js/**/*.js"], // Rutas donde Tailwind buscará las clases
    theme: {
    extend: {
        colors: {
        "on-primary": "#ffffff",
        "on-secondary-fixed": "#001d31",
        "primary-container": "#0d2137",
        "on-surface": "#0b1c30",
        "surface-container-high": "#dce9ff",
        "on-surface-variant": "#44474d",
        "primary": "#000917",
        "secondary": "#006398",
        // ... (pega aquí el resto de tus colores exactos)
        "surface-container-lowest": "#ffffff",
    },
    borderRadius: {
        DEFAULT: "0.125rem",
        lg: "0.25rem",
        xl: "0.5rem",
        full: "0.75rem"
    },
    spacing: {
        "space-sm": "0.75rem",
        "container-max": "80rem",
        "gutter-desktop": "2rem",
        "gutter-mobile": "1rem",
        // ... (pega aquí el resto de tus espaciados)
    },
    fontFamily: {
        "display-hero": ["Plus Jakarta Sans"],
        "body-md": ["Inter"],
        // ... (pega aquí el resto de tus fuentes)
    }
    }
}
}