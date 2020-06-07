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
	.js('resources/js/testecho.js', 'public/js')
	.js('resources/js/auth.js', 'public/js')
	.sass('resources/sass/app.sass', 'public/css')
	.sass('resources/sass/auth.sass', 'public/css');
    /*.styles([
   		'node_modules/vuetify/dist/vuetify.min.css'
   	], 'public/css/app.css');*/
