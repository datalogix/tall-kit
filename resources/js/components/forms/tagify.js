export default ({ loadComponentAssets }) => ({
  tagify: null,

  async setup (options) {
    if (!this.$refs.element) return

    await loadComponentAssets('tagify')

    this.tagify = new window.Tagify(this.$refs.element, options)
  }
})
