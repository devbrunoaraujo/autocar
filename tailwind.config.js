/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Livewire/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        'steel-blue': '#1e293b',
        'steel-gray': '#334155',
        'electric-blue': '#0ea5e9',
        'deep-red': '#dc2626',
        'charcoal': '#1f2937'
      },
      fontFamily: {
        'sans': ['Inter', 'ui-sans-serif', 'system-ui'],
      },
      animation: {
        'fade-in': 'fadeIn 0.5s ease-in-out',
        'slide-up': 'slideUp 0.3s ease-out',
        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        slideUp: {
          '0%': { transform: 'translateY(10px)', opacity: '0' },
          '100%': { transform: 'translateY(0)', opacity: '1' },
        }
      },
      boxShadow: {
        'financing': '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
        'electric': '0 0 20px rgba(14, 165, 233, 0.3)',
      },
      backgroundImage: {
        'gradient-financing': 'linear-gradient(135deg, #1e293b 0%, #334155 50%, #1f2937 100%)',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
