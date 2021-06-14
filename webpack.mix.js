const path = require('path')
const mix = require('laravel-mix')

require('laravel-mix-eslint')

mix.setPublicPath('dist')
  .js('resources/js/tallkit.js', 'dist')
  .eslint({ fix: true })
  .sourceMaps()
  .version()
  .webpackConfig({
    resolve: {
      symlinks: false,
      alias: {
        '@': path.resolve(__dirname, 'resources/js/')
      }
    }
  })
