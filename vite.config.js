import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",

                // admin assets
                "resources/js/admin/sidebar.js",
                "resources/js/admin/rooms.js",
                "resources/js/admin/booking.js",
                "resources/css/admin/layout/sidebar.css",
                "resources/css/admin/layout/master.css",
                "resources/css/admin/rooms.css",
                "resources/css/admin/booking.css",

                //visitor 
                "resources/js/booking.js",
                "resources/js/bootstrap.js",
                "resources/css/booking.css",
                "resources/css/contact.css",
                "resources/css/details.css",
                "resources/css/filterdroom.css",
                "resources/css/home.css",
                "resources/css/login.css",
                "resources/css/nav.css",
                "resources/css/register.css",
                "resources/css/rooms.css",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
