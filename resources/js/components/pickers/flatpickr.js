export default ({ loadComponentAssets }) => ({
  flatpickr: null,

  async setup (options) {
    if (!this.$refs.input) return

    await loadComponentAssets('flatpickr')

    this.flatpickr = window.flatpickr(this.$refs.input, options)
  }
})
