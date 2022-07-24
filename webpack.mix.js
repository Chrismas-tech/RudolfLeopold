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

mix.js('resources/js/admin-js/app.js', 'public/js/admin-js/app.js')
    .js('resources/js/template-js/app.js', 'public/js/template-js/app.js')

.sass('resources/scss/admin-scss/app.scss', 'public/css/admin-css/app.css')
    .sass('resources/scss/template-scss/app.scss', 'public/css/template-css/app.css');


/* mix.options({
    processCssUrls: false
}); */

mix.browserSync('laravel-ecom.laragon/');