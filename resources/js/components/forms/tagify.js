export default ({ loadComponentAssets }) => ({
  tagify: null,

  async setup (options) {
    if (!this.$refs.input) return

    await loadComponentAssets('tagify')

    this.tagify = new window.Tagify(this.$refs.input, options)
  }
})
