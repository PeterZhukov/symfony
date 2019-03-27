// var path = require('path');
// const MiniCssExtractPlugin = require("mini-css-extract-plugin");
//
// module.exports = {
//     mode: 'development',
//     entry: {
//         bundle: './index.js'
//     },
//     output: {
//         path: __dirname,
//         filename: 'bundle.js'
//     },
//     plugins: [
//         new MiniCssExtractPlugin({
//             filename: "[name].css",
//             chunkFilename: "[id].css"
//         })
//     ],
//     devtool: "source-map", // any "source-map"-like devtool is possible
//     module: {
//         rules: [{
//             test: /\.scss$/,
//             use: [
//                 {
//                     loader: MiniCssExtractPlugin.loader,
//                     options: {
//                         sourceMap: true
//                     }
//                 },
//                 {
//                     loader: "css-loader",
//                     options: {
//                         sourceMap: true
//                     }
//                 },
//                 {
//                     loader: "sass-loader",
//                     options: {
//                         sourceMap: true
//                     }
//                 }
//             ]
//         }]
//     }
// };

var Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('./output')
    .setPublicPath('./')
    .setManifestKeyPrefix('bundles/easyadmin')

    .cleanupOutputBeforeBuild()
    .enableSassLoader()
    .enableSourceMaps(true)
    .enableVersioning(false)
    .disableSingleRuntimeChunk()
    .autoProvidejQuery()

    // needed to avoid this bug: https://github.com/symfony/webpack-encore/issues/436
    .configureCssLoader(options => { options.minimize = false; })
    .enablePostCssLoader()

    .addEntry('index', './index.js')
;

module.exports = Encore.getWebpackConfig();
