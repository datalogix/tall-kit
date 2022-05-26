export default ({ loadComponentAssets, updateInputValue }) => ({
  quill: null,

  async setup (options) {
    await loadComponentAssets('quill')

    const { input, editor } = this.$refs

    this.quill = new window.Quill(editor, options)

    this.quill.on('text-change', () => {
      updateInputValue(input, this.quill.root.innerHTML)
    })

    this.quill.root.innerHTML = input.value
  }
})
