/** @type {import('tailwindcss').Config} */
export default {
  content: ["./resources/views/**/*.blade.php", "./node_modules/flowbite/**/*.js", './resources/**/*.js'],
  theme: {
    extend: {
      fontFamily: {
        vazir: ['vazir', 'sans-serif'],
        vazirBold: ['vazir-bold', 'sans-serif'],
        vazirThin: ['vazir-thin', 'sans-serif'],
        vazirLight: ['vazir-light', 'sans-serif'],
      },

    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

