// webpack.mix.js
const mix = require('laravel-mix');

mix.react('resources/js/app.jsx', 'public/js') // Adjust the paths as needed
   .sass('resources/css/app.scss', 'public/css'); // Adjust the paths as needed
