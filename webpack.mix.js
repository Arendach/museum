const mix = require('laravel-mix')
const path = require("path")

mix
    .version()
    .options({
        processCssUrls: false,
        terser: {
            extractComments: false
        }
    })
    .alias({
        '@': path.join(__dirname, 'resources/assets')
    })
    .sass('resources/sass/app.scss', 'public/css/app.css')
    .js('resources/assets/tags/app.js', 'public/js/tags.js')
    .vue()
