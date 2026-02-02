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
                "resources/css/booking.css",
                "resources/css/contact.css",
                "resources/css/details.css",
                "resources/css/filterdroom.css",
                "resources/css/filterdroom.css",
                "resources/css/home.css",
                "resources/css/login.css",
                "resources/css/nav.css",
                "resources/css/register.css",
                "resources/css/rooms.css",
                "resources/css/admin/layout/master.css",
                "resources/css/admin/layout/sidebar.css",
                "resources/css/admin/booking.css",
                "resources/css/admin/rooms.css",
                "resources/js/admin/rooms.js",
                "resources/js/admin/sidebar.js",
                "resources/js/admin/booking.js",
                "resources/js/admin.js",
                "resources/js/app.js",
                "resources/js/booking.js",
                "resources/js/bootstrap.js",
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
