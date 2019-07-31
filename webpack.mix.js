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
.sass('resources/sass/app.scss', 'public/css')
.styles ([
        'resources/sass/css/libs/blog-post.css',
        'resources/sass/css/libs/bootstrap.css',
        'resources/sass/css/libs/bootstrap.min.css',
        'resources/sass/css/libs/font-awesome.css',
        'resources/sass/css/libs/metisMenu.css',
        'resources/sass/css/libs/sb-admin-2.css',
        'resources/sass/css/libs/styles.css',
    ], 'public/css/app.css' );
// .scripts([
//     'resources/js/bootstrap.js',
//     'resources/js/bootstrap.min.js',
//     'resources/js/jquery.js',
//      'resources/js/metisMenu.js',
//      'resources/js/sb-admin-2.js',
//      'resources/js/scripts.js',
//      'resources/js/app.js',
// ], 'public/js/app.js' );
