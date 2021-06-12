export default ({ loadComponentAssets }) => ({
  async init (options) {
    await loadComponentAssets('flatpickr')

    window.flatpickr(this.$el, options)
  }
})
