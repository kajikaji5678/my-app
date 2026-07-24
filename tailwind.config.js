import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/**/*.{js,jsx,ts,tsx}',
    './src/**/*.{js,jsx,ts,tsx}',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
      keyframes: {
        glow: {
          '0%, 100%': {
            boxShadow: '0 0 5px red',
          },
          '50%': {
            boxShadow: '0 0 15px red',
          },
        },
        glow2: {
          '0%, 100%': {
            boxShadow: '0 0 5px orange',
          },
          '50%': {
            boxShadow: '0 0 20px orange',
          },
        },
      },
      animation: {
        glow: 'glow 1.5s infinite',
        glow2: 'glow2 1.5s infinite'
      }
    },
  },

  plugins: [forms],
};
