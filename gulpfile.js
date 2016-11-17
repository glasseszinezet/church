const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.styles([
        './public/assets/plugins/PACE/themes/blue/pace-theme-flash.css',
        './public/assets/plugins/bootstrap/dist/css/bootstrap.min.css',
        './public/assets/plugins/themify-icons/themify-icons.css',
        './public/assets/build/css/first-layout.css'
    ],'public/css/app.css');

    mix.scripts([
       // 'app.js',
        './public/assets/plugins/PACE/pace.min.js',
        './public/assets/plugins/jquery/dist/jquery.min.js',
        './public/assets/plugins/bootstrap/dist/js/bootstrap.min.js',
        './public/assets/build/js/first-layout/extra-demo.js'
    ],'public/js/app.js');
});