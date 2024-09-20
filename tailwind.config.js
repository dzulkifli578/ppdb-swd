/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/views/*",
    "./resources/views/admin/*",
    "./resources/views/peserta/*"
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('daisyui'),
  ],
}