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

mix.js('app.js', 'public/js')
   .js('app-minimal.js', 'public/js')
   .sass('sass/styles.scss', 'public/css')
   .sass('sass/planner.scss', 'public/css')
   .sass('sass/project.scss', 'public/css')

mix.copyDirectory('assets', 'public/assets');
