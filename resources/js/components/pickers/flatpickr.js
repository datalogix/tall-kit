export default ({ loadComponentAssets }) => ({
  async setup (options) {
    if (!this.$refs.input) return

    await loadComponentAssets('flatpickr')

    window.flatpickr(this.$refs.input, options)
  }
})
