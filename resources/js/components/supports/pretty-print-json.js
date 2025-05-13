export default ({ loadable, loadComponentAssets }) => ({
  ...loadable(),

  /*
    TODO: assets
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/pretty-print-json@1/dist/pretty-print-json.css',
        'https://cdn.jsdelivr.net/npm/pretty-print-json@1/dist/pretty-print-json.min.js',
    ];
    */

  async setup (code = {}) {
    this.start()

    await loadComponentAssets('pretty-print-json')

    this.update(code)
    this.complete()
  },

  update (code) {
    this.$refs.prettyPrintJson.innerHTML = this.toHtml(code)
  },

  toHtml (code, options = {}) {
    return window.prettyPrintJson.toHtml(code, options)
  }
})
