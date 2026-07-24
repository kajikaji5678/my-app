import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import path from 'path';
import { fileURLToPath } from 'url';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/calendar.js',
                'resources/js/app.jsx'
            ],
            refresh: true,
        }),
        react(),
    ],
    resolve: {
      alias: {
        "@": path.resolve(__dirname, "./src"),
      }
    }
});
