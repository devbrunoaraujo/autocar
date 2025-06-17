/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'steel-blue': '#1e293b',
        'steel-gray': '#334155',
        'electric-blue': '#0ea5e9',
        'deep-red': '#dc2626',
        'charcoal': '#1f2937'
      }
    },
  },
  plugins: [],
}