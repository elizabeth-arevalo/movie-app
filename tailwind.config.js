import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
          colors: {
            primary: {
              dark: '#002A38', // Tono oscuro
              DEFAULT: '#004C54', // Tono principal
              light: '#007C70', // Tono claro
            },
            secondary: {
              dark: '#004D40',
              DEFAULT: '#00796B',
              light: '#4DB6AC',
            },
          },
        },
      },

    plugins: [forms],
};
