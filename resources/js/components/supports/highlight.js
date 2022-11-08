export default ({ loadable, loadComponentAssets }) => ({
  ...loadable(),

  async setup () {
    this.start()

    await loadComponentAssets('highlight')

    this.highlightElement(this.$refs.highlight)
    this.complete()
  },

  update (code) {
    this.$refs.highlight.innerHTML = this.highlightAuto(code).value
  },

  highlightElement (element) {
    window.hljs.highlightElement(element)
  },

  highlightAuto (code) {
    return window.hljs.highlightAuto(code)
  }
})
