const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'resources/admin/assets/vendor/bootstrap/css/bootstrap.min.css',
    'resources/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css',
    'resources/admin/assets/vendor/boxicons/css/boxicons.min.css',
    'resources/admin/assets/vendor/quill/quill.snow.css',
    'resources/admin/assets/vendor/quill/quill.bubble.css',
    'resources/admin/assets/vendor/simple-datatables/style.css',
    'resources/admin/assets/css/style.css'
], 'public/css/admin.css');

mix.scripts([
    'resources/admin/assets/vendor/apexcharts/apexcharts.min.js',
    'resources/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
    'resources/admin/assets/vendor/chart.js/chart.umd.js',
    'resources/admin/assets/vendor/quill/quill.min.js',
    'resources/admin/assets/vendor/simple-datatables/simple-datatables.js',
    'resources/admin/assets/vendor/tinymce/tinymce.min.js',
    'resources/admin/assets/vendor/php-email-form/validate.js',
    'resources/admin/assets/js/main.js'
], 'public/js/admin.js');
