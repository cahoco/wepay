const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/home/memo.js", "public/js/home")
    .postCss("resources/css/app.css", "public/css", []);
