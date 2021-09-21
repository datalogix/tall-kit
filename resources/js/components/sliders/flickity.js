export default ({ loadComponentAssets }) => ({
  flickity: null,

  async setup (options = {}) {
    await loadComponentAssets('flickity')

    this.flickity = new window.Flickity(this.$el, options)
  }
})
