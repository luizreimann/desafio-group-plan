const mix = require('laravel-mix');
require('laravel-mix-vue3');

mix.ts('src/main.ts', 'public/js')
   .vue()
   .postCss('src/assets/css/app.css', 'public/css', [
       require('postcss-import'),
       require('tailwindcss'),
       require('autoprefixer'),
   ]);

if (mix.inProduction()) {
   mix.version();
}

mix.copy('src/index.html', 'public/index.html');
