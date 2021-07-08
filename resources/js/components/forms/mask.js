export default ({ loadComponentAssets }) => ({
  async setup (options) {
    if (!this.$refs.input) return

    await loadComponentAssets('imask')

    window.IMask(this.$refs.input, options)
  }
})
