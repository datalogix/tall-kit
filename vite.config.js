import { resolve } from 'path'
import { defineConfig } from 'vite'
import eslint from 'vite-plugin-eslint'
import outputManifest from 'rollup-plugin-output-manifest'

export default defineConfig({
  build: {
    sourcemap: true,
    lib: {
      entry: resolve(__dirname, 'resources/js/tallkit.js'),
      name: 'TALLKit',
      fileName: () => 'tallkit.js',
      formats: ['umd']
    },
    rollupOptions: {
      output: {
        entryFileNames: '[name].[hash].js'
      }
    }
  },

  plugins: [
    eslint({
      fix: true
    }),
    outputManifest()
  ]
})
