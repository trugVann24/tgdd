import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                inter: ["Inter", "sans-serif"],
            },
            fontWeight: {
                "inter-400": "400",
                "inter-500": "500",
                "inter-600": "600",
                "inter-700": "700",
                "inter-800": "800",
            },

        },
    },

    plugins: [forms, require('tailwind-scrollbar'),],
};
