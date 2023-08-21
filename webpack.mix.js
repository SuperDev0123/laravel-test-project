const mix = require('laravel-mix');

mix.copyDirectory("resources/fonts", "public/fonts"); // Make sure the font folder is copied to the public folder
mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css'); // Correct the .postCss() configuration
