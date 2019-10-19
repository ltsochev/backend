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

mix.options({
    processCssUrls: false
});

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/app-minimal.js', 'public/js')
   .js('resources/js/bootstrap.js', 'public/js')
   .js('resources/js/preloader.js', 'public/js')
   .sass('resources/sass/styles.scss', 'public/css')
   .sass('resources/sass/planner.scss', 'public/css')
   .sass('resources/sass/project.scss', 'public/css')
   .sass('resources/sass/bootstrap.scss', 'public/css')
   .sass('resources/sass/preloader.scss', 'public/css')
   .sass('resources/sass/admin.scss', 'public/css')

mix.copyDirectory('resources/assets', 'public/assets');
