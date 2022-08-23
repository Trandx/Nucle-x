/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors')
module.exports = {
  content: ['./public/**/*.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  theme: {
    extend: {},
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      black: colors.black,
      white: colors.white,
      gray: colors.gray,
      emerald: colors.emerald,
      indigo: colors.indigo,
      yellow: colors.yellow,
      'blue': colors.blue,
      'purple': colors.purple,
      'pink': colors.pink,
      'orange': colors.orange,
      'green': colors.green,
      'gray': colors.gray,
        red: colors.red,
      //'primary': 'rgb(0, 184, 179)',
      'primary': 'rgb(var(--color-primary) / <alpha-value>)',

      'danger': '#ff4136',
      //'dark':'#1f2837',
      'v-dark': 'rgb(var(--color-v-dark) / <alpha-value>)',
    },
    fontFamily: {
      sans: ['Graphik', 'sans-serif'],
      serif: ['Merriweather', 'serif'],
    },
    extend: {
      spacing: {
        '8xl': '96rem',
        '9xl': '128rem',
      },
      borderRadius: {
        '4xl': '2rem',
      }
    },
    screens: {
      'sm': '250px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
      '2xl': '1536px',
    }
  },
  plugins: [],
}
