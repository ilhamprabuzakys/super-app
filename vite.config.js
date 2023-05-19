import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/bootstrap.js', 'resources/js/leaflet.js', 'public/landing/'],
            refresh: true,
        }),
    ],
    
    build: {
        rollupOptions: {
          external: ['pusher-js'], // Tambahkan nama package Pusher.js di sini
        },
      },
});
