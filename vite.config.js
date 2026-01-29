import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/css/app.css",
                "resources/css/admin/layout/sidebar.css",
                "resources/css/admin/layout/master.css",
                "resources/css/admin/rooms.css",
                "resources/css/admin/booking.css",
                "resources/js/app.js",
                "resources/js/admin/sidebar.js",
                "resources/js/admin/rooms.js",
                "resources/js/admin/booking.js",
                "resources/css/nav.css",
                "resources/css/booking.css",
                "resources/js/booking.js",
                "resources/css/contact.css",
                "resources/css/details.css",
                "resources/css/rooms.css",
                "resources/css/home.css",
                "resources/css/login.css",
                "resources/js/login.js",
                "resources/css/register.css",
                "resources/js/register.js",
                'resources/css/rooms.css'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ["**/storage/framework/views/**"],
        },
    },
});
