export default ({ loadComponentAssets }) => ({
  async init (options) {
    await loadComponentAssets('imask')

    window.IMask(this.$el, options)
  }
})
