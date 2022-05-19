const mix = require('laravel-mix');

mix
    .version()
    .options({
        processCssUrls: false,
        terser: {
            extractComments: false
        }
    })
    .sass('resources/sass/app.scss', 'public/css/app.css')
