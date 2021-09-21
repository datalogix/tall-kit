export default ({ loadComponentAssets }) => ({
  cleave: null,

  async setup (options) {
    if (!this.$refs.input) return

    await loadComponentAssets('cleave')

    this.cleave = new window.Cleave(this.$refs.input, options)
  }
})
