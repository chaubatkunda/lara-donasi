const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .vue()
    .sass("resources/scss/app.scss", "public/css")
    .alias({
        "@": "resources/js",
    });

if (mix.inProduction()) {
    mix.version();
}
