const mix = require('laravel-mix')
const ESLintPlugin = require('eslint-webpack-plugin')

mix.setPublicPath('dist')
  .alias({ '@': 'resources/js' })
  .js('resources/js/tallkit.js', 'dist')
  .sourceMaps()
  .version()
  .webpackConfig({
    plugins: [
      new ESLintPlugin({
        extensions: ['js'],
        fix: true
      })
    ]
  })
