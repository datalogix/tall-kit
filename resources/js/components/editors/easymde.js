export default ({ loadComponentAssets, updateInputValue }) => ({
  async init (options) {
    await loadComponentAssets('easymde')

    const easymde = new window.EasyMDE({
      element: this.$el,
      ...options
    })

    easymde.codemirror.on('change', () => {
      updateInputValue(this.$el, easymde.value())
    })
  }
})
