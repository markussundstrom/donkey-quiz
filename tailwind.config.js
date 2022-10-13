const plugin = require('tailwindcss/plugin')

module.exports = {
  corePlugins: {
    container: false
  },

  content: [
    './resources/js/**/*.{vue, js, ts, jsx, tsx}',
    './resources/views/**/*.php'
  ],
  safelist: [],
  theme: {
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
      '2xl': '1440px'
    },

    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      white: '#fff',
      black: '#000',
      darkblue: '#000064',
      lightblue: '#7678ED',
      green: '#00FFC4',
      lightgray: '#EEEEEE'
    },

    fontSize: {
      14: '0.875rem',
      16: '1rem',
      20: '1.25rem',
      24: '1.5rem',
      32: '2rem',
      48: '3rem',

    },

    fontFamily: {
        poppins: ['Poppins']
    },

    extend: {
      // ..
    }
  },
  plugins: [
    // ..
  ]
}
