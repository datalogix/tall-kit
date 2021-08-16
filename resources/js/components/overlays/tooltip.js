export default ({ loadComponentAssets }) => ({
  async setup (options) {
    await loadComponentAssets('tooltip')

    window.tippy(this.$refs.root ? this.$refs.root : this.$el, options)
  }
})
