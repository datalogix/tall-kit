export default ({ loadComponentAssets, updateInputValue }) => ({
  pickr: null,

  /*
  TODO: assets
  public static $assets = [
      'https://cdn.jsdelivr.net/npm/@simonwep/pickr@1/dist/themes/classic.min.css',
      'https://cdn.jsdelivr.net/npm/@simonwep/pickr@1/dist/pickr.min.js',
  ];
    */

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
