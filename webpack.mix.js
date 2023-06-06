const mix = require('laravel-mix');

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

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/records.js', 'public/js')
   .js('resources/js/datepicker.js', 'public/js')
   .js('resources/js/workorder.js', 'public/js')
   .js('resources/js/datum.js', 'public/js')
   .js('resources/js/reports.js', 'public/js')
   .js('resources/js/datepicker.js', 'public/js')
   .vue()
    .sass('resources/sass/app.scss', 'public/css')
    .css('resources/css/reports.css', 'public/css');
