export default ({ loadComponentAssets, updateInputValue }) => ({
  pickr: null,

  async setup (options) {
    await loadComponentAssets('pickr')

    this.pickr = window.Pickr.create({
      el: this.$refs.picker,
      ...options
    })

    this.pickr.on('save', (color) => {
      updateInputValue(this.$refs.input, color ? color.toHEXA().toString() : null)

      this.pickr.hide()
    })
  }
})
