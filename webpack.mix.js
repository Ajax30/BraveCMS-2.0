const mix = require('laravel-mix');

mix.js([
  'resources/js/app.js',
  'resources/js/user-profile.js',
  'resources/js/tags.js'
], 'public/js/app.js')
  .sass('resources/sass/app.scss', 'public/css')
  .sourceMaps();