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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ])
    .styles([
        'resources/css/adminlte.css',
        'resources/plugins/fontawesome-free/css/all.css',
    ], 'public/css/all.css')
    .scripts([
        'resources/plugins/jquery/jquery.min.js',
        'resources/plugins/bootstrap/js/bootstrap.bundle.js',
        'resources/js/adminlte.js',
    ], 'public/js/all.js')
    .copyDirectory('resources/images', 'public/images')
    .copyDirectory('resources/plugins/fontawesome-free/webfonts', 'public/webfonts')
    .version()
    .vue();