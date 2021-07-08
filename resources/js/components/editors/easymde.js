export default ({ loadComponentAssets, updateInputValue }) => ({
  async setup (options) {
    await loadComponentAssets('easymde')

    const { editor } = this.$refs

    const easymde = new window.EasyMDE({
      element: editor,
      ...options
    })

    easymde.codemirror.on('change', () => {
      updateInputValue(editor, easymde.value())
    })
  }
})
