// const defaultTheme = require('tailwindcss/defaultTheme');

// /** @type {import('tailwindcss').Config} */
// module.exports = {
//     content: [
//         './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
//         './storage/framework/views/*.php',
//         './resources/views/**/*.blade.php',
//     ],

//     theme: {
//         extend: {
//             fontFamily: {
//                 sans: ['Nunito', ...defaultTheme.fontFamily.sans],
//             },
//         },
//     },

//     plugins: [require('@tailwindcss/forms')],
// };

import colors from 'tailwindcss/colors'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'
const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],

    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.yellow,
                success: colors.green,
                warning: colors.amber,
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },


            // colors: {
            //     danger: colors.rose,
            //     primary: {
            //         '50': '#990100',
            //         '100': '#990100',
            //         '200': '#990100',
            //         '300': '#990100',
            //         '400': '#990100',
            //         '500': '#990100',
            //         '600': '#990100',
            //         '700': '#990100',
            //         '800': '#990100',
            //         '900': '#990100',
            //         '950': '#990100',
            //     },
            //     success: colors.green,
            //     warning: colors.yellow,
            // },

        },
    },

    plugins:
        [
            require('@tailwindcss/forms'),
            require('@tailwindcss/typography'),
        ],



};

