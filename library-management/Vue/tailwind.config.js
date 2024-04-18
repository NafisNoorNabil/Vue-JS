// tailwind.config.js
module.exports = {
  purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    screens: {
      sm:'480px',
      md:'768px',
      lg:'976px',
      xl:'1440px'
    },
    extend: {
      fontFamily: {
        nunito:["Nunito Sans"],
        oswald:["Oswald"],
        roboto:["Roboto"],
        playfair:["Playfair Display"],
        poppins:["Poppins"]
      }
    }
  },
  variants: {
    extend: {},
  },
  plugins: [],
}