export default ({ loadable, loadComponentAssets }) => ({
  ...loadable(),

  async setup (code = {}) {
    this.start()

    await loadComponentAssets('pretty-print-json')

    this.$refs.prettyPrintJson.innerHTML = window.prettyPrintJson.toHtml(code)

    this.complete()
  }
})
