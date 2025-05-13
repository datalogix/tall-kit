export default ({ loadable, loadComponentAssets }) => ({
  ...loadable(),

  async setup () {
    this.start()

    await loadComponentAssets('highlight')

    /*
    public static $assets = [
      'https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@11/build/styles/github.min.css',
      'https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@11/build/highlight.min.js',
    ];
    */

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
