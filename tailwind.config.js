/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      fontFamily: {
        display: ['Oswald', 'sans-serif'],
        body:    ['Poppins', 'sans-serif'],
      },
      colors: {
        'film-red':   '#E50914',
        'film-black': '#0a0a0a',
        'film-dark':  '#111111',
        'film-card':  '#161616',
      },
    },
  },
  plugins: [],
}
