const path = require('path')
const mix = require('laravel-mix')

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
    }
  })
