import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/bootstrap.min.css',
                'resources/css/demo.css',
                'resources/css/ready.css',
                'resources/js/app.js',
                'resources/js/ready.js',
                'resources/js/core/bootstrap.min.js',
                'resources/js/core/jquery.3.2.1.min.js',
                'resources/js/core/popper.min.js',


            ],
            refresh: true,
        }),
    ],
});
