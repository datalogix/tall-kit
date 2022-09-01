import { resolve } from 'path'
import { defineConfig } from 'vite'
import eslint from 'vite-plugin-eslint'

export default defineConfig({
  build: {
    manifest: true,
    sourcemap: true,
    lib: {
      entry: resolve(__dirname, 'resources/js/tallkit.js'),
      name: 'TALLKit',
      fileName: () => 'tallkit.js',
      formats: ['umd']
    },
    rollupOptions: {
      output: {
        entryFileNames: '[name].[hash].js',
        assetFileNames: '[name].[hash].[ext]'
      }
    }
  },

  plugins: [
    eslint({
      fix: true
    })
  ]
})
