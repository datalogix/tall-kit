export default ({ loadComponentAssets }) => ({
  tippy: null,

  async setup (options) {
    await loadComponentAssets('tooltip')

    this.tippy = window.tippy(this.$refs.root ? this.$refs.root : this.$el, options)
  }
})
