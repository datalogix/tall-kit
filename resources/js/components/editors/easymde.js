export default ({ loadComponentAssets, updateInputValue, loadable }) => ({
  ...loadable(),

  /*
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/easymde@2/dist/easymde.min.css',
        'https://cdn.jsdelivr.net/npm/easymde@2/dist/easymde.min.js',
    ];
    */

  easymde: null,

  async setup (options = {}) {
    this.start()

    await loadComponentAssets('easymde')

    const { editor } = this.$refs

    this.easymde = new window.EasyMDE({
      element: editor,
      ...options
    })

    this.easymde.codemirror.on('change', () => {
      updateInputValue(editor, this.easymde.value())
    })

    this.complete(100)
  }
})
