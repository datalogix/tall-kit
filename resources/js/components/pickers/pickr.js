export default ({ loadComponentAssets, updateInputValue }) => ({
  async setup (options) {
    await loadComponentAssets('pickr')

    const pickr = window.Pickr.create({
      el: this.$refs.picker,
      ...options
    })

    pickr.on('save', (color) => {
      updateInputValue(this.$refs.input, color ? color.toHEXA().toString() : null)

      pickr.hide()
    })
  }
})
