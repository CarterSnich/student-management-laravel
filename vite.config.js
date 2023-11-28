import laravel, { refreshPaths } from "laravel-vite-plugin";
import { defineConfig } from "vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/bootstrap/css/bootstrap.min.css",
                "resources/bootstrap/js/bootstrap.min.js",
                "resources/css/app.css",
                "resources/js/app.js",
            ],
            ssr: "resources/js/ssr.js",
            refresh: [...refreshPaths, "app/Http/Livewire/**"],
        }),
    ],
});
