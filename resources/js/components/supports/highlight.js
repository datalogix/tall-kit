export default ({ loadable, loadComponentAssets }) => ({
  ...loadable(),

  async setup () {
    this.start()

    await loadComponentAssets('highlight')

    window.hljs.highlightElement(this.$refs.highlight)

    this.complete()
  }
})
