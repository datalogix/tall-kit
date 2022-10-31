export default ({ loadComponentAssets }) => ({
  imask: null,

  async setup (options) {
    if (!this.$refs.element) return

    await loadComponentAssets('imask')

    this.imask = window.IMask(this.$refs.element, options)
  }
})
