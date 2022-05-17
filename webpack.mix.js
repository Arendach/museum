const mix = require('laravel-mix');

mix.js('resources/assets/home/app.js', 'public/js/home.js').vue()

mix.css('resources/css/home.css', 'public/css/home.css')
