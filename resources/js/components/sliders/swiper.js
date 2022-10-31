export default ({ loadComponentAssets }) => ({
  swiper: null,

  async setup (options = {}) {
    await loadComponentAssets('swiper')

    this.swiper = new window.Swiper(this.$refs.root ? this.$refs.root : this.$el, options)
  }
})
