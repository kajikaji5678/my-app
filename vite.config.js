import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
//~ 6/26 TailWind追加
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/calendar.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
