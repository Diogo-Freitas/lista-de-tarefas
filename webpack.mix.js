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

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
])
    .styles(['resources/css/sb-admin-2.min.css', 'resources/css/backend.css'], 'public/css/backend.css')
    .scripts(['resources/js/sb-admin-2.min.js', 'resources/js/backend.js'], 'public/js/backend.js');
