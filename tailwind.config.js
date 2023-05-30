/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [    
    "./resources/**/*.blade.php",
],
  darkMode: 'class',
  theme: {
    container: {
      center: true,
      padding: '16px',
    },
    extend: {
      colors: {
        primary: '#6366f1',
        dark: '#0f172a',
        secondary: '#64748b',
      },
      screens: {
        '2xl': '1320px',
      }
    },
  },
  plugins: [],
}

