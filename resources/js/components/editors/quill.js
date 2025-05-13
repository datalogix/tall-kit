export default ({ loadComponentAssets, updateInputValue, loadable }) => ({
  ...loadable(),

  /*
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/quill@1/dist/quill.snow.min.css',
        'https://cdn.jsdelivr.net/npm/quill@1/dist/quill.min.js',
    ];
    */

  quill: null,

  async setup (options = {}) {
    this.start()

    await loadComponentAssets('quill')

    const { input, editor } = this.$refs

    this.quill = new window.Quill(editor, options)

    this.quill.on('text-change', () => {
      updateInputValue(input, this.quill.root.innerHTML)
    })

    this.quill.root.innerHTML = input.value

    this.complete(100)
  }
})
