/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './*.php',
    './includes/**/*.php',
    './assets/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        'champagne': '#D4C2A8',
        'light-grey': '#CFCFCF',
      },
      fontFamily: {
        'heading': ['Montserrat', 'Poppins', 'sans-serif'],
        'body': ['Inter', 'sans-serif'],
      },
      letterSpacing: {
        'wide': '0.1em',
        'wider': '0.15em',
        'widest': '0.2em',
      },
    },
  },
  plugins: [],
}
