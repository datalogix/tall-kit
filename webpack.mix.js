const path = require('path')
const mix = require('laravel-mix')
const ESLintPlugin = require('eslint-webpack-plugin')

mix.setPublicPath('dist')
  .js('resources/js/tallkit.js', 'dist')
  .sourceMaps()
  .version()
  .webpackConfig({
    resolve: {
      symlinks: false,
      alias: {
        '@': path.resolve(__dirname, 'resources/js/')
      }
    },
    plugins: [
      new ESLintPlugin({
        extensions: ['js'],
        fix: true
      })
    ]
  })
