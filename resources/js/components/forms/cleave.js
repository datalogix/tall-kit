export default ({ loadComponentAssets }) => ({
  cleave: null,

  async setup (options) {
    if (!this.$refs.element) return

    await loadComponentAssets('cleave')

    this.cleave = new window.Cleave(this.$refs.element, options)
  }
})
