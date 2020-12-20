const mix = require('laravel-mix');
const packageImporter = require('node-sass-package-importer');
const CssoWebpackPlugin = require('csso-webpack-plugin').default;
const compressionPlugin = require('compression-webpack-plugin');
require('laravel-mix-imagemin');
require('laravel-mix-compress-images');
mix.config.fileLoaderDirs.images = 'img';
mix.webpackConfig({
  plugins: [
    new compressionPlugin({
      filename: '[path][base].gz[query]',
      algorithm: 'gzip',
      test: /\.(js|css|svg)$/,
      threshold: 10240,
      minRatio: 0.8,
    })
  ]
});
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

// const path = require('path')

/**
 * ビルド後にpublicフォルダ配下におくファイルのパスを生成
 * @param {string} filePath resouce配下のファイルのフルパス
 */
// const makeDistPath = (filePath) => {
//     let replacedFilePath = filePath.replace(/\\/g, '/')
//     let regExpDir = new RegExp(__dirname.replace(/\\/g, '/') + '/resources/assets/', 'g')
//     replacedFilePath = replacedFilePath.replace(regExpDir, '')
//     return replacedFilePath + '?[hash]'
// }

// このプロジェクトで使用している画像ファイルに対する処理をカスタマイズ。
// resources/assets/images配下のディレクトリ構成を引き継いでpublicに出力されるようにする
// customImagesConfigを実行することで適用されます。
// mix.extend('customImagesConfig', webpackConfig => {
//     // コンパイル時の設定を取得
//     const { rules } = webpackConfig.module
//     // laravel-mixでデフォルトで設定されている画像ファイルに対する処理からresources/assets/images配下のファイルを対象外にする
//     // laravel-mixのバージョンが上がりこの正規表現が変わった場合、それに合わせる必要があります。
//     rules.filter(rule => {
//         // webpack-rules.jsの13行目を参考に画像ファイルに対する正規表現で該当の設定を見つける
//         if (rule.test.toString() === /(\.(png|jpe?g|gif)$|^((?!font).)*\.svg$)/.toString()) {
//             // excludeの設定
//             rule.exclude = path.resolve(__dirname, './resources/assets/images')
//         }
//     })
//
//     rules.unshift({
//         test: /(\.(png|jpe?g|gif)$|^((?!font).)*\.svg$)/,
//         include: [
//             path.resolve(__dirname, 'resources/assets/images')
//         ],
//         loaders: [
//             {
//                 loader: 'file-loader',
//                 options: {
//                     name: filePath => makeDistPath(filePath),
//                 }
//             },
//             {
//                 loader: 'img-loader',
//                 options: {
//                     enabled: true,
//                     gifsicle: {},
//                     mozjpeg: {},
//                     optipng: {},
//                     svgo: {}
//                 }
//             }
//         ]
//     })
// })
// customImagesConfigを実行
// mix.customImagesConfig()


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/style.scss', 'public/css')
    .sass('resources/sass/common.scss', 'public/css')
    .sass('resources/sass/home.scss', 'public/css')
    .imagemin('img/**/*',
        {
        context: 'resources',
        },
        {
            optipng: {
                optimizationLevel: 5
            },
            // jpegtran: null,
            svgo: null,
            plugins: [
                require('imagemin-mozjpeg')({
                    quality: 50,
                    progressive: true,
                }),
            ],
        }
    )

    // .options(
    //     {
    //         importer: packageImporter({
    //             extensions: ['.scss', '.css']
    //         })
    //     }
    // )
    // .webpackConfig({
    //     plugins: [
    //         new CssoWebpackPlugin(),
    //     ],
    // })

;

// mix.setPublicPath('./public2');
// mix.compressImages(
//     ['resources/img\/**\/*'],
//     'hoge',
//     {
//         jpg:{
//             engine: 'mozjpeg',
//             command:['-quality', '20']
//         }
//     }
// );

mix.webpackConfig({
  plugins: [
    new compressionPlugin({
      filename: '[path][base].gz[query]',
      algorithm: 'gzip',
      test: /\.(js|css|svg)$/,
      threshold: 10240,
      minRatio: 0.8,
    })
  ]
})
