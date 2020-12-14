const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

var SWPrecacheWebpackPlugin = require('sw-precache-webpack-plugin');
mix.webpackConfig({
    plugins: [
        new SWPrecacheWebpackPlugin({
            cacheId: 'pwa',
            filename: 'service-worker.js',
            staticFileGlobs: [
                'public/css/*.{css}',
                'public/js/*.{js}',
                'public/image/*.{png,jpg,jpeg}',
                'public/images/**/*.{png,svg,jpeg,jpg}',
                'public/storage/**/*.{png,jpg,jpeg,mp3,mp4,bmp,gif,ogg}'
            ],
            minify: false,
            stripPrefix: 'public/',
            mergeStaticsConfig: true,
            handleFetch: true,
            dynamicUrlToDependencies: {
                //you should add the path to your blade files here so they can be cached
                //and have full support for offline first (example below)
                '/feeds': ['resources/views/feed/index.blade.php'],
            },
            staticFileGlobsIgnorePatterns: [/\.map$/, /mix-manifest\.json$/, /manifest\.json$/, /service-worker\.js$/],
            navigateFallback: '/',
            runtimeCaching: [
                // {
                //     urlPattern: /^https:\/\/fonts\.googleapis\.com\//,
                //     handler: 'cacheFirst'
                // },
                // {
                //     urlPattern: /^https:\/\/www\.thecocktaildb\.com\/images\/media\/drink\/(\w+)\.jpg/,
                //     handler: 'cacheFirst'
                // }
            ]
            // importScripts: ['./js/push_message.js']
        })
    ]
});
