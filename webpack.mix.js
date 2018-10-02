let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');


// Базовые секции для всех страниц
mix.sass('resources/assets/sass/layouts/header.scss', 'public/css');
mix.sass('resources/assets/sass/layouts/left_menu.scss', 'public/css');


// Стили для модальных окон
mix.sass('resources/assets/sass/modals/modal-base-form.scss', 'public/css');


// Стили для страниц
mix.sass('resources/assets/sass/pages/index.scss', 'public/css');
mix.sass('resources/assets/sass/pages/sections.scss', 'public/css');

