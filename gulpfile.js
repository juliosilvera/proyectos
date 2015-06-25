var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less', 'resources/css/libs/app.css');

    mix.styles([
        'app.css',
        'select2.css',
        'jquery-ui.css',
        'jquery-ui.structure.css',
        'jquery-ui.theme.css'
    ], null, 'resources/css/libs');

    mix.scripts([
        'select2.min.js',
        'jquery-ui.js',
    ], null, 'resources/js/libs');
});
