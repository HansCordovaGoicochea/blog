let mix = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.js([
    'node_modules/bootstrap/dist/js/bootstrap.js',
    'node_modules/jquery/dist/jquery.js',
    'resources/assets/js/prueba.js',
],'public/js/all.js','./');
// mix.browserSync({
//     proxy: 'blog.test'
// });
