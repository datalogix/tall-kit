export default ({ loadable, loadComponentAssets }) => ({
  ...loadable(),

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
