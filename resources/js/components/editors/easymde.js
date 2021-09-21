export default ({ loadComponentAssets, updateInputValue }) => ({
  easymde: null,

  async setup (options) {
    await loadComponentAssets('easymde')

    const { editor } = this.$refs

    this.easymde = new window.EasyMDE({
      element: editor,
      ...options
    })

    this.easymde.codemirror.on('change', () => {
      updateInputValue(editor, this.easymde.value())
    })
  }
})
