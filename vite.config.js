import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/css/home.css', 'resources/css/cv-complete.css', 'resources/css/navbar.css', 'resources/css/paket.css', 'resources/css/profile.css', 'resources/css/step1.css', 'resources/css/template.css', 'resources/js/app.js','resources/js/home.js', 'resources/js/navbar.js', 'resources/js/forms/bahasa.js', 'resources/js/forms/base.js', 'resources/js/forms/hobi.js', 'resources/js/forms/keahlian.js','resources/js/forms/sertifikat.js','resources/js/forms/pendidikan.js','resources/js/forms/pengalamankerja.js','resources/js/forms/profil.js','resources/js/forms/proyek.js'],
            refresh: true,
        }),
    ],
});
