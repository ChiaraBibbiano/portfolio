import {defineConfig} from "vite";
import {globSync} from "glob";
import fs from "fs";

export default defineConfig({
    base: '/wp-content/themes/portfolio/public',
    plugins: [
        {
            name: 'bundle-js', //compiler
        }
    ],

    build: {
        manifest: true,
        rollupOptions: {
            input: {
                js: './wp-content/themes/portfolio/assets/js/main.js',
                scss: './wp-content/themes/portfolio/assets/css/styles.scss',
            },
            output: {
                dir: './wp-content/themes/portfolio/public'
            }
        },
        assetsInlineLimit: 0,
        target: ["es2015"]
    }
})