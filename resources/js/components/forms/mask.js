export default ({ loadComponentAssets }) => ({
  imask: null,

  async setup (options) {
    if (!this.$refs.input) return

    await loadComponentAssets('imask')

    this.imask = window.IMask(this.$refs.input, options)
  }
})
