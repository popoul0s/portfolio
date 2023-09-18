import colors from 'tailwindcss/colors'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'

export default {
    content: [
        './resources/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    darkMode: 'class',
    theme: {
        extend: {
            screens: {
                'xs': { max: "600px" },
                'lg': { min: "601px" },
            },
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
                'background': '#1f1f1f',
                'hover': '#454545',
            },
        },
    },
    plugins: [
        forms,
        typography,
        require('flowbite/plugin'),
    ],
}
