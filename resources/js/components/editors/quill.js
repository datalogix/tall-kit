export default ({ loadComponentAssets, updateInputValue }) => ({
  async setup (options) {
    await loadComponentAssets('quill')

    const { input, editor } = this.$refs
    const quill = new window.Quill(editor, options)

    quill.on('text-change', () => {
      updateInputValue(input, quill.root.innerHTML)
    })

    quill.root.innerHTML = input.value
  }
})
