/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./assets/**/*.js",
    "./templates/**/*",
    "./node_modules/flowbite/**/*.js",
    "./vendor/tales-from-a-dev/flowbite-bundle/templates/**/*.html.twig"
  ],
  theme: {
    extend: {
      fontFamily: {
        'display': ['Montserrat'],
        'body': ['Nunito Sans'],
        'accent': ['Raleway'],
      },
      colors: {
        'dark': '#0f172a',
        'light': '#f1f5f9',
        'primary': {
          100: '#F9F1E4',
          200: '#F3E4C9',
          300: '#EDD6AE',
          400: '#E7C993',
          500: '#D9AD70',
          600: '#B58D5A',
          700: '#916D44',
          800: '#6D4D2E',
          900: '#493218',
        }
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

